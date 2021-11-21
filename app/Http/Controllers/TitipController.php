<?php

namespace App\Http\Controllers;

use App\Http\Resources\DetailStatusResource;
use App\Http\Resources\TitipResource;
use App\Http\Resources\TitipTableResource;
use App\Models\Titip;
use App\Traits\DokumenTrait;
use Illuminate\Http\Request;

class TitipController extends Controller
{
	use DokumenTrait;

	private $tipe_dok = 'BA';
	private $agenda_dok = '/TITIP/KPU.03/BD.05/';

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$all_titip = Titip::all();
		$titip_list = TitipTableResource::collection($all_titip);
		return $titip_list;
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
			'lokasi_titip' => 'required',
			'tanggal_segel' => 'date',
			'penerima.id' => 'required|integer',
			'saksi.id' => 'integer',
			'pejabat1' => 'required'
		]);

        $no_dok_lengkap = $this->tipe_dok . '-' . $this->agenda_dok; 

		$insert_result = Titip::create([
			'agenda_dok' => $this->agenda_dok,
			'no_dok_lengkap' => $no_dok_lengkap,
			'sprint_id' => $request->sprint['id'],
			'lokasi_titip' => $request->lokasi_titip,
			'nomor_ba_segel' => $request->nomor_ba_segel,
			'tanggal_segel' => $request->tanggal_segel,
			'penerima_id' => $request->penerima['id'],
			'saksi_id' => $request->saksi['id'],
			'pejabat1' => $request->pejabat1,
			'pejabat2' => $request->pejabat2,
			'kode_status' => 100,
		]);

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
		$titip = new TitipResource(Titip::findOrFail($id));
		return $titip;
	}

	/**
	 * Display available details
	 * 
	 * @param int $id
	 */
	public function showComplete($id)
	{
		$titip = new TitipResource(Titip::findOrFail($id), 'complete');
		return $titip;
	}

	/**
	 * Display available details
	 * 
	 * @param int $id
	 */
	public function showDetails($id)
	{
		$titip_details = new DetailStatusResource(Titip::findOrFail($id));
		return $titip_details;
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
		$is_unpublished = $this->checkUnpublished(Titip::class, $id);

		if ($is_unpublished) {
			$request->validate([
				'sprint.id' => 'required|integer',
				'lokasi_titip' => 'required',
				'tanggal_segel' => 'date',
				'penerima.id' => 'required|integer',
				'saksi.id' => 'integer',
				'pejabat1' => 'required'
			]);

			$tanggal_segel = date('Y-m-d', strtotime($request->tanggal_segel));

			$update_result = Titip::where('id', $id)
				->update([
					'sprint_id' => $request->sprint['id'],
					'lokasi_titip' => $request->lokasi_titip,
					'nomor_ba_segel' => $request->nomor_ba_segel,
					'tanggal_segel' => $tanggal_segel,
					'penerima_id' => $request->penerima['id'],
					'saksi_id' => $request->saksi['id'],
					'pejabat1' => $request->pejabat1,
					'pejabat2' => $request->pejabat2,
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
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$result = $this->deleteDocument(Titip::class, $id);
		return $result;
	}

	/**
	 * Terbitkan penomoran dokumen
	 * 
	 * @param  int  $id
	 */
	public function publish($id)
	{
		$doc = $this->publishDocument(Titip::class, $id, $this->tipe_dok);
		return $doc;
	}
}
