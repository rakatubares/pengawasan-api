<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokLkaiTableResource;
use App\Traits\ConverterTrait;
use Illuminate\Http\Request;

class DokLkaiController extends DokIntelijenController
{
	use ConverterTrait;

	public function __construct($doc_type='lkai')
	{
		parent::__construct($doc_type);
		$this->lppi_type = 'lppi';
		$this->lppi_draft_status = 111;
		$this->lppi_published_status = 211;
		$this->prepareLppi();
	}

	public function prepareLppi()
	{
		$this->lppi_model = $this->switchObject($this->lppi_type, 'model');
	}

	/*
	 |--------------------------------------------------------------------------
	 | DISPLAY functions
	 |--------------------------------------------------------------------------
	 */

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

		$search_result = $this->model::where(function ($query) use ($search, $flt) 
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
		$search_list = DokLkaiTableResource::collection($search_result);
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
			'lppi_id' => 'nullable|integer',
			'flag_lpti' => 'boolean',
			'tanggal_lpti' => 'nullable|date',
			'flag_npi' => 'boolean',
			'tanggal_npi' => 'nullable|date',
			'flag_rekom_nhi' => 'boolean',
			'flag_rekom_ni' => 'boolean',
			'analis.user_id' => 'integer',
			'pejabat.user.plh' => 'boolean',
			'pejabat.user.user_id' => 'integer',
			'pejabat.user.keputusan' => 'boolean',
			'pejabat.user.tanggal_terima' => 'date',
			'atasan.user.plh' => 'boolean',
			'atasan.user.user_id' => 'integer',
			'atasan.user.keputusan' => 'boolean',
			'atasan.user.tanggal_terima' => 'date',
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
		$tanggal_lpti = $this->dateFromText($request->tanggal_lpti);
		$tanggal_npi = $this->dateFromText($request->tanggal_npi);
		$tanggal_terima_pejabat = $this->dateFromText($request->pejabat['tanggal_terima']);
		$tanggal_terima_atasan = $this->dateFromText($request->atasan['tanggal_terima']);

		$data_lkai = [
			'flag_lpti' => $request->flag_lpti,
			'nomor_lpti' => $request->nomor_lpti,
			'tanggal_lpti' => $tanggal_lpti,
			'flag_npi' => $request->flag_npi,
			'nomor_npi' => $request->nomor_npi,
			'tanggal_npi' => $tanggal_npi,
			'prosedur' => $request->prosedur,
			'hasil' => $request->hasil,
			'kesimpulan' => $request->kesimpulan,
			'flag_rekom_nhi' => $request->flag_rekom_nhi,
			'flag_rekom_ni' => $request->flag_rekom_ni,
			'rekomendasi_lain' => $request->rekomendasi_lain,
			'informasi_lain' => $request->informasi_lain,
			'tujuan' => $request->tujuan,
			'analis_id' => $request->analis['user_id'],
			'keputusan_pejabat' => $request->pejabat['keputusan'],
			'catatan_pejabat' => $request->pejabat['catatan'],
			'tanggal_terima_pejabat' => $tanggal_terima_pejabat,
			'kode_pejabat' => $request->pejabat['jabatan']['kode'],
			'plh_pejabat' => $request->pejabat['plh'],
			'pejabat_id' => $request->pejabat['user']['user_id'],
			'keputusan_atasan' => $request->atasan['keputusan'],
			'catatan_atasan' => $request->atasan['catatan'],
			'tanggal_terima_atasan' => $tanggal_terima_atasan,
			'kode_atasan' => $request->atasan['jabatan']['kode'],
			'plh_atasan' => $request->atasan['plh'],
			'atasan_id' => $request->atasan['user']['user_id'],
		];

		if ($this->doc_type == 'lkain') {
			unset($data_lkai['informasi_lain']);
		}

		if ($state == 'insert') {
			$data_lkai['agenda_dok'] = $this->agenda_dok;
			$data_lkai['no_dok_lengkap'] = $no_dok_lengkap;
			$data_lkai['kode_status'] = 100;
		}

		return $data_lkai;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$result = $this->storeIntelDocument($request);
		return $result;
	}

	// Handle store relation
	protected function handleStoreIntel($request)
	{
		if ($request->lppi_id == null) {
			$this->createIntel($request, $this->doc->id);
		} else {
			$this->updateLinkedStatus($this->lppi_model, $request->lppi_id, $this->lppi_draft_status);
			$this->createIntelRelation($this->intelijen->id, $this->doc->id);
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
		$result = $this->updateIntelDocument($request, $id, ['linked_doc']);
		return $result;
	}

	// Handle linked document
	protected function updateLinkedDoc($request, $id)
	{
		$this->getIntel($id);
		$lppi_key = $this->lppi_type;
		$lppi = $this->intelijen->$lppi_key;

		if ($request->lppi_id == null) {
			if ($lppi != null) {
				$this->rollbackLinkedStatus($id, $lppi);
				$this->createIntel();
				$this->createIntelRelation($this->intelijen->id, $id);
				$this->saveIkhtisar($request);
			}
		} else {
			if ($lppi == null) {
				$this->deleteIntel($id);
				$this->updateLinkedStatus($this->lppi_model, $request->lppi_id, $this->lppi_draft_status);
				$this->createIntelRelation($this->intelijen->id, $id);
			} else {
				if ($lppi->id != $request->lppi_id) {
					$this->rollbackLinkedStatus($id, $lppi);
					$this->updateLinkedStatus($this->lppi_model, $request->lppi_id, $this->lppi_draft_status);
					$this->createIntelRelation($this->intelijen->id, $id);
				}
			}
		}
	}

	// Additional function when publish
	protected function published()
	{
		// Change LPPI status
		$lppi_type = $this->lppi_type;
		$lppi = $this->doc->intelijen->$lppi_type;
		if ($lppi != null) {
			$lppi->update(['kode_status' => $this->lppi_published_status]);
		}
	}
}