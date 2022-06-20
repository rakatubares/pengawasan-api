<?php

namespace App\Observers;

use App\Models\DokNhi;
use App\Models\ObjectRelation;

class DokNhiObserver
{
	/**
	 * Handle the DokNhi "created" event.
	 *
	 * @param  \App\Models\DokNhi  $dokNhi
	 * @return void
	 */
	public function created(DokNhi $dokNhi)
	{
		//
	}

	/**
	 * Handle the DokNhi "updated" event.
	 *
	 * @param  \App\Models\DokNhi  $dokNhi
	 * @return void
	 */
	public function updated(DokNhi $dokNhi)
	{
		//
	}

	/**
	 * Handle the DokNhi "deleted" event.
	 *
	 * @param  \App\Models\DokNhi  $dokNhi
	 * @return void
	 */
	public function deleted(DokNhi $dokNhi)
	{
		// Change status to 300
		$dokNhi->update(['kode_status' => 300]);

		// Delete intelijen if lkai is the only document
		$dokNhi->intelijen->lkai->update(['kode_status' => 200]);

		// Delete any possible relations
		ObjectRelation::where(function($query) use ($dokNhi) {
			$query->where('object1_type', 'nhi')
				->where('object1_id', $dokNhi->id);
		})->orWhere(function($query) use ($dokNhi) {
			$query->where('object2_type', 'nhi')
				->where('object2_id', $dokNhi->id);
		})->delete();
	}

	/**
	 * Handle the DokNhi "restored" event.
	 *
	 * @param  \App\Models\DokNhi  $dokNhi
	 * @return void
	 */
	public function restored(DokNhi $dokNhi)
	{
		//
	}

	/**
	 * Handle the DokNhi "force deleted" event.
	 *
	 * @param  \App\Models\DokNhi  $dokNhi
	 * @return void
	 */
	public function forceDeleted(DokNhi $dokNhi)
	{
		//
	}
}
