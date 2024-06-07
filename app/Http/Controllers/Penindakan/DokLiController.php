<?php

namespace App\Http\Controllers\Penindakan;

use App\Http\Controllers\DokController;
use Illuminate\Http\Request;

class DokLiController extends DokController
{
	protected $doc_type = 'li';

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
		$data = [
			'sumber' => $request->sumber,
			'informasi' => $request->informasi,
			'tindak_lanjut' => $request->tindak_lanjut,
			'catatan' => $request->catatan,
		];

		return $data;
	}

	protected function storing(Request $request) {
		$data = parent::storing($request);
		$chain = $this->createChain();
		$data['chain_id'] = $chain->id;
		return $data;
	}
}