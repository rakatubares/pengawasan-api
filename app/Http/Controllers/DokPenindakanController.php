<?php

namespace App\Http\Controllers;

use App\Models\Penindakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokPenindakanController extends DokController
{
	/*
	 |--------------------------------------------------------------------------
	 | Document modify functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Store penindakan document's data
	 */
	protected function storePenindakanDocument($request)
	{
		DB::beginTransaction();
		try {
			// Save to database
			$this->storing($request);
			$this->saveData($request);
			$this->stored($request);
			
			// Commit query
			DB::commit();

			// Return data resource
			$resource = $this->form($this->doc->id);
			return $resource;
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}

	protected function storing($request)
	{
		// 
	}

	protected function stored($request)
	{
		// 
	}

	/**
	 * Update penindakan document's data
	 */
	protected function updatePenindakanDocument($request, $doc_id)
	{
		// Check if document is not published yet
		$this->getDocument($doc_id);
		$is_unpublished = $this->checkUnpublished();

		if ($is_unpublished) {
			DB::beginTransaction();

			try {
				// Validate data
				$this->validateData($request);

				// if (in_array('relation', $withOptions)) {$this->updateDocRelation($request);}

				// Update data
				$this->updating($request);
				$data = $this->prepareData($request, 'update');
				$this->doc->update($data);
				$this->updated($request);

				// Commit query
				DB::commit();
	
				// Return data
				$resource = $this->form($doc_id);
				return $resource;
			} catch (\Throwable $th) {
				DB::rollBack();
				throw $th;
			}
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan, tidak dapat mengupdate dokumen.'], 422);
			return $result;
		}
	}

	protected function updating($request)
	{
		// 
	}

	protected function updated($request)
	{
		// 
	}

	/*
	 |--------------------------------------------------------------------------
	 | Penindakan functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Validate data penindakan
	 * 
	 * @param Request $request
	 */
	protected function validatePenindakan(Request $request)
	{
		$request->validate([
			'penindakan.sprint.id' => 'required|integer',
			'penindakan.saksi.id' => 'required|integer',
			'penindakan.petugas1.user_id' => 'required'
		]);
	}

	/**
	 * Prepare/transform data penindakan
	 * 
	 * @param Request $request
	 */
	protected function preparePenindakan(Request $request)
	{
		$grup_lokasi_id = array_key_exists('grup_lokasi', $request->penindakan) ? $request->penindakan['grup_lokasi']['id'] : null;
		$lokasi_penindakan = array_key_exists('lokasi_penindakan', $request->penindakan) ? $request->penindakan['lokasi_penindakan'] : null;

		$data_penindakan = [
			'sprint_id' => $request->penindakan['sprint']['id'],
			'grup_lokasi_id' => $grup_lokasi_id,
			'lokasi_penindakan' => $lokasi_penindakan,
			'saksi_id' => $request->penindakan['saksi']['id'],
			'petugas1_id' => $request->penindakan['petugas1']['user_id'],
			'petugas2_id' => $request->penindakan['petugas2']
				? $request->penindakan['petugas2']['user_id']
				: null
		];

		return $data_penindakan;
	}

	/**
	 * Create new data
	 * 
	 * @param String $doc_type
	 * @param Array $data_dokumen
	 * @param Array $data_penindakan
	 */
	protected function storePenindakan($request, $empty_penindakan=false)
	{
		if (!$empty_penindakan) {
			$data_penindakan = $this->preparePenindakan($request);
		} else {
			$data_penindakan = [];
		}
		$this->penindakan = Penindakan::create($data_penindakan);
	}

	/**
	 * Update data
	 * 
	 * @param String $doc_type
	 * @param Array $data_dokumen
	 * @param Array $data_penindakan
	 */
	protected function updatePenindakan($request)
	{
		$data_penindakan = $this->preparePenindakan($request);
		Penindakan::where('id', $request->penindakan['id'])->update($data_penindakan);
	}

	protected function getPenindakan($doc_id)
	{
		$this->getDocument($doc_id);
		$this->penindakan = $this->doc->penindakan;
	}

	protected function getPenindakanDate($doc_id)
	{
		$this->getPenindakan($doc_id);
		$tanggal_penindakan = $this->doc->penindakan->tanggal_penindakan;

		if ($tanggal_penindakan == null) {
			$this->getCurrentDate();
			$this->penindakan->tanggal_penindakan = $this->date;
			$this->penindakan->save();
		} else {
			$this->date = $tanggal_penindakan->format('Y-m-d');
			$this->year = $tanggal_penindakan->format('Y');
		}
	}

	/**
	 * Create relation for new document
	 * 
	 * @param String $doc1_type
	 * @param Int $doc1_id
	 * @param String $doc2_type
	 * @param Int $doc2_id
	 * @param Int $source_status
	 */
	protected function createDocRelation($source_type, $source_id, $source_status)
	{
		$this->createRelation($source_type, $source_id, $this->doc_type, $this->doc->id);
		$source_model = $this->switchObject($source_type, 'model');
		$this->updateStatus($source_model::find($source_id), $source_status);
	}

	/**
	 * Create relation for new document
	 * 
	 * @param String $doc1_type
	 * @param Int $doc1_id
	 * @param String $doc2_type
	 * @param Int $doc2_id
	 * @param Int $source_status
	 */
	protected function deleteDocRelation($source_type, $source_status)
	{
		$this->updateStatus($this->doc->$source_type, $source_status);
		$this->deleteRelation($source_type, $this->doc->$source_type->id, $this->doc_type, $this->doc->id);
	}
}
