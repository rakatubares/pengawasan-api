<?php

namespace App\Http\Controllers\Intelijen;

use Illuminate\Http\Request;

class DokNhiNController extends DokNhiController
{
    public function __construct()
	{
		parent::__construct('nhin');
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
			'lkain_id' => 'nullable|integer',
		]);
	}
}