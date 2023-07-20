<?php

namespace App\Http\Controllers;

use App\Models\Intelijen;
use App\Models\ObjectRelation;
use Illuminate\Support\Facades\DB;

class DokIntelijenController extends DokController
{
	/*
	 |--------------------------------------------------------------------------
	 | Document modify functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Store intelijen document's data
	 */
	protected function storeIntelDocument($request, $withOptions=[])
	{
		DB::beginTransaction();
		try {
			// Save to database
			$this->saveData($request);
			$this->handleStoreIntel($request);

			if (in_array('ikhtisar', $withOptions)) {$this->saveIkhtisar($request);}
			if (in_array('cc', $withOptions)) {$this->saveCc($request);}
			
			// Commit query
			DB::commit();

			// Return data resource
			$resource = $this->display($this->doc->id);
			return $resource;
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
			// $result = response()->json(['error' => 'Gagal menyimpan dokumen.'], 500);
			// return $result;
		}
	}
	
	/**
	 * Update intelijen document's data
	 */
	protected function updateIntelDocument($request, $doc_id, $withOptions=[])
	{
		// Check if document is not published yet
		$this->getDocument($doc_id);
		$is_unpublished = $this->checkUnpublished();

		if ($is_unpublished) {
			DB::beginTransaction();

			try {
				// Validate data
				$this->validateData($request);

				// Update data
				$data = $this->prepareData($request, 'update');
				$this->doc->update($data);

				if (in_array('ikhtisar', $withOptions)) {$this->updateIntelIkhtisar($request, $doc_id);}
				if (in_array('linked_doc', $withOptions)) {$this->updateLinkedDoc($request, $doc_id);}

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

	/*
	 |--------------------------------------------------------------------------
	 | Details modify functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Save ikhtisar
	 */
	protected function saveIkhtisar($request)
	{
		$this->intelijen->ikhtisar()->createMany($request->ikhtisar);
	}

	/**
	 * Get existing ikhtisar
	 */
	protected function getIkhtisar()
	{
		$existing_ikhtisar = $this->intelijen->ikhtisar->toArray();
		$existing_ikhtisar_ids = array_map(function($ikhtisar)
		{
			return $ikhtisar['id'];
		}, $existing_ikhtisar);
		return $existing_ikhtisar_ids;
	}

	/**
	 * Update ikhtisar
	 */
	protected function updateIkhtisar($request)
	{
		// Map data ikhtisar
		$update_ids = [];
		foreach ($request->ikhtisar as $ikhtisar) {
			// Delete index key
			unset($ikhtisar['index']);

			// Insert intelijen id
			$ikhtisar['intelijen_id'] = $this->intelijen->id;

			// Map array to insert/update data
			if (isset($ikhtisar['id'])) {
				$this->intelijen->ikhtisar()->find($ikhtisar['id'])->update($ikhtisar);
				array_push($update_ids, $ikhtisar['id']);
			} else {
				$this->intelijen->ikhtisar()->create($ikhtisar);
			}
		}
		return $update_ids;
	}

	/**
	 * Delete unused ikhtisar
	 */
	protected function deleteIkhtisar($existing_ids, $update_ids)
	{
		foreach ($existing_ids as $ikhtisar_id) {
			if (!in_array($ikhtisar_id, $update_ids)) {
				$this->intelijen->ikhtisar()->find($ikhtisar_id)->delete();
			}
		}
	}

	/**
	 * Save tembusan surat
	 */
	protected function saveCc($request)
	{
		$cc_list = array_filter($request->tembusan, 'strlen');
		if (sizeof($cc_list) > 0) {
			app(TembusanController::class)->setCc($this->model, $this->doc->id, $cc_list);
		}
	}

	/**
	 * Update tembusan surat
	 */
	protected function upateCc($request, $doc_id)
	{
		$cc_list = array_filter($request->tembusan, 'strlen');
		app(TembusanController::class)->setCc($this->model, $doc_id, $cc_list);
	}

	/**
	 * Update linked document's status
	 */
	protected function updateLinkedStatus($linked_model, $linked_id, $status)
	{
		$linked_doc = $linked_model::find($linked_id);
		$linked_doc->update(['kode_status' => $status]);
		$this->intelijen = $linked_doc->intelijen;
	}

	/**
	 * Rollback linked document's status
	 */
	protected function rollbackLinkedStatus($doc_id, $linked_doc)
	{
		$linked_doc->update(['kode_status' => 200]);
		$this->deleteIntelRelation($this->intelijen->id, $doc_id);
	}

	/*
	 |--------------------------------------------------------------------------
	 | Intelijen functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Get document's intelijen object
	 */
	protected function getIntel($doc_id)
	{
		$this->intelijen = $this->model::find($doc_id)->intelijen;
	}

	/**
	 * Create new intel object
	 */
	protected function createIntel()
	{
		$this->intelijen = Intelijen::create();
	}

	/**
	 * Delete intel object
	 */
	protected function deleteIntel($doc_id)
	{
		$this->intelijen->ikhtisar()->delete();
		$this->deleteIntelRelation($this->intelijen->id, $doc_id);
	}

	/**
	 * Create new intel relation
	 */
	protected function createIntelRelation($intelijen_id, $doc_id)
	{
		ObjectRelation::create([
			'object1_type' => 'intelijen',
			'object1_id' => $intelijen_id,
			'object2_type' => $this->doc_type,
			'object2_id' => $doc_id,
		]);
	}

	/**
	 * Delete relation
	 */
	protected function deleteIntelRelation($intelijen_id, $doc_id)
	{
		ObjectRelation::where([
			'object1_type' => 'intelijen',
			'object1_id' => $intelijen_id,
			'object2_type' => $this->doc_type,
			'object2_id' => $doc_id,
		])->delete();
	}

	protected function getRelatedDocuments($id)
	{
		$array = [[
			'doc_type' => $this->doc_type,
			'doc_id' => (int)$id,
		]];

		$this->getIntel($id);
		$intelijen_id = $this->intelijen->id;
		$docs_intelijen = $this->getIntelijenDocuments($intelijen_id);
		foreach ($docs_intelijen as $doc) {
			if ($doc['doc_type'] != $this->doc_type) {
				$array[] = $doc;
			}
		}

		$nhi = $this->intelijen->nhi;
		if ($nhi != null) {
			$lap = $nhi->lap;
			if ($lap != null) {
				$array[] = [
					'doc_type' => 'lap',
					'doc_id' => $lap->id
				];

				$penindakan = $lap->penindakan;
				if ($penindakan != null) {
					$docs_penindakan = DokPenindakanController::getPenindakanDocuments($penindakan->id);
					foreach ($docs_penindakan as $doc) {
						$array[] = $doc;
					}
				}
			}
		}

		$nhin = $this->intelijen->nhin;
		if ($nhin != null) {
			$lapn = $nhin->lapn;
			if ($lapn != null) {
				$array[] = [
					'doc_type' => 'lapn',
					'doc_id' => $lapn->id
				];

				$penindakan = $lapn->penindakan;
				if ($penindakan != null) {
					$docs_penindakan = DokPenindakanController::getPenindakanDocuments($penindakan->id);
					foreach ($docs_penindakan as $doc) {
						$array[] = $doc;
					}
				}
			}
		}
		return $array;
	}

	/**
	 * Get documents related to intelijen
	 * 
	 * @param Int $intelijen_id
	 * @return Array
	 */

	public static function getIntelijenDocuments($intelijen_id)
	{
		$array = [];

		$docs = ObjectRelation::where('object1_type', 'intelijen')
			->where('object1_id', $intelijen_id)
			->get();
		foreach ($docs as $doc) {
			$array[] = [
				'doc_type' => $doc->object2_type,
				'doc_id' => $doc->object2_id,
			];
		}

		return $array;
	}
}