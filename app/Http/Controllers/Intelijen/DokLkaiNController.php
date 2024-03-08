<?php

namespace App\Http\Controllers\Intelijen;

use Illuminate\Http\Request;

class DokLkaiNController extends DokLkaiController
{
	public function __construct()
	{
		parent::__construct('lkain');
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
			'lppin_id' => 'nullable|integer',
			'tanggal_lptin' => 'nullable|date',
			'tanggal_npin' => 'nullable|date',
			'flag_rekom_nhin' => 'boolean',
			'flag_rekom_nin' => 'boolean',
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
		$data = $this->prepareCommonData($request);

		$tanggal_lptin = $this->dateFromText($request->tanggal_lptin);
		$tanggal_npin = $this->dateFromText($request->tanggal_npin);

		$data['nomor_lptin'] = $request->nomor_lptin;
		$data['tanggal_lptin'] = $tanggal_lptin;
		$data['nomor_npin'] = $request->nomor_npin;
		$data['tanggal_npin'] = $tanggal_npin;
		$data['flag_rekom_nhin'] = $request->flag_rekom_nhin;
		$data['flag_rekom_nin'] = $request->flag_rekom_nin;
		return $data;
	}
}