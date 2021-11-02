<?php

namespace App\Http\Controllers;

use App\Http\Resources\BukaSegelResource;
use App\Http\Resources\DetailStatusResource;
use App\Models\BukaSegel;
use App\Traits\DokumenTrait;
use Illuminate\Http\Request;

class BukaSegelController extends Controller
{
	use DokumenTrait;
	
	private $tipe_dok = 'BA';
	private $agenda_dok = '/BUKA SEGEL/KPU.03/';

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$all_buka_segel = BukaSegel::all();
		$buka_segel_list = BukaSegelResource::collection($all_buka_segel);
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
			'no_sprint' => 'required',
			'tgl_sprint' => 'required|date',
			'jenis_segel' => 'required',
			'jumlah_segel' => 'required|integer',
			'nama_saksi' => 'required',
			'pejabat1' => 'required'
		]);

        $no_dok_lengkap = $this->tipe_dok . '-' . $this->agenda_dok; 
		$tgl_sprint = strtotime($request->tgl_sprint);

		$insert_result = BukaSegel::create([
			'agenda_dok' => $this->agenda_dok,
			'no_dok_lengkap' => $no_dok_lengkap,
			'no_sprint' => $request->no_sprint,
			'tgl_sprint' => $tgl_sprint,
			'jenis_segel' => $request->jenis_segel,
			'jumlah_segel' => $request->jumlah_segel,
			'nomor_segel' => $request->nomor_segel,
			'tempat_segel' => $request->lokasi_segel,
			'nama_saksi' => $request->nama_saksi,
			'alamat_saksi' => $request->alamat_saksi,
			'pekerjaan_saksi' => $request->pekerjaan_saksi,
			'jns_identitas' => $request->jns_identitas,
			'no_identitas' => $request->no_identitas,
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
		$buka_segel = new BukaSegelResource(BukaSegel::findOrFail($id));
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
				'no_sprint' => 'required',
				'tgl_sprint' => 'required|date',
				'jenis_segel' => 'required',
				'jumlah_segel' => 'required|integer',
				'nama_saksi' => 'required',
				'pejabat1' => 'required'
			]);
	
			$tgl_sprint = date('Y-m-d', strtotime($request->tgl_sprint));
	
			$update_result = BukaSegel::where('id', $id)
				->update([
					'no_sprint' => $request->no_sprint,
					'tgl_sprint' => $tgl_sprint,
					'jenis_segel' => $request->jenis_segel,
					'jumlah_segel' => $request->jumlah_segel,
					'nomor_segel' => $request->nomor_segel,
					'tempat_segel' => $request->tempat_segel,
					'nama_saksi' => $request->nama_saksi,
					'alamat_saksi' => $request->alamat_saksi,
					'pekerjaan_saksi' => $request->pekerjaan_saksi,
					'jns_identitas' => $request->jns_identitas,
					'no_identitas' => $request->no_identitas,
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
