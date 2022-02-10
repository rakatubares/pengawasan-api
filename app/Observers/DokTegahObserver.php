<?php

namespace App\Observers;

use App\Models\ObjectRelation;
use App\Models\DokTegah;

class DokTegahObserver
{
	/**
	 * Handle the DokTegah "created" event.
	 *
	 * @param  \App\Models\DokTegah  $tegah
	 * @return void
	 */
	public function created(DokTegah $tegah)
	{
		//
	}

	/**
	 * Handle the DokTegah "updated" event.
	 *
	 * @param  \App\Models\DokTegah  $tegah
	 * @return void
	 */
	public function updated(DokTegah $tegah)
	{
		//
	}

	/**
	 * Handle the DokTegah "deleted" event.
	 *
	 * @param  \App\Models\DokTegah  $tegah
	 * @return void
	 */
	public function deleted(DokTegah $tegah)
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
	 * Handle the DokTegah "restored" event.
	 *
	 * @param  \App\Models\DokTegah  $tegah
	 * @return void
	 */
	public function restored(DokTegah $tegah)
	{
		//
	}

	/**
	 * Handle the DokTegah "force deleted" event.
	 *
	 * @param  \App\Models\DokTegah  $tegah
	 * @return void
	 */
	public function forceDeleted(DokTegah $tegah)
	{
		//
	}
}
