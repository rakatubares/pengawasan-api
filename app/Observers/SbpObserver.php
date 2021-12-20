<?php

namespace App\Observers;

use App\Models\ObjectRelation;
use App\Models\Sbp;

class SbpObserver
{
	/**
	 * Handle events after all transactions are committed.
	 *
	 * @var bool
	 */
	public $afterCommit = true;

	/**
	 * Handle the Sbp "created" event.
	 *
	 * @param  \App\Models\Sbp  $sbp
	 * @return void
	 */
	public function created(Sbp $sbp)
	{
		//
	}

	/**
	 * Handle the Sbp "updated" event.
	 *
	 * @param  \App\Models\Sbp  $sbp
	 * @return void
	 */
	public function updated(Sbp $sbp)
	{
		//
	}

	/**
	 * Handle the Sbp "deleted" event.
	 *
	 * @param  \App\Models\Sbp  $sbp
	 * @return void
	 */
	public function deleted(Sbp $sbp)
	{
		// Change status to 300
		$sbp->update(['kode_status' => 300]);

		// Delete related model
		$sbp->lptp->delete();
		$sbp->penindakan->delete();
		$sbp->relations()->delete();

		// Delete any possible relations
		ObjectRelation::where(function($query) use ($sbp) {
			$query->where('object1_type', 'riksa')
				->where('object1_id', $sbp->id);
		})->orWhere(function($query) use ($sbp) {
			$query->where('object2_type', 'riksa')
				->where('object2_id', $sbp->id);
		})->delete();
	}

	/**
	 * Handle the Sbp "restored" event.
	 *
	 * @param  \App\Models\Sbp  $sbp
	 * @return void
	 */
	public function restored(Sbp $sbp)
	{
		//
	}

	/**
	 * Handle the Sbp "force deleted" event.
	 *
	 * @param  \App\Models\Sbp  $sbp
	 * @return void
	 */
	public function forceDeleted(Sbp $sbp)
	{
		//
	}
}
