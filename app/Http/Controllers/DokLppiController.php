<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokLppiTableResource;
use App\Traits\ConverterTrait;
use Illuminate\Http\Request;

class DokLppiController extends DokIntelijenController
{
	use ConverterTrait;

	public function __construct($doc_type='lppi')
	{
		parent::__construct($doc_type);
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
		$sta = $request->sta;
		$exc = $request->exc;

		$search = '%' . $src . '%';
		$status = $sta != null ? $sta : [200];

		$search_result = $this->model::where(function ($query) use ($search, $status) {
				$query->where('no_dok_lengkap', 'like', $search)
					->whereIn('kode_status', $status);
			})
			->when($exc != null, function ($query) use ($exc)
			{
				return $query->orWhere('id', $exc);
			})
			->orderBy('created_at', 'desc')
			->orderBy('id', 'desc')
			->take(5)
			->get();
		$search_list = DokLppiTableResource::collection($search_result);
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
			'flag_info_internal' => 'boolean',
			'tgl_terima_info_internal' => 'nullable|date',
			'tgl_dok_info_internal' => 'nullable|date',
			'flag_info_eksternal' => 'boolean',
			'tgl_terima_info_eksternal' => 'nullable|date',
			'tgl_dok_info_eksternal' => 'nullable|date',
			'flag_analisis' => 'nullable|boolean',
			'flag_arsip' => 'nullable|boolean',
			'penerima_info_id' => 'nullable|integer',
			'penilai_info_id' => 'nullable|integer',
			'disposisi.user_id' => 'nullable|integer',
			'tanggal_disposisi' => 'nullable|date',
			'pejabat.user.user_id' => 'nullable|integer',
			'ikhtisar' => 'required|array|min:1'
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
		$tgl_terima_info_internal = $this->dateFromText($request->tgl_terima_info_internal);
		$tgl_dok_info_internal = $this->dateFromText($request->tgl_dok_info_internal);
		$tgl_terima_info_eksternal = $this->dateFromText($request->tgl_terima_info_eksternal);
		$tgl_dok_info_eksternal = $this->dateFromText($request->tgl_dok_info_eksternal);
		$tanggal_disposisi = $this->dateFromText($request->tanggal_disposisi);

		$data_lppi = [
			'flag_info_internal' => $request->flag_info_internal,
			'media_info_internal' => $request->media_info_internal,
			'tgl_terima_info_internal' => $tgl_terima_info_internal,
			'no_dok_info_internal' => $request->no_dok_info_internal,
			'tgl_dok_info_internal' => $tgl_dok_info_internal,
			'flag_info_eksternal' => $request->flag_info_eksternal,
			'media_info_eksternal' => $request->media_info_eksternal,
			'tgl_terima_info_eksternal' => $tgl_terima_info_eksternal,
			'no_dok_info_eksternal' => $request->no_dok_info_eksternal,
			'tgl_dok_info_eksternal' => $tgl_dok_info_eksternal,
			'penerima_info_id' => $request->penerima_info['user_id'],
			'penilai_info_id' => $request->penilai_info['user_id'],
			'kesimpulan' => $request->kesimpulan,
			'disposisi_id' => $request->disposisi['user_id'],
			'tanggal_disposisi' => $tanggal_disposisi,
			'flag_analisis' => $request->flag_analisis,
			'flag_arsip' => $request->flag_arsip,
			'catatan' => $request->catatan,
			'kode_jabatan' => $request->pejabat['jabatan']['kode'],
			'plh' => $request->pejabat['plh'],
			'pejabat_id' => $request->pejabat['user']['user_id'],
		];

		if ($state == 'insert') {
			$data_lppi['agenda_dok'] = $this->agenda_dok;
			$data_lppi['no_dok_lengkap'] = $no_dok_lengkap;
			$data_lppi['kode_status'] = 100;
		}

		return $data_lppi;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$result = $this->storeIntelDocument($request, ['ikhtisar']);
		return $result;
	}

	// Handle store relation
	protected function handleStoreIntel($request)
	{
		$this->createIntel();
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
		$result = $this->updateIntelDocument($request, $id, ['ikhtisar']);
		return $result;
	}

	// Handle update ikhtisar
	protected function updateIntelIkhtisar($request, $id)
	{
		$this->getIntel($id);
		$existing_ikhtisar_ids = $this->getIkhtisar();
		$update_ikhtisar_ids = $this->updateIkhtisar($request);
		$this->deleteIkhtisar($existing_ikhtisar_ids, $update_ikhtisar_ids);
	}
}