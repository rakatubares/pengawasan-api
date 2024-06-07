<?php

namespace App\Http\Controllers\Penindakan;

use Illuminate\Http\Request;

class DokSbpController extends PenindakanController
{
	protected $doc_type = 'sbp';

	public function __construct()
	{
		parent::__construct();
		$doc = new $this->model;
		$this->kode_nhi = $doc->kode_nhi;
		$this->kode_lap = $doc->kode_lap;
		$this->kode_lptp = $doc->kode_lptp;
	}

	/*
	 |--------------------------------------------------------------------------
	 | Data modify functions
	 |--------------------------------------------------------------------------
	 */

	protected function storing(Request $request) 
	{
		$data = parent::storing($request);

		if ($request->sumber_id != null) {
			// Get source's chain
			$source = $this->getDocument($request->jenis_sumber, $request->sumber_id);
			$chain = $source->chain;

			// Get related document code
			$kode_nhi = $this->kode_nhi;
			$kode_lap = $this->kode_lap;

			// Attach to chain's documents if exist
			if ($chain->$kode_nhi) { $chain->$kode_nhi->followedUp('status_sbp'); }
			if ($chain->$kode_lap) { $chain->$kode_lap->followedUp(); }
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
		$model_lptp = $this->getModel($this->kode_lptp);
		$lptp = $model_lptp::create($data_lptp);
		$this->savePetugas($request->lptp['petugas'], $lptp);
		
		parent::stored($request);
	}

	protected function updating(Request $request) 
	{
		$data = parent::updating($request);
		$old_chain = $this->doc->chain;
		$old_chain_id = $old_chain->id;

		// Get related document code
		$kode_nhi = $this->kode_nhi;
		$kode_lap = $this->kode_lap;

		if ($request->sumber_id) {
			$new_source = $this->getDocument($request->jenis_sumber, $request->sumber_id);
			$new_chain = $new_source->chain;
			$new_chain_id = $new_chain->id;

			if ($old_chain_id != $new_chain_id) {
				// Rollback previous chain connection if exist
				if ($old_chain->$kode_nhi) { $old_chain->$kode_nhi->unFollowedUp('status_sbp'); }
				if ($old_chain->$kode_lap) { $old_chain->$kode_lap->unFollowedUp(); }

				// Remove chain if no cannected document available
				if (!$old_chain->$kode_nhi && !$old_chain->$kode_lap) { $old_chain->delete(); }
				
				// Change chain
				$data['chain_id'] = $new_chain_id;
				$this->changeChain($new_chain_id);

				// Attach to chain's documents if exist
				if ($new_chain->$kode_nhi) { $new_chain->$kode_nhi->followedUp('status_sbp'); }
				if ($new_chain->$kode_lap) { $new_chain->$kode_lap->followedUp(); }
			}
		} else {
			// Rollback previous chain connection if exist
			if ($old_chain->$kode_nhi) { $old_chain->$kode_nhi->unFollowedUp('status_sbp'); }
			if ($old_chain->$kode_lap) { $old_chain->$kode_lap->unFollowedUp(); } 

			// Create new chain if previous chain has connected document
			if ($old_chain->$kode_nhi || $old_chain->$kode_lap) 
			{
				$new_chain = $this->createChain();
				$data['chain_id'] = $new_chain->id;
				$this->changeChain($new_chain->id);
			}
		}
		
		return $data;
	}

	protected function updated($request) 
	{
		$this->updatePenindakan($request);

		// Update LPTP
		$kode_lptp = $this->kode_lptp;
		$data_lptp = $request->lptp;
		$lptp = $this->doc->chain->$kode_lptp;
		$lptp->update($data_lptp);
		$this->updatePetugas($request->lptp['petugas'], $lptp);

		parent::updated($request);
	}
}
