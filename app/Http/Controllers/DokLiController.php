<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokLiTableResource;
use App\Models\DokLi;
use Illuminate\Http\Request;

class DokLiController extends DokPenindakanController
{
	public function __construct($doc_type='li')
	{
		parent::__construct($doc_type);
	}

	/*
	 |--------------------------------------------------------------------------
	 | DISPLAY functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Get related documents' id
	 * 
	 * @param int $id
	 * @return array
	 */
	public function docs($id)
	{
		$array = [[
			'doc_type' => 'li',
			'doc_id' => (int)$id,
		]];

		$li = $this->model::find($id);
		$lap = $li->lap;
		if ($lap != null) {
			$array[] = [
				'doc_type' => 'lap',
				'doc_id' => (int)$lap->id,
			];

			// Penindakan
			if ($lap->penindakan != null) {
				$penindakan_id = $lap->penindakan->id;
				$docs_penindakan = DokPenindakanController::getPenindakanDocuments($penindakan_id);
				foreach ($docs_penindakan as $doc) {
					$array[] = $doc;
				}
			}
		}
		
		return $array;
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

		$search_result = DokLi::where(function ($query) use ($search, $flt) 
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
		$search_list = DokLiTableResource::collection($search_result);
		return $search_list;
	}

	/*
	 |--------------------------------------------------------------------------
	 | Data modify functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Validate request
	 */
	protected function validateData(Request $request)
	{
		$request->validate([
			'sumber' => 'required',
			'informasi' => 'required',
			'penerbit.jabatan.kode' => 'required',
			'penerbit.plh' => 'required|boolean',
			'penerbit.user.user_id' => 'required|integer',
			'atasan.jabatan.kode' => 'required',
			'atasan.plh' => 'required|boolean',
			'atasan.user.user_id' => 'required|integer',
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
		$no_dok_lengkap = $this->tipe_surat . '-     ' . $this->agenda_dok;

		$data_li = [
			'sumber' => $request->sumber,
			'informasi' => $request->informasi,
			'tindak_lanjut' => $request->tindak_lanjut,
			'catatan' => $request->catatan,
			'kode_jabatan_penerbit' => $request->penerbit['jabatan']['kode'],
			'plh_penerbit' => $request->penerbit['plh'],
			'penerbit_id' => $request->penerbit['user']['user_id'],
			'kode_jabatan_atasan' => $request->atasan['jabatan']['kode'],
			'plh_atasan' => $request->atasan['plh'],
			'atasan_id' => $request->atasan['user']['user_id'],
		];

		if ($state == 'insert') {
			$data_li['agenda_dok'] = $this->agenda_dok;
			$data_li['no_dok_lengkap'] = $no_dok_lengkap;
			$data_li['kode_status'] = 100;
		};

		return $data_li;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$result = $this->storePenindakanDocument($request);
		return $result;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $int
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$result = $this->updatePenindakanDocument($request, $id);
		return $result;
	}
}