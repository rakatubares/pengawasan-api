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
			'tujuan' => 'string',
			'tanggal_indikasi' => 'nullable|date',
			'zona_waktu' => 'string',
			'detail.type' => 'string',
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
			'lkai_id' => 'nullable|integer',
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
		$tanggal_indikasi = $this->dateFromText($request->tanggal_indikasi, 'Y-m-d');
		$waktu_indikasi = $this->dateFromText($request->waktu_indikasi, 'H:i:s');
		$request->tempat_indikasi = trim(strtoupper($request->tempat_indikasi));

		$data = [
			'sifat' => $request->sifat,
			'klasifikasi' => $request->klasifikasi,
			'tujuan' => $request->tujuan,
			'tempat_indikasi' => $request->tempat_indikasi,
			'tanggal_indikasi' => $tanggal_indikasi,
			'waktu_indikasi' => $waktu_indikasi,
			'zona_waktu' => $request->zona_waktu,
			'kode_kantor' => $request->kantor['kode_kantor'],
			'indikasi' => $request->indikasi,
		];

		return $data;
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

	protected function stored(Request $request) {
		$detail = $this->createNhiDetail($request);
		$this->attachNhiDetail($request, $detail);
		parent::stored($request);
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

	public function updated(Request $request) {
		$existing_detail_type = $this->doc->detail_type;
		$existing_detail_id = $this->doc->detail_id;
		$existing_detail = Relation::getMorphedModel($existing_detail_type)::find($existing_detail_id);

		if ($existing_detail_type == $request->detail['type']) {
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

	protected function attachNhiDetail($request, $detail) {
		$this->doc->update([
			'detail_type' => $request->detail['type'],
			'detail_id' => $detail->id,
		]);
	}

	protected function createNhiDetail($request) {
		$detail_type = $request->detail['type'];
		$detail_data = $request->detail['data'];
		$detail = Relation::getMorphedModel($detail_type)::create($detail_data);
		$this->updateDetail($detail, $request);
		return $detail;
	}

	protected function updateNhiDetail(Request $request, $detail) {
		$detail->update($request->detail['data']);
		$this->updateDetail($detail, $request);
	}

	protected function deleteNhiDetail($existing_detail) {
		$existing_detail->delete();
	}

	private function updateDetail($detail, $request) {
		$detail_type = $request->detail['type'];

		if (
			($detail_type == 'nhi-exim') || 
			($detail_type == 'nhi-tertentu') ||
			($detail_type == 'nhin-exim')
		) {
			$this->updateEntitasDetail($detail, $request);
		}

		if (
			($detail_type == 'nhin-sarkut') ||
			($detail_type == 'nhin-orang')
		) {
			$this->updatePelabuhanDetail($detail, $request);
		}

		if ($detail_type == 'nhin-orang') {
			$this->updateOrangDetail($detail, $request);
		}
	}

	private function updateEntitasDetail($detail, $request) {
		if (isset($request->detail['data']['entitas'])) {
			$detail->update([
				'entitas_type' => $request->detail['data']['entitas']['type'],
				'entitas_id' => $request->detail['data']['entitas']['data']['id'],
			]);
		}
	}

	private function updatePelabuhanDetail($detail, $request) {
		if (isset($request->detail['data']['pelabuhan_asal'])) {
			$detail->update([
				'kode_pelabuhan_asal' => $request->detail['data']['pelabuhan_asal']['iata_code'],
			]);
		}
		if (isset($request->detail['data']['pelabuhan_tujuan'])) {
			$detail->update([
				'kode_pelabuhan_tujuan' => $request->detail['data']['pelabuhan_tujuan']['iata_code'],
			]);
		}
	}

	private function updateOrangDetail($detail, $request) {
		if (isset($request->detail['data']['entitas'])) {
			$detail->update([
				'entitas_id' => $request->detail['data']['entitas']['id'],
			]);
		}
	}
}