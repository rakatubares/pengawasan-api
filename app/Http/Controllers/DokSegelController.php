<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokSegelTableResource;
use App\Models\DokSegel;
use Illuminate\Http\Request;

class DokSegelController extends DokPenindakanController
{
	public function __construct($doc_type='segel')
	{
		parent::__construct($doc_type);
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
		$sta = $request->sta;
		$exc = $request->exc;

		$search = '%' . $src . '%';
		$status = $sta != null ? $sta : [200];

		$search_result = DokSegel::where(function ($query) use ($search, $status) {
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
		$search_list = DokSegelTableResource::collection($search_result);
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
			'jenis_segel' => 'required',
			'jumlah_segel' => 'required|integer',
		]);
	}

	/**
	 * Prepare data segel
	 */
	protected function prepareData(Request $request, $state='insert')
	{
		$no_dok_lengkap = $this->tipe_surat . '-     ' . $this->agenda_dok; 

		$data_segel = [
			'jenis_segel' => $request->jenis_segel,
			'jumlah_segel' => $request->jumlah_segel,
			'satuan_segel' => $request->satuan_segel,
			'tempat_segel' => $request->tempat_segel,
		];

		if ($state == 'insert') {
			$data_segel['agenda_dok'] = $this->agenda_dok;
			$data_segel['no_dok_lengkap'] = $no_dok_lengkap;
			$data_segel['nomor_segel'] = $no_dok_lengkap;
			$data_segel['kode_status'] = 100;
		}

		return $data_segel;
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

	protected function storing($request)
	{
		$this->validatePenindakan($request); 
	}

	protected function stored($request)
	{
		// Create penindakan
		$this->storePenindakan($request);
		$this->createRelation('penindakan', $this->penindakan->id, $this->doc_type, $this->doc->id);
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
		$result = $this->updatePenindakanDocument($request, $id);
		return $result;
	}

	protected function updated($request)
	{
		$this->updatePenindakan($request);
	}

	protected function publishing($id)
	{
		$this->getPenindakanDate($id);
		$this->updateDocYear();
	}

	protected function published()
	{
		$this->getDocument($this->doc->id);
		$this->doc->update(['nomor_segel' => $this->doc->no_dok_lengkap]);
	}
}