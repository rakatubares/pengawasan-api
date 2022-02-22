<?php

namespace App\Observers;

use App\Models\ObjectRelation;
use App\Models\DokSbp;
use App\Traits\SwitcherTrait;

class DokSbpObserver
{
	use SwitcherTrait;

	/**
	 * Handle events after all transactions are committed.
	 *
	 * @var bool
	 */
	public $afterCommit = true;

	/**
	 * Handle the Sbp "created" event.
	 *
	 * @param  \App\Models\DokSbp  $sbp
	 * @return void
	 */
	public function created(DokSbp $sbp)
	{
		//
	}

	/**
	 * Handle the Sbp "updated" event.
	 *
	 * @param  \App\Models\DokSbp  $sbp
	 * @return void
	 */
	public function updated(DokSbp $sbp)
	{
		//
	}

	/**
	 * Handle the Sbp "deleted" event.
	 *
	 * @param  \App\Models\DokSbp  $sbp
	 * @return void
	 */
	public function deleted(DokSbp $sbp)
	{
		// Get SBP type
		switch (get_class($sbp)) {
			case $this->switchObject('sbp', 'model'):
				$sbp_type = 'sbp';
				break;

			case $this->switchObject('sbpn', 'model'):
				$sbp_type = 'sbpn';
				break;
			
			default:
				$sbp_type = null;
				break;
		}

		// Change status to 300
		$sbp->update(['kode_status' => 300]);

		// Delete related model
		$sbp->lptp->delete();
		if ($sbp->penindakan != null) {
			$sbp->penindakan->delete();
		}

		// Delete any possible relations
		ObjectRelation::where(function($query) use ($sbp, $sbp_type) {
			$query->where('object1_type', $sbp_type)
				->where('object1_id', $sbp->id);
		})->orWhere(function($query) use ($sbp, $sbp_type) {
			$query->where('object2_type', $sbp_type)
				->where('object2_id', $sbp->id);
		})->delete();
	}

	/**
	 * Handle the Sbp "restored" event.
	 *
	 * @param  \App\Models\DokSbp  $sbp
	 * @return void
	 */
	public function restored(DokSbp $sbp)
	{
		//
	}

	/**
	 * Handle the Sbp "force deleted" event.
	 *
	 * @param  \App\Models\DokSbp  $sbp
	 * @return void
	 */
	public function forceDeleted(DokSbp $sbp)
	{
		//
	}
}
