<?php

namespace App\Http\Controllers\Penindakan;

use Illuminate\Http\Request;

class DokBukaSegelController extends PenindakanController
{
	public function __construct($doc_type='buka_segel')
	{
		parent::__construct($doc_type);
	}

	/**
	 * Validate request
	 */
	protected function validateData(Request $request)
	{
		$request->validate([
			'sprint.id' => 'nullable|integer',
			'segel.id' => 'nullable|integer',
			'jumlah_segel' => 'nullable|integer',
			'saksi.id' => 'nullable|integer',
		]);
	}

	protected function prepareData(Request $request, $state='insert')
	{
		$tanggal_buka_segel = $request->tanggal_buka_segel
			? date('Y-m-d', strtotime($request->tanggal_buka_segel))
			: null;
		$tanggal_segel = $request->tanggal_segel 
			? date('Y-m-d', strtotime($request->tanggal_segel))
			: null;
		$asal_segel = (
				($request->asal_segel == 'segel') &
				($request->segel_id == null)
			) ? null : $request->asal_segel;
		$saksi_id = $request->saksi ? $request->saksi['id'] : null;

		$data = [
			'sprint_id' => $request->sprint['id'],
			'tanggal_buka_segel' => $tanggal_buka_segel,
			'asal_segel' => $asal_segel,
			'nomor_segel' => $asal_segel != 'segel' 
				? $request->nomor_segel : null,
			'tanggal_segel' => $asal_segel != 'segel' 
				? $tanggal_segel : null,
			'jenis_segel' => $asal_segel != 'segel' 
				? $request->jenis_segel : null,
			'jumlah_segel' => $asal_segel != 'segel' 
				? $request->jumlah_segel : null,
			'satuan_segel' => $asal_segel != 'segel' 
				? $request->satuan_segel : null,
			'tempat_segel' => $asal_segel != 'segel' 
				? $request->tempat_segel : null,
			'saksi_id' => $saksi_id,
		];

		return $data;
	}

	protected function storing(Request $request) 
	{
		$data = parent::storing($request);

		if ($request->segel_id) {
			$segel = $this->attachTo('segel', $request->segel_id);
			$chain = $segel->chain;
		} else {
			$chain = $this->createChain();
			$this->createEmptyPenindakan($chain->id);
		}
		$data['chain_id'] = $chain->id;
		
		return $data;
	}

	protected function updating(Request $request) {
		$data = parent::updating($request);
		$chain = $this->doc->chain;

		// Check for segel id
		if ($request->segel_id) {
			// Process if segel id exists
			if ($this->doc->asal_segel == 'segel') {
				$existing_segel_id = $this->doc->chain->segel->id;

				// Change segel if segel_id different from previous data
				if ($request->segel_id != $existing_segel_id) {
					// Detach from previous segel
					$this->detachFrom('segel', $existing_segel_id);

					// Attach to new segel
					$segel = $this->attachTo('segel', $request->segel_id);
					$chain = $segel->chain;
				}
			} else {
				// Attach to new segel
				$segel = $this->attachTo('segel', $request->segel_id);
				$chain = $segel->chain;
			}
		} else {
			if ($this->doc->asal_segel == 'segel') {
				$existing_segel_id = $this->doc->chain->segel->id;
				$this->detachFrom('segel', $existing_segel_id);
				$chain = $this->createChain();
				$this->createEmptyPenindakan($chain->id);
			}
		}
		$data['chain_id'] = $chain->id;

		return $data;
	}
}