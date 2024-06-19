<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokContohController extends DokPenindakanController
{
	public function __construct($doc_type='contoh')
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
			'sprint.id' => 'required|integer',
			'lokasi' => 'required',
			'saksi.id' => 'nullable|integer',
			'petugas1.user_id' => 'required|integer',
			'petugas2.user_id' => 'nullable|integer',
		]);
	}

	/**
	 * Prepare data titip
	 * 
	 * @param  \Illuminate\Http\Request  $request
	 * @param String $state
	 * @return Array
	 */
	protected function prepareData(Request $request, String $state='insert')
	{
		$no_dok_lengkap = $this->tipe_surat . '-     ' . $this->agenda_dok;
		
		$data_contoh = [
			'sprint_id' => $request->sprint['id'],
			'lokasi' => $request->lokasi,
			'saksi_id' => $request->saksi['id'],
			'petugas1_id' => $request->petugas1['user_id'],
			'petugas2_id' => $request->petugas2['user_id'],
		];

		if ($state == 'insert') {
			$data_contoh['agenda_dok'] = $this->agenda_dok;
			$data_contoh['no_dok_lengkap'] = $no_dok_lengkap;
			$data_contoh['kode_status'] = 100;
		};

		return $data_contoh;
	}

	public function store(Request $request)
	{
		$result = $this->storePenindakanDocument($request);
		return $result;
	}

	public function update(Request $request, $id)
	{
		$result = $this->updatePenindakanDocument($request, $id);
		return $result;
	}
}
