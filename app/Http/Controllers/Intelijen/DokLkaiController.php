<?php

namespace App\Http\Controllers\Intelijen;

use App\Http\Controllers\DokController;
use App\Traits\ConverterTrait;
use Illuminate\Http\Request;

class DokLkaiController extends DokController
{
	use ConverterTrait;

	protected $docType = 'lkai';

	public function __construct()
	{
		parent::__construct();
		$doc = new $this->model;
		$this->kodeLppi = $doc->kodeLppi;
		$this->fieldLppiId = $this->kodeLppi . '_id';
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
		if ($this->docType == 'lkai') {
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

		$fieldLppiId = $this->fieldLppiId;
		// Get chain ID
		if ($request->$fieldLppiId == null) {
			// Create new chain
			$chain = $this->createChain();
		} else {
			// Get chain from existing LPPI
			$lppi = $this->attachTo($this->kodeLppi, $request->$fieldLppiId);
			$chain = $lppi->chain;
		}
		$data['chain_id'] = $chain->id;

		return $data;
	}

	protected function updating(Request $request) {
		$data = parent::updating($request);
		$kodeLppi = $this->kodeLppi;
		$fieldLppiId = $this->fieldLppiId;
		$this->existing_lppi = $this->doc->chain->$kodeLppi;
		if ($this->existing_lppi == null) {
			if ($request->$fieldLppiId != null) {
				$lppi = $this->attachTo($kodeLppi, $request->$fieldLppiId);
				$data['chain_id'] = $lppi->chain_id;
			}
		} else {
			if ($request->$fieldLppiId == null) {
				$this->detachFrom($kodeLppi, $this->existing_lppi->id);
				$data['chain_id'] = null;
			} elseif ($request->$fieldLppiId != $this->existing_lppi->id) {
				$this->detachFrom($kodeLppi, $this->existing_lppi->id);
				$lppi = $this->attachTo($kodeLppi, $request->$fieldLppiId);
				$data['chain_id'] = $lppi->chain_id;
			}
		}
		return $data;
	}
}
