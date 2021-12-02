<?php

namespace App\Http\Controllers;

use App\Http\Resources\DetailStatusResource;
use App\Http\Resources\SbpResource;
use App\Http\Resources\SbpTableResource;
use App\Models\Sbp;
use App\Models\Segel;
use App\Traits\DokumenTrait;
use Illuminate\Http\Request;

class SbpController extends Controller
{
	use DokumenTrait;
	
	private $tipe_dok = 'SBP';
	private $agenda_dok = '/KPU.03/BD.05/';
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$all_sbp = Sbp::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$sbp_list = SbpTableResource::collection($all_sbp);
		return $sbp_list;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$request->validate([
			'sprint.id' => 'required|integer',
			'lokasi_penindakan' => 'required',
			'wkt_mulai_penindakan' => 'required|date',
			'wkt_selesai_penindakan' => 'required|date',
			'saksi.id' => 'required|integer',
			'petugas1.user_id' => 'required'
		]);
		
		$no_dok_lengkap = $this->tipe_dok . '-' . '      ' . $this->agenda_dok;
		$wkt_mulai_penindakan = strtotime($request->wkt_mulai_penindakan);
		$wkt_selesai_penindakan = strtotime($request->wkt_selesai_penindakan);
		$insert_result = Sbp::create([
			'agenda_dok' => $this->agenda_dok,
			'no_dok_lengkap' => $no_dok_lengkap,
			'sprint_id' => $request->sprint['id'],
			'lokasi_penindakan' => $request->lokasi_penindakan,
			'uraian_penindakan' => $request->uraian_penindakan,
			'alasan_penindakan' => $request->alasan_penindakan,
			'jenis_pelanggaran' => $request->jenis_pelanggaran,
			'wkt_mulai_penindakan' => $wkt_mulai_penindakan,
			'wkt_selesai_penindakan' => $wkt_selesai_penindakan,
			'hal_terjadi' => $request->hal_terjadi,
			'saksi_id' => $request->saksi['id'],
			'petugas1_id' => $request->petugas1['user_id'],
			'petugas2_id' => $request->petugas2['user_id'],
			'kode_status' => 100
		]);

		return $insert_result;
	}

	public function storeLinkedDoc(Request $request, $id)
	{
		$sbp = Sbp::findOrFail($id);
		$detail = $this->getDetail(Sbp::class, $id);

		if ($request->segel == true) {
			$request_segel = $this->requestSegel($sbp, $detail, $request);
			$this->createRelation(Segel::class, $request_segel->id, Sbp::class, $id);
			// DocRelation::create([
			// 	'doc1_type' => Segel::class,
			// 	'doc1_id' => $request_segel->id,
			// 	'doc2_type' => Sbp::class,
			// 	'doc2_id' => $id,
			// ]);
		}
		return $request_segel;
		
		return $detail;
	}

	private function requestSegel($sbp, $detail, $request)
	{
		$segel_array = [
			'sprint' => ['id' => $sbp->sprint_id],
			'objek_penindakan' => 'barang',
			'jenis_segel' => $request->data_segel['jenis'],
			'jumlah_segel' => $request->data_segel['jumlah'],
			'lokasi_segel' => $request->data_segel['lokasi'],
			'saksi' => ['id' => $sbp->saksi_id],
			'petugas1' => ['user_id' => $sbp->petugas1->user_id],
			'petugas2' => ['user_id' => ($sbp->petugas2->user_id ?? null)],
		];

		$segel_request = new Request($segel_array);
		$insert_result = app(SegelController::class)->store($segel_request);
		
		return $insert_result;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$sbp = new SbpResource(Sbp::findOrFail($id));
		return $sbp;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function showComplete($id)
	{
		$sbp = new SbpResource(Sbp::findOrFail($id), 'complete');
		return $sbp;
	}

	/**
	 * Display available details
	 * 
	 * @param int $id
	 */
	public function objek($id)
	{
		$objek = new SbpResource(Sbp::find($id));
		return $objek;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		// Check if document is published
		$is_unpublished = $this->checkUnpublished(Sbp::class, $id);

		// Update if not published
		if ($is_unpublished) {
			$request->validate([
				'sprint.id' => 'required|integer',
				'lokasi_penindakan' => 'required',
				'wkt_mulai_penindakan' => 'required|date',
				'wkt_selesai_penindakan' => 'required|date',
				'saksi.id' => 'required|integer',
				'petugas1.user_id' => 'required'
			]);
	
			$wkt_mulai_penindakan = date('Y-m-d H:i:s', strtotime($request->wkt_mulai_penindakan));
			$wkt_selesai_penindakan = date('Y-m-d H:i:s', strtotime($request->wkt_selesai_penindakan));
			
			$update_result = Sbp::where('id', $id)
				->update([
					'sprint_id' => $request->sprint['id'],
					'lokasi_penindakan' => $request->lokasi_penindakan,
					'uraian_penindakan' => $request->uraian_penindakan,
					'alasan_penindakan' => $request->alasan_penindakan,
					'jenis_pelanggaran' => $request->jenis_pelanggaran,
					'wkt_mulai_penindakan' => $wkt_mulai_penindakan,
					'wkt_selesai_penindakan' => $wkt_selesai_penindakan,
					'hal_terjadi' => $request->hal_terjadi,
					'saksi_id' => $request->saksi['id'],
					'petugas1_id' => $request->petugas1['user_id'],
					'petugas2_id' => $request->petugas2['user_id'],
				]);
	
			$result = $update_result;
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan, tidak dapat mengupdate dokumen.'], 422);
		}
		
		return $result;
		// return $request;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$result = $this->deleteDocument(Sbp::class, $id);
		return $result;
	}

	/**
	 * Terbitkan penomoran SBP
	 * 
	 * @param  int  $id
	 */
	public function publish($id)
	{
		$doc = $this->publishDocument(Sbp::class, $id, $this->tipe_dok);
		return $doc;
	}
}
