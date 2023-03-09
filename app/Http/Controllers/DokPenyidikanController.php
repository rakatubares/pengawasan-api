<?php

namespace App\Http\Controllers;

use App\Http\Resources\DetailBarangResource;
use App\Models\ObjectRelation;
use App\Models\Penyidikan;
use Illuminate\Support\Facades\DB;

class DokPenyidikanController extends DokController
{
	protected function getBhpData()
	{
		$bhp = $this->penyidikan->bhp;
		if ($bhp != null) {
			$bhp_resource = new DetailBarangResource($bhp);
		} else {
			$bhp_resource = null;
		}
		return $bhp_resource;
	}

    protected function storePenyidikanDocument($request)
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
	 * Update penyidikan document's data
	 */
	protected function updatePenyidikanDocument($request, $doc_id)
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
	 | Penyidikan functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Get penyidikan
	 */
	protected function getPenyidikan($doc_id)
	{
		$this->getDocument($doc_id);
		$this->penyidikan = $this->doc->penyidikan;
	}

	/**
	 * Prepare/transform data pennyidikan
	 */
	protected function preparePenyidikan($request)
	{
		$waktu_pelanggaran = date('Y-m-d H:i:s', strtotime($request->waktu_pelanggaran));

		$data_penyidikan = [
			'jenis_pelanggaran' => $request->jenis_pelanggaran,
			'pasal' => $request->pasal,
			'tempat_pelanggaran' => $request->tempat_pelanggaran,
			'waktu_pelanggaran' => $waktu_pelanggaran,
			'modus' => $request->modus,
			'pelaku_id' => $request->pelaku['id'],
			'status_penangkapan' => $request->status_penangkapan,
		];

		return $data_penyidikan;
	}

	protected function createPenyidikan($request)
	{
		$this->storePenyidikan($request);
		$this->attachPenyidikan();
	}

	/**
	 * Create new penyidikan
	 */
	protected function storePenyidikan($request)
	{
		$data_penyidikan = $this->preparePenyidikan($request);
		$this->penyidikan = Penyidikan::create($data_penyidikan);
	}

	protected function updatePenyidikan($request)
	{
		$data_penyidikan = $this->preparePenyidikan($request);
		$this->penyidikan->update($data_penyidikan);
	}

	protected function attachPenyidikan($penyidikan_id=null)
	{
		if ($penyidikan_id == null) {$penyidikan_id = $this->penyidikan->id;}
		$this->createRelation(
			'penyidikan', 
			$penyidikan_id, 
			$this->doc_type, 
			$this->doc->id
		);
	}

	protected function attachPenindakan($penindakan_id=null)
	{
		if ($penindakan_id == null) {$penindakan_id = $this->penindakan->id;}
		$this->createRelation(
			'penindakan', 
			$penindakan_id, 
			'penyidikan', 
			$this->penyidikan->id
		);
	}

	protected function detachPenindakan()
	{
		$this->deleteRelation(
			'penindakan', 
			$this->penyidikan->penindakan->id, 
			'penyidikan', 
			$this->penyidikan->id
		);
	}

	protected function getRelatedDocuments($id)
	{
		$array = [[
			'doc_type' => $this->doc_type,
			'doc_id' => (int)$id,
		]];
		
		// Penyidikan
		$this->getPenyidikan($id);
		$penyidikan_id = $this->penyidikan->id;
		$docs_penyidikan = $this->getPenyidikanDocuments($penyidikan_id);
		foreach ($docs_penyidikan as $key => $doc) {
			if ($doc['doc_type'] == $this->doc_type) {
				unset($docs_penyidikan[$key]);
			}
		}

		// Penindakan
		$penindakan_id = $this->penyidikan->penindakan->id;
		$docs_penindakan = DokPenindakanController::getPenindakanDocuments($penindakan_id);

		// Merge array
		$array = array_merge($array, $docs_penindakan, $docs_penyidikan);
		return $array;
	}

	public static function getPenyidikanDocuments($penyidikan_id)
	{
		$array = [];

		$docs = ObjectRelation::where('object1_type', 'penyidikan')
			->where('object1_id', $penyidikan_id)
			->get();
		foreach ($docs as $doc) {
			$array[] = [
				'doc_type' => $doc->object2_type,
				'doc_id' => $doc->object2_id,
			];
		}

		$penyidikan = Penyidikan::find($penyidikan_id);

		$lpp = $penyidikan->lpp;
		if ($lpp != null) {
			$lpf = $lpp->lpf;
			if ($lpf != null) {
				$array[] = ['doc_type' => 'lpf', 'doc_id' => $lpf->id];
				$split = $lpf->split;
				if ($split != null) {
					$array[] = ['doc_type' => 'split', 'doc_id' => $split->id];
					$lhp = $split->lhp;
					if ($lhp != null) {
						$array[] = ['doc_type' => 'lhp', 'doc_id' => $lhp->id];
					}
				}	
			}
		}

		return $array;
	}
}
