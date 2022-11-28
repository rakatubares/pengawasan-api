<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokBukaSegelController extends DokPenindakanController
{
	public function __construct($doc_type='bukasegel')
	{
		parent::__construct($doc_type);
	}

	/*
	 |--------------------------------------------------------------------------
	 | Data modify functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Validate request
	 */
	protected function validateData(Request $request)
	{
		$request->validate([
			'sprint.id' => 'required|integer',
			'segel.id' => 'nullable|integer',
			'jenis_segel' => 'required',
			'jumlah_segel' => 'required|integer',
			'nomor_segel' => 'required',
			'saksi.id' => 'required|integer',
			'petugas1.user_id' => 'required'
		]);
	}

	protected function prepareData(Request $request, $state='insert')
	{
		$no_dok_lengkap = $this->tipe_surat . '-     ' . $this->agenda_dok;
		$tanggal_segel = date('Y-m-d', strtotime($request->tanggal_segel));

		$data_buka_segel = [
			'sprint_id' => $request->sprint['id'],
			'nomor_segel' => $request->nomor_segel,
			'tanggal_segel' => $tanggal_segel,
			'jenis_segel' => $request->jenis_segel,
			'jumlah_segel' => $request->jumlah_segel,
			'satuan_segel' => $request->satuan_segel,
			'tempat_segel' => $request->tempat_segel,
			'saksi_id' => $request->saksi['id'],
			'petugas1_id' => $request->petugas1['user_id'],
			'petugas2_id' => $request->petugas2['user_id'],
		];

		if ($state == 'insert') {
			$data_buka_segel['agenda_dok'] = $this->agenda_dok;
			$data_buka_segel['no_dok_lengkap'] = $no_dok_lengkap;
			$data_buka_segel['kode_status'] = 100;
		}

		return $data_buka_segel;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$result = $this->storePenindakanDocument($request);
		return $result;
	}

	protected function stored($request)
	{
		// Create object relation
		$segel_id = $request->segel['id'];
		if ($segel_id == null) {
			$this->createPenindakan($request);
		} else {
			$this->createSegelRelation($segel_id);
		}
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
		$result = $this->updatePenindakanDocument($request, $id);
		return $result;
	}

	protected function updating($request)
	{
		// Get existing data
		$existing_segel = $this->doc->penindakan->segel;
		$segel_id = $request->segel['id'];

		// Change existing segel if new segel is different
		if ($existing_segel == null) {
			if ($segel_id != null) {

				// Remove relation from existing penindakan,
				// ten create relation to the new segel
				$this->deletePenindakan();
				$this->createSegelRelation($segel_id);

			}
		} else {
			if ($segel_id == null) {

				// Remove relation from existing segel, 
				// then create new penindakan
				$this->deleteSegelRelation();
				$this->createPenindakan($request);
				
			} else if ($segel_id != $existing_segel->id) {

				// Remove relation from existing segel, 
				// then create relation to the new one
				$this->deleteSegelRelation();
				$this->createSegelRelation($segel_id);
				
			}
		}
	}

	private function createSegelRelation($segel_id)
	{
		$segel = $this->getDocument($segel_id, 'segel');
		$penindakan_id = $segel->penindakan->id;
		$this->attachPenindakan($penindakan_id);
		$this->updateStatus($segel, 101);
	}

	private function deleteSegelRelation()
	{
		$this->doc->penindakan->segel->update(['kode_status' => 200]);
		$this->detachPenindakan();
	}

	protected function published()
	{
		// update segel status if eexists
		$segel = $this->doc->penindakan->segel;
		if ($segel != null) {
			$this->updateStatus($segel, 201);
		}
	}
}