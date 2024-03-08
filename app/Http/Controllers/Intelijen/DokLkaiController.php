<?php

namespace App\Http\Controllers\Intelijen;

use App\Http\Controllers\DokController;
use App\Traits\ConverterTrait;
use Illuminate\Http\Request;

class DokLkaiController extends DokController
{
	use ConverterTrait;

	public function __construct($doc_type='lkai')
	{
		parent::__construct($doc_type);
		$doc = new $this->model;
		$this->kode_lppi = $doc->kode_lppi;
		$this->field_lppi_id = $this->kode_lppi . '_id';
	}

	/*
	 |--------------------------------------------------------------------------
	 | Data modify functions
	 |--------------------------------------------------------------------------
	 */

	protected function validateCommonData(Request $request) 
	{
		$request->validate([
			'keputusan_pejabat' => 'boolean',
			'tanggal_terima_pejabat' => 'date',
			'keputusan_atasan' => 'boolean',
			'tanggal_terima_atasan' => 'date',
			'informasi' => 'required',
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
			'lppi_id' => 'nullable|integer',
			'tanggal_lpti' => 'nullable|date',
			'tanggal_npi' => 'nullable|date',
			'flag_rekom_nhi' => 'boolean',
			'flag_rekom_ni' => 'boolean',
		]);
	}

	protected function prepareCommonData(Request $request) {
		$data = [];
		$data['informasi'] = $request->informasi;
		$data['prosedur'] = $request->prosedur;
		$data['hasil'] = $request->hasil;
		$data['kesimpulan'] = $request->kesimpulan;
		$data['rekomendasi_lain'] = $request->rekomendasi_lain;
		if ($this->doc_type == 'lkai') {
			$data['informasi_lain'] = $request->informasi_lain;
		}
		$data['tujuan'] = $request->tujuan;
		$data['keputusan_pejabat'] = $request->keputusan_pejabat;
		$data['catatan_pejabat'] = $request->catatan_pejabat;
		$data['tanggal_terima_pejabat'] = $request->tanggal_terima_pejabat;
		$data['keputusan_atasan'] = $request->keputusan_atasan;
		$data['catatan_atasan'] = $request->catatan_atasan;
		$data['tanggal_terima_atasan'] = $request->tanggal_terima_atasan;
		return $data;
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
		$data = $this->prepareCommonData($request);

		$tanggal_lpti = $this->dateFromText($request->tanggal_lpti);
		$tanggal_npi = $this->dateFromText($request->tanggal_npi);

		$data['nomor_lpti'] = $request->nomor_lpti;
		$data['tanggal_lpti'] = $tanggal_lpti;
		$data['nomor_npi'] = $request->nomor_npi;
		$data['tanggal_npi'] = $tanggal_npi;
		$data['flag_rekom_nhi'] = $request->flag_rekom_nhi;
		$data['flag_rekom_ni'] = $request->flag_rekom_ni;
		return $data;
	}

	protected function storing(Request $request) {
		$data = parent::storing($request);

		$field_lppi_id = $this->field_lppi_id;
		// Get chain ID
		if ($request->$field_lppi_id == null) {
			// Create new chain
			$chain = $this->createChain();
		} else {
			// Get chain from existing LPPI
			$lppi = $this->attachTo($this->kode_lppi, $request->$field_lppi_id);
			$chain = $lppi->chain;
		}
		$data['chain_id'] = $chain->id;

		return $data;
	}

	protected function updating(Request $request) {
		$data = parent::updating($request);
		$kode_lppi = $this->kode_lppi;
		$field_lppi_id = $this->field_lppi_id;
		$this->existing_lppi = $this->doc->chain->$kode_lppi;
		if ($this->existing_lppi == null) {
			if ($request->$field_lppi_id != null) {
				$lppi = $this->attachTo($kode_lppi, $request->$field_lppi_id);
				$data['chain_id'] = $lppi->chain_id;
			}
		} else {
			if ($request->$field_lppi_id == null) {
				$this->detachFrom($kode_lppi, $this->existing_lppi->id);
				$data['chain_id'] = null;
			} else if ($request->$field_lppi_id != $this->existing_lppi->id) {
				$this->detachFrom($kode_lppi, $this->existing_lppi->id);
				$lppi = $this->attachTo($kode_lppi, $request->$field_lppi_id);
				$data['chain_id'] = $lppi->chain_id;
			}
		}
		return $data;
	}
}