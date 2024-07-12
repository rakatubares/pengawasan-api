<?php

namespace App\Http\Controllers\Penindakan;

use App\Http\Controllers\DokController;
use Illuminate\Http\Request;

class DokLptController extends DokController
{
    protected $docType = 'lpt';

	/**
	 * Validate request
	 *
	 * @param  \Illuminate\Http\Request  $request
	 */
	protected function validateData(Request $request)
	{
		$request->validate([
			'sbp.id' => 'required|integer',
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
		return [
			'sbp_id' => $request->sbp['id'],
			'barang' => $request->barang,
			'sarpras' => $request->sarpras,
			'kronologi' => $request->kronologi,
		];
	}

	protected function storing(Request $request) {
		$data = parent::storing($request);
		$sbp = $this->attachTo('sbp', $request->sbp['id'], 'status_lpt');
		$data['chain_id'] = $sbp->chain->id;

		return $data;
	}

	protected function updating(Request $request) {
		$data = parent::updating($request);
		$chain = $this->doc->chain;
		$existing_sbp_id = $this->doc->chain->sbp->id;

		// Change SBP if sbp_id different from previous data
		if ($request->sbp_id != $existing_sbp_id) {
			// Detach from previous SBP
			$this->detachFrom('sbp', $existing_sbp_id, 'status_lpt');

			// Attach to new SBP
			$sbp = $this->attachTo('sbp', $request->sbp['id'], 'status_lpt');
			$chain = $sbp->chain;
		}

		$data['chain_id'] = $chain->id;

		return $data;
	}
}
