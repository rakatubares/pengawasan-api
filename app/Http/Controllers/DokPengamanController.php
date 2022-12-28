<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokPengamanTableResource;
use App\Models\DokPengaman;
use Illuminate\Http\Request;

class DokPengamanController extends DokPenindakanController
{
	public function __construct($doc_type='pengaman')
	{
		parent::__construct($doc_type);
	}

	/*
	 |--------------------------------------------------------------------------
	 | DISPLAY functions
	 |--------------------------------------------------------------------------
	 */

	public function docs($id)
	{
		return $this->getRelatedDocuments($id);
	}

	/**
	 * Display resource based on search query
	 * 
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function search(Request $request)
	{
		$s = $request->s;
		$e = $request->e;
		$search = '%' . $s . '%';
		$search_result = DokPengaman::where(function ($query) use ($search) {
				$query->where('no_dok_lengkap', 'like', $search)
					->where('kode_status', 200);
			})
			->when($e != null, function ($query) use ($e)
			{
				return $query->orWhere('id', $e);
			})
			->orderBy('created_at', 'desc')
			->take(5)
			->get();
		$search_list = DokPengamanTableResource::collection($search_result);
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
			'jenis_pengaman' => 'required',
			'jumlah_pengaman' => 'required|integer',
		]);
	}

	/**
	 * Prepare data
	 */
	protected function prepareData(Request $request, $state='insert')
	{
		$no_dok_lengkap = $this->tipe_surat . '-     ' . $this->agenda_dok; 

		$data_pengaman = [
			'alasan_pengamanan' => $request->alasan_pengamanan,
			'keterangan' => $request->keterangan,
			'jenis_pengaman' => $request->jenis_pengaman,
			'jumlah_pengaman' => $request->jumlah_pengaman,
			'satuan_pengaman' => $request->satuan_pengaman,
			'tempat_pengaman' => $request->tempat_pengaman,
		];

		if ($state == 'insert') {
			$data_pengaman['agenda_dok'] = $this->agenda_dok;
			$data_pengaman['no_dok_lengkap'] = $no_dok_lengkap;
			$data_pengaman['nomor_pengaman'] = $no_dok_lengkap;
			$data_pengaman['kode_status'] = 100;
		}

		return $data_pengaman;
	}

	protected function store(Request $request)
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
}
