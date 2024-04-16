<?php

namespace App\Http\Controllers\Penindakan;

use App\Models\Penindakan\DokLap;
use App\Models\Penindakan\DokLptp;
use Illuminate\Http\Request;

class DokSbpController extends PenindakanController
{	
	public function __construct($doc_type='sbp')
	{
		parent::__construct($doc_type);
		$this->lptp_controller = DokLptpController::class;
	}

	/*
	 |--------------------------------------------------------------------------
	 | Data modify functions
	 |--------------------------------------------------------------------------
	 */

	protected function storing(Request $request) {
		$data = parent::storing($request);

		if ($request->lap_id != null) {
			// Attach to existing chain when source is available
			$source = $this->attachTo('lap', $request->lap_id);
			$chain = $source->chain;
		} else {
			// Create new chain when source is not available
			$chain = $this->createChain();
		}
		$data['chain_id'] = $chain->id;

		return $data;
	}

	protected function stored($request)
	{
		$this->createPenindakan($request);

		// Save data LPTP
		$data_lptp = $request->lptp;
		$data_lptp['chain_id'] = $this->doc->chain->id;
		$lptp = DokLptp::create($data_lptp);
		$this->savePetugas($request->lptp['petugas'], $lptp);
		
		parent::stored($request);
	}

	protected function updating(Request $request) {
		$data = parent::updating($request);

		if ($request->lap_id) {
			$existing_chain_id = $this->doc->chain->id;

			$lap = DokLap::findOrFail($request->lap_id);
			$new_chain_id = $lap->chain->id;

			if ($existing_chain_id != $new_chain_id) {
				if ($this->doc->chain->lap) {
					// Rollback previous chain connection
					$this->doc->chain->lap->unFollowedUp();
				} else {
					// Remove previous chain
					$this->doc->chain->delete();
				}
				
				$data['chain_id'] = $new_chain_id;
				$this->changeChain($new_chain_id);
				$lap->followedUp();
			}
		} else {
			if ($this->doc->chain->lap) {
				// Rollback previous chain connection
				$this->doc->chain->lap->unFollowedUp();

				// Create new chain
				$chain = $this->createChain();
				$data['chain_id'] = $chain->id;
				$this->changeChain($chain->id);
			}
		}
		
		return $data;
	}

	protected function updated($request) {
		$this->updatePenindakan($request);

		// Update LPTP
		$data_lptp = $request->lptp;
		$lptp = $this->doc->chain->lptp;
		$lptp->update($data_lptp);
		$this->updatePetugas($request->lptp['petugas'], $lptp);

		parent::updated($request);
	}
}
