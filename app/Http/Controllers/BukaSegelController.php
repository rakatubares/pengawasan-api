<?php

namespace App\Http\Controllers;

use App\Http\Resources\BukaSegelResource;
use App\Http\Resources\BukaSegelTableResource;
use App\Http\Resources\DetailStatusResource;
use App\Models\BukaSegel;
use App\Traits\DokumenTrait;
use Illuminate\Http\Request;

class BukaSegelController extends Controller
{
	use DokumenTrait;
	
	private $tipe_dok = 'BA';
	private $agenda_dok = '/BUKA SEGEL/KPU.03/BD.05/';

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$all_buka_segel = BukaSegel::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$buka_segel_list = BukaSegelTableResource::collection($all_buka_segel);
		return $buka_segel_list;
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

		$insert_result = BukaSegel::create([
			'agenda_dok' => $this->agenda_dok,
			'no_dok_lengkap' => $no_dok_lengkap,
			'sprint_id' => $request->sprint['id'],
			'jenis_segel' => $request->jenis_segel,
			'jumlah_segel' => $request->jumlah_segel,
			'nomor_segel' => $request->nomor_segel,
			'tempat_segel' => $request->tempat_segel,
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
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$buka_segel = new BukaSegelResource(BukaSegel::findOrFail($id));
		return $buka_segel;
	}

	/**
	 * Display available details
	 * 
	 * @param int $id
	 */
	public function showComplete($id)
	{
		$buka_segel = new BukaSegelResource(BukaSegel::findOrFail($id), 'complete');
		return $buka_segel;
	}

	/**
	 * Display available details
	 * 
	 * @param int $id
	 */
	public function showDetails($id)
	{
		$buka_segel_details = new DetailStatusResource(BukaSegel::findOrFail($id));
		return $buka_segel_details;
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
		$is_unpublished = $this->checkUnpublished(BukaSegel::class, $id);

		if ($is_unpublished) {
			$request->validate([
				'sprint.id' => 'required|integer',
				'jenis_segel' => 'required',
				'jumlah_segel' => 'required|integer',
				'saksi.id' => 'required|integer',
				'petugas1.user_id' => 'required'
			]);
	
			$update_result = BukaSegel::where('id', $id)
				->update([
					'sprint_id' => $request->sprint['id'],
					'jenis_segel' => $request->jenis_segel,
					'jumlah_segel' => $request->jumlah_segel,
					'nomor_segel' => $request->nomor_segel,
					'tempat_segel' => $request->tempat_segel,
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
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$result = $this->deleteDocument(BukaSegel::class, $id);
		return $result;
	}

	/**
	 * Terbitkan penomoran dokumen
	 * 
	 * @param  int  $id
	 */
	public function publish($id)
	{
		$doc = $this->publishDocument(BukaSegel::class, $id, $this->tipe_dok);
		return $doc;
	}
}
