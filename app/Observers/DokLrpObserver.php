<?php

namespace App\Observers;

use App\Models\DokLrp;
use App\Models\ObjectRelation;

class DokLrpObserver
{
	/**
	 * Handle the DokLrp "created" event.
	 *
	 * @param  \App\Models\DokLrp  $dokLrp
	 * @return void
	 */
	public function created(DokLrp $dokLrp)
	{
		//
	}

	/**
	 * Handle the DokLrp "updated" event.
	 *
	 * @param  \App\Models\DokLrp  $dokLrp
	 * @return void
	 */
	public function updated(DokLrp $dokLrp)
	{
		//
	}

	/**
	 * Handle the DokLrp "deleted" event.
	 *
	 * @param  \App\Models\DokLrp  $dokLrp
	 * @return void
	 */
	public function deleted(DokLrp $dokLrp)
	{
		// Get Related LHP
		$lhp = $dokLrp->lhp;

		// Change LHP status to 200
		$lhp->update(['kode_status' => 200]);

		// Detach LHP
		ObjectRelation::where('object1_type', 'lhp')
			->where('object1_id', $lhp->id)
			->where('object2_type', 'lrp')
			->where('object2_id', $dokLrp->id)
			->delete();

		// Change status to 300
		$dokLrp->update(['kode_status' => 300]);

		// Delete any possible relations
		ObjectRelation::where(function($query) use ($dokLrp) {
			$query->where('object1_type', 'lrp')
				->where('object1_id', $dokLrp->id);
		})->orWhere(function($query) use ($dokLrp) {
			$query->where('object2_type', 'lrp')
				->where('object2_id', $dokLrp->id);
		})->delete();
	}

	/**
	 * Handle the DokLrp "restored" event.
	 *
	 * @param  \App\Models\DokLrp  $dokLrp
	 * @return void
	 */
	public function restored(DokLrp $dokLrp)
	{
		//
	}

	/**
	 * Handle the DokLrp "force deleted" event.
	 *
	 * @param  \App\Models\DokLrp  $dokLrp
	 * @return void
	 */
	public function forceDeleted(DokLrp $dokLrp)
	{
		//
	}
}
