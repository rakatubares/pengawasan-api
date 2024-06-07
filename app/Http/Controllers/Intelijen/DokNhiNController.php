<?php

namespace App\Http\Controllers\Intelijen;

use Illuminate\Http\Request;

class DokNhiNController extends DokNhiController
{
	protected $doc_type = 'nhin';

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