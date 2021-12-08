<?php

namespace App\Http\Controllers;

use App\Http\Resources\DetailStatusResource;
use App\Http\Resources\SegelResource;
use App\Http\Resources\SegelResource2;
use App\Http\Resources\SegelTableResource;
use App\Models\Segel;
use App\Traits\DokumenTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SegelController extends Controller
{
	use DokumenTrait;

	private $tipe_dok = 'BA';
	private $agenda_dok = '/SEGEL/KPU.03/BD.05/';

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
	 * Validate request
	 */
	private function validateSegel(Request $request)
	{
		$request->validate([
			// 'sprint.id' => 'required|integer',
			'jenis_segel' => 'required',
			'jumlah_segel' => 'required|integer',
			// 'saksi.id' => 'required|integer',
			// 'petugas1.user_id' => 'required'
		]);
	}

	/**
	 * Prepare data segel
	 */
	private function prepareData(Request $request, $state='insert')
	{
		$no_dok_lengkap = $this->tipe_dok . '-' . $this->agenda_dok; 

		$data_segel = [
			'jenis_segel' => $request->jenis_segel,
			'jumlah_segel' => $request->jumlah_segel,
			'satuan_segel' => $request->satuan_segel,
			'nomor_segel' => $no_dok_lengkap,
			'tempat_segel' => $request->tempat_segel,
		];

		if ($state == 'insert') {
			$data_segel['agenda_dok'] = $this->agenda_dok;
			$data_segel['no_dok_lengkap'] = $no_dok_lengkap;
			$data_segel['kode_status'] = 100;
		}

		return $data_segel;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request, $linked_doc=false)
	{
		// Validate data segel
		$this->validateSegel($request);

		DB::beginTransaction();
		try {
			// Validate data segel
			$this->validateSegel($request);

			// Save data segel
			$data_segel = $this->prepareData($request, 'insert');
			$segel = Segel::create($data_segel);

			// Commit store query
			DB::commit();

			// Return created segel
			$segel_resource = new SegelResource(Segel::findOrFail($segel->id));
			return $segel_resource;
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}

		// return $insert_result;
		// return $request;
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
			$this->validateSegel($request);

			$data_segel = $this->prepareData($request, 'update');
			$update_result = Segel::where('id', $id)->update($data_segel);
	
			// $tgl_sprint = date('Y-m-d', strtotime($request->tgl_sprint));
	
			// $update_result = Segel::where('id', $id)
			// 	->update([
			// 		'sprint_id' => $request->sprint['id'],
			// 		'jenis_segel' => $request->jenis_segel,
			// 		'jumlah_segel' => $request->jumlah_segel,
			// 		'nomor_segel' => $request->nomor_segel,
			// 		'lokasi_segel' => $request->lokasi_segel,
			// 		'saksi_id' => $request->saksi['id'],
			// 		'petugas1_id' => $request->petugas1['user_id'],
			// 		'petugas2_id' => $request->petugas2['user_id'],
			// 		'kode_status' => 101,
			// 	]);
	
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
