<?php

namespace App\Http\Controllers;

use App\Models\DokLap;
use App\Models\ObjectRelation;
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

	protected function createPenindakan($request, $empty_penindakan=false)
	{
		$this->storePenindakan($request, $empty_penindakan);
		$this->attachPenindakan();
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

	protected function deletePenindakan()
	{
		$this->getPenindakan($this->doc->id);
		$this->deleteRelation('penindakan', $this->penindakan->id, $this->doc_type, $this->doc->id);
		$this->penindakan->delete();
	}

	protected function attachPenindakan($penindakan_id=null)
	{
		if ($penindakan_id == null) {$penindakan_id = $this->penindakan->id;}
		$this->createRelation('penindakan', $penindakan_id, $this->doc_type, $this->doc->id);
	}

	protected function detachPenindakan()
	{
		$this->deleteRelation('penindakan', $this->doc->penindakan->id, $this->doc_type, $this->doc->id);
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

	/**
	 * Create relation with LAP
	 * 
	 * @param Int $lap_id
	 */
	protected function attachLap($lap_id) {
		$this->createRelation('lap', $lap_id, 'penindakan', $this->penindakan->id);
		$this->updateStatus(DokLap::find($lap_id), 107);
	}

	/**
	 * Delete relation with LAP
	 */
	protected function detachLap()
	{
		$penindakan = $this->doc->penindakan;
		$lap_id = $penindakan->lap->id;
		$this->deleteRelation('lap', $lap_id, 'penindakan', $penindakan->id);
		$this->updateStatus(DokLap::find($lap_id), 200);
	}

	protected function getRelatedDocuments($id)
	{
		$array = [[
			'doc_type' => $this->doc_type,
			'doc_id' => (int)$id,
		]];

		// Penindakan
		$this->getPenindakan($id);
		$penindakan_id = $this->penindakan->id;
		$docs_penindakan = $this->getPenindakanDocuments($penindakan_id);
		foreach ($docs_penindakan as $key => $doc) {
			if ($doc['doc_type'] == $this->doc_type) {
				unset($docs_penindakan[$key]);
			}
		}

		// Intelijen
		$docs_intelijen = [];
		$lap = $this->penindakan->lap;
		if ($lap != null) {
			$nhi = $lap->nhi;
			if ($nhi != null) {
				$docs_intelijen = DokIntelijenController::getIntelijenDocuments($nhi->intelijen->id);
			}

			$docs_intelijen[] = [
				'doc_type' => 'lap',
				'doc_id' => $lap->id
			];
		}

		// Penyidikan
		if ($this->penindakan->penyidikan != null) {
			$penyidikan_id = $this->penindakan->penyidikan->id;
			$docs_penyidikan = DokPenyidikanController::getPenyidikanDocuments($penyidikan_id);
		} else {
			$docs_penyidikan = [];
		}

		// Merge array
		$array = array_merge($array, $docs_intelijen, $docs_penindakan, $docs_penyidikan);
		return $array;
	}

	/**
	 * Get documents related to penindakan
	 * 
	 * @param Int $penindakan_id
	 * @return Array
	 */
	public static function getPenindakanDocuments($penindakan_id)
	{
		$array = [];

		$docs = ObjectRelation::where('object1_type', 'penindakan')
			->where('object1_id', $penindakan_id)
			->where('object2_type', '<>', 'penyidikan')
			->get();
		foreach ($docs as $doc) {
			$array[] = [
				'doc_type' => $doc->object2_type,
				'doc_id' => $doc->object2_id,
			];
		}

		$penindakan = Penindakan::find($penindakan_id);

		// Relations from BA Segel
		$segel = $penindakan->segel;
		if ($segel != null) {
			$titip = $segel->titip;
			if ($titip != null) {
				$array[] = ['doc_type' => 'titip', 'doc_id' => $titip->id];
			}
		}
		
		// Relations from SBP
		$sbp_type = (($penindakan->sbp != null) ? 'sbp' : 
			(($penindakan->sbpn != null) ? 'sbpn' : null)
		);
		if ($sbp_type != null) {
			$sbp = $penindakan->$sbp_type;
			if ($sbp_type == 'sbp') {
				$lptp_type = 'lptp';
				$lphp_type = 'lphp';
				$lp_type = 'lp';
			} else {
				$lptp_type = 'lptpn';
				$lphp_type = 'lphpn';
				$lp_type = 'lpn';
			}
			
			// Relations from LPTP
			$lptp = $sbp->lptp;
			if ($lptp != null) {
				$array[] = ['doc_type' => $lptp_type, 'doc_id' => $lptp->id];
				$lphp = $lptp->lphp;
				if ($lphp != null) {
					$array[] = ['doc_type' => $lphp_type, 'doc_id' => $lphp->id];
					$lp = $lphp->lp;
					if ($lp != null) {
						$array[] = ['doc_type' => $lp_type, 'doc_id' => $lp->id];
					}
				}
			}

			// Relations from BA Tolak
			$tolak1 = $sbp->tolak1;
			if ($tolak1 != null) {
				$array[] = ['doc_type' => 'tolak1', 'doc_id' => $tolak1->id];
				$tolak2 = $tolak1->tolak2;
				if ($tolak2 != null) {
					$array[] = ['doc_type' => 'tolak2', 'doc_id' => $tolak2->id];
				}
			}
		}

		return $array;
	}
}
