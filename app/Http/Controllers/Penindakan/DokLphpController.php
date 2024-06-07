<?php

namespace App\Http\Controllers\Penindakan;

use App\Http\Controllers\DokController;
use Illuminate\Http\Request;

class DokLphpController extends DokController
{
	protected $doc_type = 'lphp';

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
			'lptp_id' => 'required|integer',
			'tanggal_dokumen' => 'required|date',
		]);
	}

	/**
	 * Prepare data LPHP from request to array
	 * 
	 * @param Request $request
	 * @param String $state
	 * @return Array
	 */
	protected function prepareData(Request $request, $state='insert')
	{
		$thn_dok = $request->tanggal_dokumen != null ? date('Y', strtotime($request->tanggal_dokumen)) : null;
		$tanggal_dokumen = $request->tanggal_dokumen != null ? date('Y-m-d', strtotime($request->tanggal_dokumen)) : null;

		$data_lphp = [
			'thn_dok' => $thn_dok,
			'tanggal_dokumen' => $tanggal_dokumen,
			'analisa' => $request->analisa,
			'catatan' => $request->catatan,
		];

		return $data_lphp;
	}

	protected function storing(Request $request) {
		$data = parent::storing($request);
		$lptp = $this->attachTo('lptp', $request->lptp_id);
		$data['chain_id'] = $lptp->chain->id;

		return $data;
	}

	protected function updating(Request $request) {
		$data = parent::updating($request);
		$chain = $this->doc->chain;
		$existing_lptp_id = $this->doc->chain->lptp->id;

		// Change LPTP if lptp_id different from previous data
		if ($request->lptp_id != $existing_lptp_id) {
			// Detach from previous LPTP
			$this->detachFrom('lptp', $existing_lptp_id);

			// Attach to new LPTP
			$lptp = $this->attachTo('lptp', $request->lptp_id);
			$chain = $lptp->chain;
		}

		$data['chain_id'] = $chain->id;

		return $data;
	}
}
