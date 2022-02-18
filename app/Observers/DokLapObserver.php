<?php

namespace App\Observers;

use App\Models\DokLap;
use App\Models\ObjectRelation;

class DokLapObserver
{
	/**
	 * Handle the DokLap "created" event.
	 *
	 * @param  \App\Models\DokLap  $dokLap
	 * @return void
	 */
	public function created(DokLap $dokLap)
	{
		//
	}

	/**
	 * Handle the DokLap "updated" event.
	 *
	 * @param  \App\Models\DokLap  $dokLap
	 * @return void
	 */
	public function updated(DokLap $dokLap)
	{
		//
	}

	/**
	 * Handle the DokLap "deleted" event.
	 *
	 * @param  \App\Models\DokLap  $dokLap
	 * @return void
	 */
	public function deleted(DokLap $dokLap)
	{
		// Change status to 300
		$dokLap->update(['kode_status' => 300]);

		if ($dokLap->li != null) {
			$dokLap->li->update(['kode_status' => 200]);
		}

		// Delete any possible relations
		ObjectRelation::where(function($query) use ($dokLap) {
			$query->where('object1_type', 'lap')
				->where('object1_id', $dokLap->id);
		})->orWhere(function($query) use ($dokLap) {
			$query->where('object2_type', 'lap')
				->where('object2_id', $dokLap->id);
		})->delete();
	}

	/**
	 * Handle the DokLap "restored" event.
	 *
	 * @param  \App\Models\DokLap  $dokLap
	 * @return void
	 */
	public function restored(DokLap $dokLap)
	{
		//
	}

	/**
	 * Handle the DokLap "force deleted" event.
	 *
	 * @param  \App\Models\DokLap  $dokLap
	 * @return void
	 */
	public function forceDeleted(DokLap $dokLap)
	{
		//
	}
}
