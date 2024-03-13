<?php

namespace App\Http\Controllers\Intelijen;

use App\Http\Controllers\DokController;
use Illuminate\Http\Request;

class DokNiController extends DokController
{
	public function __construct($doc_type='ni')
	{
		parent::__construct($doc_type);
		$doc = new $this->model;
		$this->kode_lkai = $doc->kode_lkai;
		$this->field_lkai_id = $this->kode_lkai . '_id';
	}

	/*
	 |--------------------------------------------------------------------------
	 | Data modify functions
	 |--------------------------------------------------------------------------
	 */

	protected function validateCommonData(Request $request) 
	{
		$request->validate([
			'sifat' => 'string',
			'klasifikasi' => 'string',
		]);
	}

	/**
	 * Validate request
	 * 
	 * @param  \Illuminate\Http\Request  $request
	 */
	protected function validateData(Request $request)
	{
		$this->validateCommonData($request);
		$request->validate([
			'lkai_id' => 'integer',
		]);
	}

	/**
	 * Prepare data from request to array
	 * 
	 * @param Request $request
	 * @param String $state
	 * @return Array
	 */
	protected function prepareData(Request $request)
	{
		$data_ni = [
			'sifat' => $request->sifat,
			'klasifikasi' => $request->klasifikasi,
			'tujuan' => $request->tujuan,
			'uraian' => $request->uraian,
		];

		return $data_ni;
	}

	protected function storing(Request $request) {
		$data = parent::storing($request);

		$field_lkai_id = $this->field_lkai_id;
		// Get chain ID
		if ($request->$field_lkai_id == null) {
			// Create new chain
			$chain = $this->createChain();
		} else {
			// Get chain from existing LKAI
			$lkai = $this->attachTo($this->kode_lkai, $request->$field_lkai_id);
			$chain = $lkai->chain;
		}
		$data['chain_id'] = $chain->id;

		// Save lokasi
		if ($request->tempat_indikasi != null) {
			app(RefLokasiController::class)->save($request->tempat_indikasi);
		}

		return $data;
	}

	protected function updating(Request $request) {
		$data = parent::updating($request);
		$kode_lkai = $this->kode_lkai;
		$field_lkai_id = $this->field_lkai_id;
		$existing_lkai = $this->doc->chain->$kode_lkai;
		if ($existing_lkai == null) {
			if ($request->$field_lkai_id != null) {
				$lkai = $this->attachTo($kode_lkai, $request->$field_lkai_id);
				$data['chain_id'] = $lkai->chain_id;
			}
		} else {
			if ($request->$field_lkai_id == null) {
				$this->detachFrom($kode_lkai, $existing_lkai->id);
				$data['chain_id'] = null;
			} else if ($request->$field_lkai_id != $existing_lkai->id) {
				$this->detachFrom($kode_lkai, $existing_lkai->id);
				$lkai = $this->attachTo($kode_lkai, $request->$field_lkai_id);
				$data['chain_id'] = $lkai->chain_id;
			}
		}
		return $data;
	}
}