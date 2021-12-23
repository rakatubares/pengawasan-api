<?php

namespace App\Http\Controllers;

use App\Http\Resources\SegelResource;
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

	/*
	 |--------------------------------------------------------------------------
	 | DISPLAY functions
	 |--------------------------------------------------------------------------
	 */

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
	 * Display object type
	 * 
	 * @param int $id
	 */
	public function objek($id)
	{
		$objek = new SegelResource(Segel::find($id), 'objek');
		return $objek;
	}

	/**
	 * Display resource based on search query
	 * 
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function search(Request $request)
	{
		$s = $request->s;
		$search = '%' . $s . '%';
		$search_result = Segel::where('no_dok_lengkap', 'like', $search)
			->where('kode_status', 200)
			->orderBy('created_at', 'desc')
			->take(5)
			->get();
		$search_list = SegelTableResource::collection($search_result);
		return $search_list;
	}

	/*
	 |--------------------------------------------------------------------------
	 | Data modify functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Validate request
	 */
	private function validateSegel(Request $request)
	{
		$request->validate([
			'main.data.jenis_segel' => 'required',
			'main.data.jumlah_segel' => 'required|integer',
		]);
	}

	/**
	 * Prepare data segel
	 */
	private function prepareData(Request $request, $state='insert')
	{
		$no_dok_lengkap = $this->tipe_dok . '-' . $this->agenda_dok; 

		$data_segel = [
			'jenis_segel' => $request->main['data']['jenis_segel'],
			'jumlah_segel' => $request->main['data']['jumlah_segel'],
			'satuan_segel' => $request->main['data']['satuan_segel'],
			'tempat_segel' => $request->main['data']['tempat_segel'],
		];

		if ($state == 'insert') {
			$data_segel['agenda_dok'] = $this->agenda_dok;
			$data_segel['no_dok_lengkap'] = $no_dok_lengkap;
			$data_segel['nomor_segel'] = $no_dok_lengkap;
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
		// Validate data penindakan if not from linked doc
		if ($linked_doc == false) {
			$this->validatePenindakan($request); 
		}

		// Validate data segel
		$this->validateSegel($request);

		DB::beginTransaction();
		try {

			// Save data segel
			$data_segel = $this->prepareData($request, 'insert');
			$segel = Segel::create($data_segel);

			// Save data penindakan and create object relation
			if ($linked_doc == false) {
				$this->storePenindakan($request, 'segel', $segel->id);
			}

			// Commit store query
			DB::commit();

			// Return created segel
			$segel_resource = new SegelResource(Segel::findOrFail($segel->id));
			return $segel_resource;
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id, $linked_doc=false)
	{
		// Check if document is not published yet
		$is_unpublished = $this->checkUnpublished(Segel::class, $id);

		// Update if not published
		if ($is_unpublished) {
			DB::beginTransaction();

			try {
				// Validate data segel
				$this->validateSegel($request);

				// Update BA Segel
				$data_segel = $this->prepareData($request, 'update');
				Segel::where('id', $id)->update($data_segel);

				// Update data penindakan if not from linked doc
				if ($linked_doc == false) {
					$this->validatePenindakan($request); 
					$this->updatePenindakan($request);
				}

				// Commit store query
				DB::commit();

				// Return updated SBP
				$segel_resource = new SegelResource(Segel::findOrFail($id));
				$result = $segel_resource;
			} catch (\Throwable $th) {
				DB::rollBack();
				throw $th;
			}
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan, tidak dapat mengupdate dokumen.'], 422);
		}
		
		return $result;
	}

	/**
	 * Terbitkan penomoran dokumen
	 * 
	 * @param  int  $id
	 */
	public function publish($id)
	{
		DB::beginTransaction();

		try {
			// Create array from SBP object
			$segel = new SegelResource(Segel::find($id));
			$arr = json_decode($segel->toJson(), true);

			// Check penindakan date
			$year = $this->datePenindakan(Segel::class, $id);
		
			// Publish each document
			foreach ($arr['dokumen'] as $type => $data) {
				$this->publishDocument($type, $data['id'], $year);
			}

			// Commit transaction
			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}

	/*
	 |--------------------------------------------------------------------------
	 | Destroy or publish functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		DB::beginTransaction();
		try {
			$is_unpublished = $this->checkUnpublished(Segel::class, $id);
			if ($is_unpublished) {
				Segel::find($id)->delete();
			}
			
			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}

	
}
