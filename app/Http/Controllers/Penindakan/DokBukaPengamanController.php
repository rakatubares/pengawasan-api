<?php

namespace App\Http\Controllers\Penindakan;

use Illuminate\Http\Request;

class DokBukaPengamanController extends PenindakanController
{
	protected $doc_type = 'buka_pengaman';

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
			'sprint.id' => 'nullable|integer',
			'pengaman.id' => 'nullable|integer',
			'jumlah_pengaman' => 'nullable|integer',
			'saksi.id' => 'nullable|integer',
		]);
	}

	protected function prepareData(Request $request, $state='insert')
	{
		$tanggal_buka_pengaman = $request->tanggal_buka_pengaman
			? date('Y-m-d', strtotime($request->tanggal_buka_pengaman))
			: null;
		$tanggal_pengaman = $request->tanggal_pengaman 
			? date('Y-m-d', strtotime($request->tanggal_pengaman))
			: null;
		$asal_pengaman = (
				($request->asal_pengaman == 'pengaman') &
				($request->pengaman_id == null)
			) ? null : $request->asal_pengaman;
		$saksi_id = $request->saksi ? $request->saksi['id'] : null;

		$data = [
			'sprint_id' => $request->sprint['id'],
			'tanggal_buka_pengaman' => $tanggal_buka_pengaman,
			'asal_pengaman' => $asal_pengaman,
			'nomor_pengaman' => $asal_pengaman != 'pengaman' 
				? $request->nomor_pengaman : null,
			'tanggal_pengaman' => $asal_pengaman != 'pengaman' 
				? $tanggal_pengaman : null,
			'jenis_pengaman' => $asal_pengaman != 'pengaman' 
				? $request->jenis_pengaman : null,
			'jumlah_pengaman' => $asal_pengaman != 'pengaman' 
				? $request->jumlah_pengaman : null,
			'satuan_pengaman' => $asal_pengaman != 'pengaman' 
				? $request->satuan_pengaman : null,
			'tempat_pengaman' => $asal_pengaman != 'pengaman' 
				? $request->tempat_pengaman : null,
			'dasar_pengamanan' => $request->dasar_pengamanan,
			'saksi_id' => $saksi_id,
		];

		return $data;
	}

	protected function storing(Request $request) 
	{
		$data = parent::storing($request);

		if ($request->pengaman_id) {
			$pengaman = $this->attachTo('pengaman', $request->pengaman_id, 'status_buka');
			$chain = $pengaman->chain;
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

		// Check for pengaman id
		if ($request->pengaman_id) {
			// Process if pengaman id exists
			if ($this->doc->asal_pengaman == 'pengaman') {
				$existing_pengaman_id = $this->doc->chain->pengaman->id;

				// Change pengaman if pengaman_id different from previous data
				if ($request->pengaman_id != $existing_pengaman_id) {
					// Detach from previous pengaman
					$this->detachFrom('pengaman', $existing_pengaman_id, 'status_buka_pengaman');

					// Attach to new pengaman
					$pengaman = $this->attachTo('pengaman', $request->pengaman_id, 'status_buka_pengaman');
					$chain = $pengaman->chain;
				}
			} else {
				// Attach to new pengaman
				$pengaman = $this->attachTo('pengaman', $request->pengaman_id, 'status_buka_pengaman');
				$chain = $pengaman->chain;
			}
		} else {
			if ($this->doc->asal_pengaman == 'pengaman') {
				$existing_pengaman_id = $this->doc->chain->pengaman->id;
				$this->detachFrom('pengaman', $existing_pengaman_id, 'status_buka_pengaman');
				$chain = $this->createChain();
				$this->createEmptyPenindakan($chain->id);
			}
		}
		$data['chain_id'] = $chain->id;

		return $data;
	}
}
