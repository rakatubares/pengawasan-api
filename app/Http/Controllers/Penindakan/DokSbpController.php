<?php

namespace App\Http\Controllers\Penindakan;

use Illuminate\Http\Request;

class DokSbpController extends PenindakanController
{
	protected $docType = 'sbp';

	public function __construct()
	{
		parent::__construct();
		$doc = new $this->model;
		$this->kodeNhi = $doc->kodeNhi;
		$this->kodeLap = $doc->kodeLap;
		$this->kodeLptp = $doc->kodeLptp;
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
			$kodeNhi = $this->kodeNhi;
			$kodeLap = $this->kodeLap;

			// Attach to chain's documents if exist
			if ($chain->$kodeNhi) { $chain->$kodeNhi->followedUp('status_sbp'); }
			if ($chain->$kodeLap) { $chain->$kodeLap->followedUp(); }
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
		$dataLptp = $request->lptp;
		$dataLptp['chain_id'] = $this->doc->chain->id;
		$modelLptp = $this->getModel($this->kodeLptp);
		$lptp = $modelLptp::create($dataLptp);
		$this->savePetugas($request->lptp['petugas'], $lptp);
		
		parent::stored($request);
	}

	protected function updating(Request $request)
	{
		$data = parent::updating($request);
		$oldChain = $this->doc->chain;
		$oldChainId = $oldChain->id;

		// Get related document code
		$kodeNhi = $this->kodeNhi;
		$kodeLap = $this->kodeLap;

		if ($request->sumber_id) {
			$newSource = $this->getDocument($request->jenis_sumber, $request->sumber_id);
			$newChain = $newSource->chain;
			$newChainId = $newChain->id;

			if ($oldChainId != $newChainId) {
				// Rollback previous chain connection if exist
				$this->rollbackChainDocument($oldChain);

				// Remove chain if no cannected document available
				if (!$oldChain->$kodeNhi && !$oldChain->$kodeLap) { $oldChain->delete(); }
				
				// Change chain
				$data['chain_id'] = $newChainId;
				$this->changeChain($newChainId);

				// Attach to chain's documents if exist
				$this->attachChainDocument($newChain);
			}
		} else {
			// Rollback previous chain connection if exist
			$this->rollbackChainDocument($oldChain);

			// Create new chain if previous chain has connected document
			if ($oldChain->$kodeNhi || $oldChain->$kodeLap)
			{
				$newChain = $this->createChain();
				$data['chain_id'] = $newChain->id;
				$this->changeChain($newChain->id);
			}
		}
		
		return $data;
	}

	private function rollbackChainDocument($chain)
	{
		// Get related document code
		$kodeNhi = $this->kodeNhi;
		$kodeLap = $this->kodeLap;

		if ($chain->$kodeNhi) { $chain->$kodeNhi->unFollowedUp('status_sbp'); }
		if ($chain->$kodeLap) { $chain->$kodeLap->unFollowedUp(); }
	}

	private function attachChainDocument($chain)
	{
		// Get related document code
		$kodeNhi = $this->kodeNhi;
		$kodeLap = $this->kodeLap;

		if ($chain->$kodeNhi) { $chain->$kodeNhi->followedUp('status_sbp'); }
		if ($chain->$kodeLap) { $chain->$kodeLap->followedUp(); }
	}

	protected function updated($request)
	{
		$this->updatePenindakan($request);

		// Update LPTP
		$kodeLptp = $this->kodeLptp;
		$dataLptp = $request->lptp;
		$lptp = $this->doc->chain->$kodeLptp;
		$lptp->update($dataLptp);
		$this->updatePetugas($request->lptp['petugas'], $lptp);

		parent::updated($request);
	}
}
