<?php

namespace App\Http\Controllers\Intelijen;

use App\Http\Controllers\DokController;
use App\Traits\ConverterTrait;
use App\Traits\IkhtisarInformasiTrait;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;

class DokLkaiController extends DokController
{
	use ConverterTrait;
	use IkhtisarInformasiTrait;

	public function __construct($doc_type='lkai')
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
	 * 
	 * @param  \Illuminate\Http\Request  $request
	 */
	protected function validateData(Request $request)
	{
		$request->validate([
			'lppi_id' => 'nullable|integer',
			'flag_lpti' => 'boolean',
			'tanggal_lpti' => 'nullable|date',
			'flag_npi' => 'boolean',
			'tanggal_npi' => 'nullable|date',
			'flag_rekom_nhi' => 'boolean',
			'flag_rekom_ni' => 'boolean',
			'keputusan_pejabat' => 'boolean',
			'tanggal_terima_pejabat' => 'date',
			'keputusan_atasan' => 'boolean',
			'tanggal_terima_atasan' => 'date',
			'ikhtisar' => 'required|array|min:1',
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
		$tanggal_lpti = $this->dateFromText($request->tanggal_lpti);
		$tanggal_npi = $this->dateFromText($request->tanggal_npi);

		$data = [];
		$data['flag_lpti'] = $request->flag_lpti;
		$data['nomor_lpti'] = $request->nomor_lpti;
		$data['tanggal_lpti'] = $tanggal_lpti;
		$data['flag_npi'] = $request->flag_npi;
		$data['nomor_npi'] = $request->nomor_npi;
		$data['tanggal_npi'] = $tanggal_npi;
		$data['prosedur'] = $request->prosedur;
		$data['hasil'] = $request->hasil;
		$data['kesimpulan'] = $request->kesimpulan;
		$data['flag_rekom_nhi'] = $request->flag_rekom_nhi;
		$data['flag_rekom_ni'] = $request->flag_rekom_ni;
		$data['rekomendasi_lain'] = $request->rekomendasi_lain;
		$data['informasi_lain'] = $request->informasi_lain;
		$data['tujuan'] = $request->tujuan;
		$data['keputusan_pejabat'] = $request->keputusan_pejabat;
		$data['catatan_pejabat'] = $request->catatan_pejabat;
		$data['tanggal_terima_pejabat'] = $request->tanggal_terima_pejabat;
		$data['keputusan_atasan'] = $request->keputusan_atasan;
		$data['catatan_atasan'] = $request->catatan_atasan;
		$data['tanggal_terima_atasan'] = $request->tanggal_terima_atasan;
		if ($this->doc_type == 'lkain') {
			unset($data['informasi_lain']);
		}
		return $data;
	}

	private function getLppi($lppi_id) {
		return Relation::getMorphedModel('lppi')::find($lppi_id);
	}

	protected function storing(Request $request) {
		$data = parent::storing($request);

		// Get chain ID
		if ($request->lppi_id == null) {
			// Create new chain
			$chain = $this->createChain();
		} else {
			// Get chain from existing LPPI
			$lppi = $this->attachTo('lppi', $request->lppi_id);
			$chain = $lppi->chain;
		}
		$data['chain_id'] = $chain->id;

		return $data;
	}

	protected function stored(Request $request) {
		if ($request->lppi_id == null) {
			$this->createIkhtisarInformasi($this->doc, $request->ikhtisar);
		} 
		parent::stored($request);
	}

	protected function updating(Request $request) {
		$data = parent::updating($request);
		$this->existing_lppi = $this->doc->chain->lppi;
		if ($this->existing_lppi == null) {
			if ($request->lppi_id != null) {
				$lppi = $this->attachTo('lppi', $request->lppi_id);
				$data['chain_id'] = $lppi->chain_id;
			}
		} else {
			if ($request->lppi_id == null) {
				$this->detachFrom('lppi', $this->existing_lppi->id);
				$data['chain_id'] = null;
			} else if ($request->lppi_id != $this->existing_lppi->id) {
				$this->detachFrom('lppi', $this->existing_lppi->id);
				$lppi = $this->attachTo('lppi', $request->lppi_id);
				$data['chain_id'] = $lppi->chain_id;
			}
		}
		return $data;
	}

	protected function updated(Request $request) {
		// Update ikhtisar informasi
		if ($this->existing_lppi == null) {
			if ($request->lppi_id == null) {
				$this->updateIkhtisarInformasi($this->doc, $request->ikhtisar);
			}
		} else {
			if ($request->lppi_id == null) {
				$this->createIkhtisarInformasi($this->doc, $request->ikhtisar);
			}
		}

		// Execute parent update
		parent::updated($request);
	}
}