<?php

namespace App\Observers;

use App\Models\ObjectRelation;
use App\Models\Tegah;

class TegahObserver
{
	/**
	 * Handle the Tegah "created" event.
	 *
	 * @param  \App\Models\Tegah  $tegah
	 * @return void
	 */
	public function created(Tegah $tegah)
	{
		//
	}

	/**
	 * Handle the Tegah "updated" event.
	 *
	 * @param  \App\Models\Tegah  $tegah
	 * @return void
	 */
	public function updated(Tegah $tegah)
	{
		//
	}

	/**
	 * Handle the Tegah "deleted" event.
	 *
	 * @param  \App\Models\Tegah  $tegah
	 * @return void
	 */
	public function deleted(Tegah $tegah)
	{
		// Change status to 300
		$tegah->update(['kode_status' => 300]);

		// Delete any possible relations
		ObjectRelation::where(function($query) use ($tegah) {
			$query->where('object1_type', 'tegah')
				->where('object1_id', $tegah->id);
		})->orWhere(function($query) use ($tegah) {
			$query->where('object2_type', 'tegah')
				->where('object2_id', $tegah->id);
		})->delete();
	}

	/**
	 * Handle the Tegah "restored" event.
	 *
	 * @param  \App\Models\Tegah  $tegah
	 * @return void
	 */
	public function restored(Tegah $tegah)
	{
		//
	}

	/**
	 * Handle the Tegah "force deleted" event.
	 *
	 * @param  \App\Models\Tegah  $tegah
	 * @return void
	 */
	public function forceDeleted(Tegah $tegah)
	{
		//
	}
}
