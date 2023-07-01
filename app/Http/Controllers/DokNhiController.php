<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokNhiTableResource;
use App\Models\DokNhi;
use App\Traits\ConverterTrait;
use Illuminate\Http\Request;

class DokNhiController extends DokIntelijenController
{
	use ConverterTrait;
	
	public function __construct($doc_type='nhi')
	{
		parent::__construct($doc_type);
		$this->lkai_type = 'lkai';
		$this->lkai_draft_status = 112;
		$this->lkai_published_status = 212;
		$this->prepareLkai();
	}

	protected function prepareLkai()
	{
		$this->lkai_model = $this->switchObject($this->lkai_type, 'model');
	}

	/**
	 * Display resource based on search query
	 * 
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function search(Request $request)
	{
		$src = $request->src;
		$flt = $request->flt;
		$exc = $request->exc;
		$search = '%' . $src . '%';

		$search_result = DokNhi::where(function ($query) use ($search, $flt) 
			{
				$query->where('no_dok_lengkap', 'like', $search)
					->when($flt != null, function ($query) use ($flt)
					{
						foreach ($flt as $column => $value) {
							if (is_array($value)) {
								$query->whereIn($column, $value);
							} else if ($value == null) {
								$query->where($column, $value);
							} else {
								$search_value = '%' . $value . '%';
								$query->where($column, 'like', $search_value);
							}
						}
						return $query;
					});
			})
			->when($exc != null, function ($query) use ($exc)
			{
				return $query->orWhere('id', $exc);
			})
			->orderBy('created_at', 'desc')
			->orderBy('id', 'desc')
			->take(5)
			->get();
		$search_list = DokNhiTableResource::collection($search_result);
		return $search_list;
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
			'waktu_indikasi' => 'nullable|date',
			'zona_waktu' => 'string',
			'flag_exim' => 'boolean',
			'tanggal_dok_exim' => 'nullable|date',
			'tanggal_awb_exim' => 'nullable|date',
			'flag_bkc' => 'boolean',
			'flag_tertentu' => 'boolean',
			'tanggal_dok_tertentu' => 'nullable|date',
			'tanggal_awb_tertentu' => 'nullable|date',
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
		$waktu_indikasi = $this->dateFromText($request->waktu_indikasi, 'Y-m-d H:i:s');
		$tanggal_dok_exim = $this->dateFromText($request->tanggal_dok_exim);
		$tanggal_awb_exim = $this->dateFromText($request->tanggal_awb_exim);
		$tanggal_dok_tertentu = $this->dateFromText($request->tanggal_dok_tertentu);
		$tanggal_awb_tertentu = $this->dateFromText($request->tanggal_awb_tertentu);

		$data_nhi = [
			'sifat' => $request->sifat,
			'klasifikasi' => $request->klasifikasi,
			'tujuan' => $request->tujuan,
			'tempat_indikasi' => $request->tempat_indikasi,
			'waktu_indikasi' => $waktu_indikasi,
			'zona_waktu' => $request->zona_waktu,
			'kantor' => $request->kantor,
			'flag_exim' => $request->flag_exim,
			'jenis_dok_exim' => $request->jenis_dok_exim,
			'nomor_dok_exim' => $request->nomor_dok_exim,
			'tanggal_dok_exim' => $tanggal_dok_exim,
			'nama_sarkut_exim' => $request->nama_sarkut_exim,
			'no_flight_trayek_exim' => $request->no_flight_trayek_exim,
			'nomor_awb_exim' => $request->nomor_awb_exim,
			'tanggal_awb_exim' => $tanggal_awb_exim,
			'merek_koli_exim' => $request->merek_koli_exim,
			'importir_ppjk' => $request->importir_ppjk,
			'npwp' => $request->npwp,
			'data_lain_exim' => $request->data_lain_exim,
			'flag_bkc' => $request->flag_bkc,
			'tempat_penimbunan' => $request->tempat_penimbunan,
			'penyalur' => $request->penyalur,
			'tempat_penjualan' => $request->tempat_penjualan,
			'nppbkc' => $request->nppbkc,
			'nama_sarkut_bkc' => $request->nama_sarkut_bkc,
			'no_flight_trayek_bkc' => $request->no_flight_trayek_bkc,
			'data_lain_bkc' => $request->data_lain_bkc,
			'flag_tertentu' => $request->flag_tertentu,
			'jenis_dok_tertentu' => $request->jenis_dok_tertentu,
			'nomor_dok_tertentu' => $request->nomor_dok_tertentu,
			'tanggal_dok_tertentu' => $tanggal_dok_tertentu,
			'nama_sarkut_tertentu' => $request->nama_sarkut_tertentu,
			'no_flight_trayek_tertentu' => $request->no_flight_trayek_tertentu,
			'nomor_awb_tertentu' => $request->nomor_awb_tertentu,
			'tanggal_awb_tertentu' => $tanggal_awb_tertentu,
			'merek_koli_tertentu' => $request->merek_koli_tertentu,
			'orang_badan_hukum' => $request->orang_badan_hukum,
			'data_lain_tertentu' => $request->data_lain_tertentu,
			'indikasi' => $request->indikasi,
			'kode_jabatan' => $request->penerbit['jabatan']['kode'],
			'plh_pejabat' => $request->penerbit['plh'],
			'pejabat_id' => $request->penerbit['user']['user_id'],
		];

		if ($state == 'insert') {
			$data_nhi['agenda_dok'] = $this->agenda_dok;
			$data_nhi['no_dok_lengkap'] = $no_dok_lengkap;
			$data_nhi['kode_status'] = 100;
		}

		return $data_nhi;
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
		$lkai_id_key = $this->lkai_type . '_id';
		$this->updateLinkedStatus($this->lkai_model, $request->$lkai_id_key, $this->lkai_draft_status);
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
			$lkai_id_key = $this->lkai_type . '_id';
			$this->rollbackLinkedStatus($id, $lkai);
			$this->updateLinkedStatus($this->lkai_model, $request->$lkai_id_key, $this->lkai_draft_status);
			$this->createIntelRelation($this->intelijen->id, $id);
		}
	}

	// Additional function when publish
	protected function published()
	{
		// Change LKAI status
		$lkai_type = $this->lkai_type;
		$lkai = $this->doc->intelijen->$lkai_type;
		if ($lkai != null) {
			$lkai->update(['kode_status' => $this->lkai_published_status]);
		}
	}
}