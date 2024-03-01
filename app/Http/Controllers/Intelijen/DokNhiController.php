<?php

namespace App\Http\Controllers\Intelijen;

use App\Http\Controllers\DokController;
use App\Http\Controllers\References\RefLokasiController;
use App\Traits\ConverterTrait;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;

class DokNhiController extends DokController
{
	use ConverterTrait;
	
	public function __construct($doc_type='nhi')
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
			'lkai_id' => 'nullable|integer',
			'sifat' => 'string',
			'klasifikasi' => 'string',
			'tujuan' => 'string',
			'waktu_indikasi' => 'nullable|date',
			'zona_waktu' => 'string',
			'flag_exim' => 'boolean',
			'tanggal_dok_exim' => 'nullable|date',
			'tanggal_awb_exim' => 'nullable|date',
			'detail.type' => 'string',
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
		$waktu_indikasi = $this->dateFromText($request->waktu_indikasi, 'Y-m-d H:i:s');
		$request->tempat_indikasi = trim(strtoupper($request->tempat_indikasi));

		$data = [
			'sifat' => $request->sifat,
			'klasifikasi' => $request->klasifikasi,
			'tujuan' => $request->tujuan,
			'tempat_indikasi' => $request->tempat_indikasi,
			'waktu_indikasi' => $waktu_indikasi,
			'zona_waktu' => $request->zona_waktu,
			'kode_kantor' => $request->kantor['kode_kantor'],
			'indikasi' => $request->indikasi,
		];

		return $data;
	}

	protected function storing(Request $request) {
		$data = parent::storing($request);

		// Get chain ID
		if ($request->lkai_id == null) {
			// Create new chain
			$chain = $this->createChain();
		} else {
			// Get chain from existing LKAI
			$lkai = $this->attachTo('lkai', $request->lkai_id);
			$chain = $lkai->chain;
		}
		$data['chain_id'] = $chain->id;

		// Save lokasi
		if ($request->tempat_indikasi != null) {
			app(RefLokasiController::class)->save($request->tempat_indikasi);
		}

		return $data;
	}

	protected function stored(Request $request) {
		$detail = $this->createNhiDetail($request);
		$this->attachNhiDetail($request, $detail);
		parent::stored($request);
	}

	protected function createNhiDetail($request) {
		$detail_type = $request->detail['type'];
		$detail_data = $request->detail['data'];
		$detail = Relation::getMorphedModel($detail_type)::create($detail_data);

		if (isset($request->detail['data']['entitas'])) {
			$detail->update([
				'entitas_type' => $request->detail['data']['entitas']['type'],
				'entitas_id' => $request->detail['data']['entitas']['data']['id'],
			]);
		}
		
		return $detail;
	}

	protected function attachNhiDetail($request, $detail) {
		$this->doc->update([
			'detail_type' => $request->detail['type'],
			'detail_id' => $detail->id,
		]);
	}

	protected function updating(Request $request) {
		$data = parent::updating($request);
		$existing_lkai = $this->doc->chain->lkai;
		if ($existing_lkai == null) {
			if ($request->lkai_id != null) {
				$lkai = $this->attachTo('lkai', $request->lkai_id);
				$data['chain_id'] = $lkai->chain_id;
			}
		} else {
			if ($request->lkai_id == null) {
				$this->detachFrom('lkai', $existing_lkai->id);
				$data['chain_id'] = null;
			} else if ($request->lkai_id != $existing_lkai->id) {
				$this->detachFrom('lkai', $existing_lkai->id);
				$lkai = $this->attachTo('lkai', $request->lkai_id);
				$data['chain_id'] = $lkai->chain_id;
			}
		}
		return $data;
	}

	public function updated(Request $request) {
		$existing_detail_type = $this->doc->detail_type;
		$existing_detail_id = $this->doc->detail_id;
		$existing_detail = Relation::getMorphedModel($existing_detail_type)::find($existing_detail_id);

		if ($existing_detail == $request->detail['type']) {
			$this->updateNhiDetail($request, $existing_detail);
		} else {
			// Delete previous detail
			$this->deleteNhiDetail($existing_detail);

			// Create new detail
			$detail = $this->createNhiDetail($request);
			$this->attachNhiDetail($request, $detail);
		}

		parent::updated($request);
	}

	protected function updateNhiDetail(Request $request, $detail) {
		$detail->update($request->detail['data']);
	}

	protected function deleteNhiDetail($existing_detail) {
		$existing_detail->delete();
	}
}