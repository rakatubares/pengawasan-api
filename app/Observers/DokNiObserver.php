<?php

namespace App\Observers;

use App\Models\DokNi;
use App\Models\ObjectRelation;

class DokNiObserver
{
	/**
	 * Handle the DokNi "created" event.
	 *
	 * @param  \App\Models\DokNi  $dokNi
	 * @return void
	 */
	public function created(DokNi $dokNi)
	{
		//
	}

	/**
	 * Handle the DokNi "updated" event.
	 *
	 * @param  \App\Models\DokNi  $dokNi
	 * @return void
	 */
	public function updated(DokNi $dokNi)
	{
		//
	}

	/**
	 * Handle the DokNi "deleted" event.
	 *
	 * @param  \App\Models\DokNi  $dokNi
	 * @return void
	 */
	public function deleted(DokNi $dokNi)
	{
		// Change status to 300
		$dokNi->update(['kode_status' => 300]);

		// Delete intelijen if lkai is the only document
		$dokNi->intelijen->lkai->update(['kode_status' => 200]);

		// Delete any possible relations
		ObjectRelation::where(function($query) use ($dokNi) {
			$query->where('object1_type', 'ni')
				->where('object1_id', $dokNi->id);
		})->orWhere(function($query) use ($dokNi) {
			$query->where('object2_type', 'ni')
				->where('object2_id', $dokNi->id);
		})->delete();
	}

	/**
	 * Handle the DokNi "restored" event.
	 *
	 * @param  \App\Models\DokNi  $dokNi
	 * @return void
	 */
	public function restored(DokNi $dokNi)
	{
		//
	}

	/**
	 * Handle the DokNi "force deleted" event.
	 *
	 * @param  \App\Models\DokNi  $dokNi
	 * @return void
	 */
	public function forceDeleted(DokNi $dokNi)
	{
		//
	}
}
