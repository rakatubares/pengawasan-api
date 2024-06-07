<?php

namespace App\Http\Controllers\Penindakan;

use App\Http\Controllers\DokController;
use Illuminate\Http\Request;

class DokLpController extends DokController
{
	protected $doc_type = 'lp';

	/**
	 * Validate request
	 * 
	 * @param  \Illuminate\Http\Request  $request
	 */
	protected function validateData(Request $request)
	{
		$request->validate([
			'lphp_id' => 'required|integer',
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
			'pasal' => $request->pasal,
			'modus' => $request->modus,
		];

		return $data_lphp;
	}

	protected function storing(Request $request) {
		$data = parent::storing($request);
		$lphp = $this->attachTo('lphp', $request->lphp_id);
		$data['chain_id'] = $lphp->chain->id;

		return $data;
	}

	protected function updating(Request $request) {
		$data = parent::updating($request);
		$chain = $this->doc->chain;
		$existing_lphp_id = $this->doc->chain->lphp->id;

		// Change LPHP if lptp_id different from previous data
		if ($request->lphp_id != $existing_lphp_id) {
			// Detach from previous LPHP
			$this->detachFrom('lphp', $existing_lphp_id);

			// Attach to new LPHP
			$lphp = $this->attachTo('lphp', $request->lphp_id);
			$chain = $lphp->chain;
		}

		$data['chain_id'] = $chain->id;

		return $data;
	}
}
