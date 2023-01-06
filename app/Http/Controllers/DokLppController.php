<?php

namespace App\Http\Controllers;

use App\Http\Resources\ObjectResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokLppController extends DokPenyidikanController
{
	public function __construct($doc_type='lpp')
	{
		parent::__construct($doc_type);
	}

	public function objek($id)
	{
		$lpp = $this->getDocument($id, $this->doc_type);
		$penindakan = $lpp->penyidikan->penindakan;
		$object_resource = new ObjectResource($penindakan->objectable, $penindakan->object_type);
		return $object_resource;
	}

	/*
	 |--------------------------------------------------------------------------
	 | Data modify functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Validate request
	 * 
	 * @param  \Illuminate\Http\Request  $request
	 */
	protected function validateData(Request $request)
	{
		$request->validate([
			'asal_perkara' => 'required',
			'waktu_pelanggaran' => 'date',
		]);
	}

	/**
	 * Prepare data from request to array
	 * 
	 * @param Request $request
	 * @param String $state
	 * @return Array
	 */
	protected function prepareData(Request $request, $state='insert')
	{
		$no_dok_lengkap = $this->tipe_surat . '-' . '      ' . $this->agenda_dok;

		$data_lpp = [
			'asal_perkara' => $request->asal_perkara,
			'jenis_penindakan' => $request->jenis_penindakan,
			'jenis_perkara' => $request->jenis_perkara,
			'status_pelanggaran' => $request->status_pelanggaran,
			'catatan' => $request->catatan,
			'petugas_id' => $request->petugas['user_id'],
			'kode_jabatan1' => $request->atasan1['jabatan']['kode'],
			'plh1' => $request->atasan1['plh'],
			'pejabat1_id' => $request->atasan1['user']['user_id'],
			'kode_jabatan2' => $request->atasan2['jabatan']['kode'],
			'plh2' => $request->atasan2['plh'],
			'pejabat2_id' => $request->atasan2['user']['user_id'],
			'kode_status' => $request->kode_status,
		];

		if ($state == 'insert') {
			$data_lpp['agenda_dok'] = $this->agenda_dok;
			$data_lpp['no_dok_lengkap'] = $no_dok_lengkap;
			$data_lpp['kode_status'] = 100;
		}

		return $data_lpp;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$lp = $this->getLp($request->lp_type, $request->id_lp);
		$is_available = $this->checkLp($lp);
		if ($is_available) {
			$this->penindakan = $lp->lphp->lptp->sbp->penindakan;
			$result = $this->storePenyidikanDocument($request);
			return $result;
		} else {
			$result = response()->json(['error' => `Dokumen LP sudah ditindaklanjuti.`], 422);
			return $result;
		}
	}

	protected function stored($request)
	{
		$this->storePenyidikan($request);
		$this->attachPenyidikan();
		$this->attachPenindakan();
		$lp = $this->getLpByPenindakan();
		$lp->update(['kode_status' => 131]);
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
		$this->getDocument($id);
		$is_unpublished = $this->checkUnpublished();
		if ($is_unpublished) {
			// Validate data
			$this->validateData($request);

			// Check LP
			$this->getPenyidikan($this->doc->id);
			$existing_lp = $this->getLpByPenindakan();
			$existing_lp_type = $existing_lp->lphp->lp_relation->object2_type;

			if (
				($request->lp_type != $existing_lp_type) ||
				($request->id_lp != $existing_lp->id)
			) {
				$request_lp = $this->getLp($request->lp_type, $request->id_lp);
				$lp_available = $this->checkLp($request_lp);
			} else {
				$lp_available = true;
			}

			// Update data
			if ($lp_available) {
				DB::beginTransaction();

				try {
					// Update LPP
					$data = $this->prepareData($request, 'update');
					$this->doc->update($data);

					// Update LP
					if (
						($request->lp_type != $existing_lp_type) ||
						($request->id_lp != $existing_lp->id)
					) {
						// Detach from previous penindakan
						$this->detachPenindakan();
						$existing_lp->update(['kode_status' => 200]);

						// Attach to new penindakan
						$request_penindakan_id = $request_lp->lphp->lptp->sbp->penindakan->id;
						$this->attachPenindakan($request_penindakan_id);
						$request_lp->update(['kode_status' => 131]);
					}

					// Update penyidikan
					$this->updatePenyidikan($request);

					// Commit query
					DB::commit();
		
					// Return data
					$resource = $this->form($id);
					return $resource;
				} catch (\Throwable $th) {
					DB::rollBack();
					throw $th;
				}
			} else {
				$result = response()->json(['error' => `Dokumen LP sudah ditindaklanjuti.`], 422);
				return $result;
			}
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan, tidak dapat mengupdate dokumen.'], 422);
			return $result;
		}
	}

	protected function published()
	{
		$lp = $this->getLpByPenindakan();
		$lp->update(['kode_status' => 231]);
	}

	private function getLp($lp_type, $id_lp)
	{
		$lp_model = $this->switchObject($lp_type, 'model');
		$lp = $lp_model::find($id_lp);
		return $lp;
	}

	private function getLpByPenindakan()
	{
		$penindakan = $this->doc->penyidikan->penindakan;
		$sbp_type = $penindakan->sbp_relation->object2_type;
		$lp = $penindakan->$sbp_type->lptp->lphp->lp;
		return $lp;
	}

	private function checkLp($lp)
	{
		if ($lp->kode_status == 200) {
			return true;
		} else {
			return false;
		}
	}
}
