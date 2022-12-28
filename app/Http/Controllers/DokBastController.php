<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokBastController extends DokPenindakanController
{
	public function __construct($doc_type='bast')
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
			'dalam_rangka' => 'required',
			'yang_menyerahkan.type' => 'required',
			'yang_menyerahkan.data.id' => 'required|integer',
			'yang_menyerahkan.atas_nama' => 'required',
			'yang_menerima.type' => 'required',
			'yang_menerima.data.id' => 'required|integer',
			'yang_menerima.atas_nama' => 'required',
		]);
	}

	/**
	 * Prepare data SBP from request to array
	 * 
	 * @param Request $request
	 * @param String $state
	 * @return Array
	 */
	protected function prepareData(Request $request, $state='insert')
	{
		$no_dok_lengkap = $this->tipe_surat . '-' . '      ' . $this->agenda_dok;

		// Data BAST
		$data_bast = [
			'dalam_rangka' => $request->dalam_rangka,
			'yang_menerima_type' => $request->yang_menerima['type'],
			'yang_menerima_id'  => $request->yang_menerima['data']['id'],
			'atas_nama_yang_menerima'  => $request->yang_menerima['atas_nama'],
			'yang_menyerahkan_type' => $request->yang_menyerahkan['type'],
			'yang_menyerahkan_id'  => $request->yang_menyerahkan['data']['id'],
			'atas_nama_yang_menyerahkan'  => $request->yang_menyerahkan['atas_nama'],
		];

		if ($state == 'insert') {
			$data_bast['agenda_dok'] = $this->agenda_dok;
			$data_bast['no_dok_lengkap'] = $no_dok_lengkap;
			$data_bast['kode_status'] = 100;
		}

		return $data_bast;
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
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$result = $this->updatePenindakanDocument($request, $id);
		return $result;
	}
}
