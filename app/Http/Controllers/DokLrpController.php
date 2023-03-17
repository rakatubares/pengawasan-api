<?php

namespace App\Http\Controllers;

use App\Models\DokLhp;
use Illuminate\Http\Request;

class DokLrpController extends DokPenyidikanController
{
	public function __construct($doc_type='lrp')
	{
		parent::__construct($doc_type);
	}

	protected function getPenyidikan($id)
	{
		$this->getDocument($id);
		$this->penyidikan = $this->doc->lhp->split->lpf->lpp->penyidikan;
	}

	public function bhp($id)
	{
		$this->getPenyidikan($id);
		$bhp_resource = $this->getBhpData();
		
		return $bhp_resource;
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
			'id_lhp' => 'integer|required',
			'penyidik.user_id' => 'integer|required',
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
		$no_dok_lengkap = $this->tipe_surat . '-      ' . $this->agenda_dok;
		$jenis_tanggal = [
			'tanggal_lk', 
			'tanggal_sptp',
			'tanggal_spdp',
		];
		foreach ($jenis_tanggal as $tanggal) {
			if ($request->$tanggal != null) {
				$request->$tanggal = date('Y-m-d', strtotime($request->$tanggal));
			}
		}

		$data_lrp = [
			'no_lk' => $request->no_lk,
			'tanggal_lk' => $request->tanggal_lk,
			'no_sptp' => $request->no_sptp,
			'tanggal_sptp' => $request->tanggal_sptp,
			'no_spdp' => $request->no_spdp,
			'tanggal_spdp' => $request->tanggal_spdp,
			'alat_bukti_surat' => $request->alat_bukti_surat,
			'alat_bukti_petunjuk' => $request->alat_bukti_petunjuk,
			'alternatif_penyelesaian' => $request->alternatif_penyelesaian,
			'informasi_lain' => $request->informasi_lain,
			'catatan' => $request->catatan,
			'penyidik_id' => $request->penyidik['user_id'],
			'kode_jabatan1' => $request->atasan1['jabatan']['kode'],
			'plh1' => $request->atasan1['plh'],
			'pejabat1_id' => $request->atasan1['user']['user_id'],
			'kode_jabatan2' => $request->atasan2['jabatan']['kode'],
			'plh2' => $request->atasan2['plh'],
			'pejabat2_id' => $request->atasan2['user']['user_id'],
		];

		if ($state == 'insert') {
			$data_lrp['agenda_dok'] = $this->agenda_dok;
			$data_lrp['no_dok_lengkap'] = $no_dok_lengkap;
			$data_lrp['kode_status'] = 100;
		}

		return $data_lrp;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$lhp = DokLhp::find($request->id_lhp);
		if ($lhp->kode_status == 200) {
			$this->penyidikan = $lhp->split->lpf->lpp->penyidikan;
			$result = $this->storePenyidikanDocument($request);
			return $result;
		} else {
			$result = response()->json(['error' => `Dokumen LHP sudah ditindaklanjuti.`], 422);
			return $result;
		}
	}

	protected function stored($request)
	{
		// Save Entities
		$this->saveEntities($request, 'saksi');
		$this->saveEntities($request, 'ahli');

		// Attach to LHP
		$this->attachLhp($request->id_lhp);
		$this->penyidikan->lpp->lpf->split->lhp->update(['kode_status' => 135]);
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
		// Check LHP availability
		$availability = true;
		$this->getDocument($id);
		$existing_lhp = $this->doc->lhp;
		if ($existing_lhp->id != $request->id_lhp) {
			$new_lhp = DokLhp::find($request->id_lhp);
			if ($new_lhp->kode_status != 200) {
				$availability = false;
			}
		}

		// Update LRP
		if ($availability == true) {
			$result = $this->updatePenyidikanDocument($request, $id);
			return $result;
		} else {
			$result = response()->json(['error' => `Dokumen LHP sudah ditindaklanjuti.`], 422);
			return $result;
		}
	}

	protected function updating($request)
	{
		$existing_lhp = $this->doc->lhp;
		if ($existing_lhp->id != $request->id_lhp) {
			// Detach from previous LHP
			$this->detachLhp();

			// Attach to new LHP and change status
			$this->attachLhp($request->id_lhp);
			DokLhp::find($request->id_lhp)->update(['kode_status' => 135]);
		}	
	}

	protected function updated($request)
	{
		// Update entities
		$this->saveEntities($request, 'saksi');
		$this->saveEntities($request, 'ahli');
	}

	protected function published()
	{
		$lhp = $this->doc->lhp;
		$lhp->update(['kode_status' => 235]);
	}

	private function saveEntities($request, $type)
	{
		$entity_ids = array_map(function ($entity)
		{
			return $entity['id'];
		}, $request->$type);
		$entity_ids = array_unique($entity_ids);
		$entity_ids = array_filter($entity_ids, 'strlen');
		$this->doc->$type()->syncWithPivotValues($entity_ids, ['position' => $type]);
	}

	/*
	 |--------------------------------------------------------------------------
	 | LHP functions
	 |--------------------------------------------------------------------------
	 */
	
	private function attachLhp($id_lhp)
	{
		$this->createRelation(
			'lhp',
			$id_lhp,
			'lrp',
			$this->doc->id
		);
	}

	public function detachLhp()
	{
		$this->doc->lhp->update(['kode_status' => 200]);
		$this->deleteRelation(
			'lhp',
			$this->doc->lhp->id,
			'lrp',
			$this->doc->id
		);
	}
}
