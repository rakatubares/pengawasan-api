<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokNiController extends DokIntelijenController
{
	public function __construct($doc_type='ni')
	{
		parent::__construct($doc_type);
		$this->lkai_type = 'lkai';
		$this->lkai_draft_status = 113;
		$this->lkai_published_status = 213;
		$this->prepareLkai();
	}

	protected function prepareLkai()
	{
		$this->lkai_model = $this->switchObject($this->lkai_type, 'model');
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
			'lkai_id' => 'integer',
			'sifat' => 'string',
			'klasifikasi' => 'string',
			'penerbit.plh' => 'boolean',
			'penerbit.user_id' => 'integer',
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

		$data_ni = [
			'sifat' => $request->sifat,
			'klasifikasi' => $request->klasifikasi,
			'tujuan' => $request->tujuan,
			'uraian' => $request->uraian,
			'kode_jabatan' => $request->penerbit['jabatan']['kode'],
			'plh_pejabat' => $request->penerbit['plh'],
			'pejabat_id' => $request->penerbit['user']['user_id'],
		];

		if ($state == 'insert') {
			$data_ni['agenda_dok'] = $this->agenda_dok;
			$data_ni['no_dok_lengkap'] = $no_dok_lengkap;
			$data_ni['kode_status'] = 100;
		}

		return $data_ni;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$result = $this->storeIntelDocument($request, ['cc']);
		return $result;
	}

	// Handle store relation
	protected function handleStoreIntel($request)
	{
		// $lkai_id_key = $this->lkai_type . '_id';
		$this->updateLinkedStatus($this->lkai_model, $request->lkai_id, $this->lkai_draft_status);
		$this->createIntelRelation($this->intelijen->id, $this->doc->id);
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
		$result = $this->updateIntelDocument($request, $id, ['cc', 'linked_doc']);
		return $result;
	}

	// Handle linked document
	protected function updateLinkedDoc($request, $id)
	{
		$this->getIntel($id);
		$lkai_key = $this->lkai_type;
		$lkai = $this->intelijen->$lkai_key;

		if ($request->lkai_id != $lkai->id) {
			$this->rollbackLinkedStatus($id, $lkai);
			$this->updateLinkedStatus($this->lkai_model, $request->lkai_id, $this->lkai_draft_status);
			$this->createIntelRelation($this->intelijen->id, $id);
		}
	}

	/**
	 * Publish document.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function publish($id, $withAddition=true)
	{
		parent::publish($id, $withAddition);
	}

	// Additional function when publish
	protected function publishAddition()
	{
		// Change LKAI status
		$lkai_type = $this->lkai_type;
		$lkai = $this->doc->intelijen->$lkai_type;
		if ($lkai != null) {
			$lkai->update(['kode_status' => $this->lkai_published_status]);
		}
	}
}