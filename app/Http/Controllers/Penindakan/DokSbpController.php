<?php

namespace App\Http\Controllers\Penindakan;

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

		if ($request->sumber_id != null) {
			// Get source's chain
			$source = $this->getDocument($request->jenis_sumber, $request->sumber_id);
			$chain = $source->chain;

			// Attach to chain's documents if exist
			if ($chain->nhi) { $chain->nhi->followedUp('status_sbp'); }
			if ($chain->lap) { $chain->lap->followedUp(); }
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
		$old_chain = $this->doc->chain;
		$old_chain_id = $old_chain->id;

		if ($request->sumber_id) {
			$new_source = $this->getDocument($request->jenis_sumber, $request->sumber_id);
			$new_chain = $new_source->chain;
			$new_chain_id = $new_chain->id;

			if ($old_chain_id != $new_chain_id) {
				// Rollback previous chain connection if exist
				if ($old_chain->nhi) { $old_chain->nhi->unFollowedUp('status_sbp'); }
				if ($old_chain->lap) { $old_chain->lap->unFollowedUp(); }

				// Remove chain if no cannected document available
				if (!$old_chain->nhi &&!$old_chain->lap) { $old_chain->delete(); }
				
				// Change chain
				$data['chain_id'] = $new_chain_id;
				$this->changeChain($new_chain_id);

				// Attach to chain's documents if exist
				if ($new_chain->nhi) { $new_chain->nhi->followedUp('status_sbp'); }
				if ($new_chain->lap) { $new_chain->lap->followedUp(); }
			}
		} else {
			// Rollback previous chain connection if exist
			if ($old_chain->nhi) { $old_chain->nhi->unFollowedUp('status_sbp'); }
			if ($old_chain->lap) { $old_chain->lap->unFollowedUp(); } 

			// Create new chain if previous chain has connected document
			if ($old_chain->nhi || $old_chain->lap) 
			{
				$new_chain = $this->createChain();
				$data['chain_id'] = $new_chain->id;
				$this->changeChain($new_chain->id);
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
