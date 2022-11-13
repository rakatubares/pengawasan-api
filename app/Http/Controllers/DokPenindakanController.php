<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokPenindakanController extends DokController
{
	/*
	 |--------------------------------------------------------------------------
	 | Data modify functions
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
			$this->saveData($request);
			$this->handleStorePenindakan($request);
			
			// Commit query
			DB::commit();

			// Return data resource
			$resource = $this->display($this->doc->id);
			return $resource;
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}

	/**
	 * Update penindakan document's data
	 */
	protected function updatePenindakanDocument($request, $doc_id, $withOptions=[])
	{
		// Check if document is not published yet
		$this->getDocument($doc_id);
		$is_unpublished = $this->checkUnpublished();

		if ($is_unpublished) {
			DB::beginTransaction();

			try {
				// Validate data
				$this->validateData($request);

				if (in_array('relation', $withOptions)) {$this->updateDocRelation($request);}

				// Update data
				$data = $this->prepareData($request, 'update');
				$this->doc->update($data);

				// Commit query
				DB::commit();
	
				// Return data
				$resource = new $this->resource($this->model::findOrFail($doc_id), 'display');
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
