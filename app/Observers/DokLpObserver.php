<?php

namespace App\Observers;

use App\Models\DokLp;
use App\Models\ObjectRelation;

class DokLpObserver
{
	/**
	 * Handle the DokLp "created" event.
	 *
	 * @param  \App\Models\DokLp  $dokLp
	 * @return void
	 */
	public function created(DokLp $dokLp)
	{
		//
	}

	/**
	 * Handle the DokLp "updated" event.
	 *
	 * @param  \App\Models\DokLp  $dokLp
	 * @return void
	 */
	public function updated(DokLp $dokLp)
	{
		//
	}

	/**
	 * Handle the DokLp "deleted" event.
	 *
	 * @param  \App\Models\DokLp  $dokLp
	 * @return void
	 */
	public function deleted(DokLp $dokLp)
	{
		// Change status to 300
		$dokLp->update(['kode_status' => 300]);

		// Change SBP status
		$sbp = $dokLp->lphp->lptp->sbp;
		$sbp->update(['kode_status' => 202]);

		// Delete any possible relations
		ObjectRelation::where(function($query) use ($dokLp) {
			$query->where('object1_type', 'lp')
				->where('object1_id', $dokLp->id);
		})->orWhere(function($query) use ($dokLp) {
			$query->where('object2_type', 'lp')
				->where('object2_id', $dokLp->id);
		})->delete();
	}

	/**
	 * Handle the DokLp "restored" event.
	 *
	 * @param  \App\Models\DokLp  $dokLp
	 * @return void
	 */
	public function restored(DokLp $dokLp)
	{
		//
	}

	/**
	 * Handle the DokLp "force deleted" event.
	 *
	 * @param  \App\Models\DokLp  $dokLp
	 * @return void
	 */
	public function forceDeleted(DokLp $dokLp)
	{
		//
	}
}
