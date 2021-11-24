<?php

namespace App\Http\Controllers;

use App\Http\Resources\DetailStatusResource;
use App\Http\Resources\SegelResource;
use App\Http\Resources\SegelTableResource;
use App\Models\Segel;
use App\Traits\DokumenTrait;
use Illuminate\Http\Request;

class SegelController extends Controller
{
	use DokumenTrait;

	private $tipe_dok = 'BA';
	private $agenda_dok = '/SEGEL/KPU.03/';

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$all_segel = Segel::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$segel_list = SegelTableResource::collection($all_segel);
		return $segel_list;
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
			'jenis_segel' => 'required',
			'jumlah_segel' => 'required|integer',
			'saksi.id' => 'required|integer',
			'petugas1.user_id' => 'required'
		]);

		$no_dok_lengkap = $this->tipe_dok . '-' . $this->agenda_dok; 

		$insert_result = Segel::create([
			'agenda_dok' => $this->agenda_dok,
			'no_dok_lengkap' => $no_dok_lengkap,
			'sprint_id' => $request->sprint['id'],
			'jenis_segel' => $request->jenis_segel,
			'jumlah_segel' => $request->jumlah_segel,
			'nomor_segel' => $request->nomor_segel,
			'lokasi_segel' => $request->lokasi_segel,
			'saksi_id' => $request->saksi['id'],
			'petugas1_id' => $request->petugas1['user_id'],
			'petugas2_id' => $request->petugas2['user_id'],
			'kode_status' => 100,
		]);

		return $insert_result;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$segel = new SegelResource(Segel::findOrFail($id));
		return $segel;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function showComplete($id)
	{
		$sbp = new SegelResource(Segel::findOrFail($id), 'complete');
		return $sbp;
	}

	/**
	 * Display available details
	 * 
	 * @param int $id
	 */
	public function showDetails($id)
	{
		$sbpHeaderDetails = new DetailStatusResource(Segel::findOrFail($id));
		return $sbpHeaderDetails;
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
		// Check if document is not published yet
		$is_unpublished = $this->checkUnpublished(Segel::class, $id);

		// Update if not published
		if ($is_unpublished) {
			$request->validate([
				'sprint.id' => 'required|integer',
				'jenis_segel' => 'required',
				'jumlah_segel' => 'required|integer',
				'saksi.id' => 'required|integer',
				'petugas1.user_id' => 'required'
			]);
	
			$tgl_sprint = date('Y-m-d', strtotime($request->tgl_sprint));
	
			$update_result = Segel::where('id', $id)
				->update([
					'sprint_id' => $request->sprint['id'],
					'jenis_segel' => $request->jenis_segel,
					'jumlah_segel' => $request->jumlah_segel,
					'nomor_segel' => $request->nomor_segel,
					'lokasi_segel' => $request->lokasi_segel,
					'saksi_id' => $request->saksi['id'],
					'petugas1_id' => $request->petugas1['user_id'],
					'petugas2_id' => $request->petugas2['user_id'],
					'kode_status' => 101,
				]);
	
			$result = $update_result;
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan, tidak dapat mengupdate dokumen.'], 422);
		}
		
		return $result;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$result = $this->deleteDocument(Segel::class, $id);
		return $result;
	}

	/**
	 * Terbitkan penomoran dokumen
	 * 
	 * @param  int  $id
	 */
	public function publish($id)
	{
		$doc = $this->publishDocument(Segel::class, $id, $this->tipe_dok);
		return $doc;
	}
}
