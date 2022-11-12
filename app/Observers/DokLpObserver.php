<?php

namespace App\Observers;

use App\Models\DokLp;
use App\Models\DokLpN;
use App\Models\ObjectRelation;
use App\Traits\SwitcherTrait;

class DokLpObserver
{
	use SwitcherTrait;

	/**
	 * Handle the DokLp "deleted" event.
	 *
	 * @param  \App\Models\DokLp  $dokLp
	 * @return void
	 */
	public function deleted(DokLp|DokLpN $dokLp)
	{
		// Get LP type
		switch (get_class($dokLp)) {
			case $this->switchObject('lp', 'model'):
				$lp_type = 'lp';
				break;

			case $this->switchObject('lpn', 'model'):
				$lp_type = 'lpn';
				break;
			
			default:
				$lp_type = null;
				break;
		}

		// Change status to 300
		$dokLp->update(['kode_status' => 300]);

		// Change SBP status
		$sbp = $dokLp->lphp->lptp->sbp;
		$sbp->update(['kode_status' => 202]);

		// Delete any possible relations
		ObjectRelation::where(function($query) use ($dokLp, $lp_type) {
			$query->where('object1_type', $lp_type)
				->where('object1_id', $dokLp->id);
		})->orWhere(function($query) use ($dokLp, $lp_type) {
			$query->where('object2_type', $lp_type)
				->where('object2_id', $dokLp->id);
		})->delete();
	}
}
