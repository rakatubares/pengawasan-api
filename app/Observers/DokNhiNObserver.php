<?php

namespace App\Observers;

use App\Models\DokNhiN;
use App\Models\ObjectRelation;

class DokNhiNObserver
{
	/**
	 * Handle the DokNhiN "created" event.
	 *
	 * @param  \App\Models\DokNhiN  $dokNhiN
	 * @return void
	 */
	public function created(DokNhiN $dokNhiN)
	{
		//
	}

	/**
	 * Handle the DokNhiN "updated" event.
	 *
	 * @param  \App\Models\DokNhiN  $dokNhiN
	 * @return void
	 */
	public function updated(DokNhiN $dokNhiN)
	{
		//
	}

	/**
	 * Handle the DokNhiN "deleted" event.
	 *
	 * @param  \App\Models\DokNhiN  $dokNhiN
	 * @return void
	 */
	public function deleted(DokNhiN $dokNhiN)
	{
		// Change status to 300
		$dokNhiN->update(['kode_status' => 300]);

		// Delete intelijen if lkai is the only document
		$dokNhiN->intelijen->lkain->update(['kode_status' => 200]);

		// Delete any possible relations
		ObjectRelation::where(function($query) use ($dokNhiN) {
			$query->where('object1_type', 'nhin')
				->where('object1_id', $dokNhiN->id);
		})->orWhere(function($query) use ($dokNhiN) {
			$query->where('object2_type', 'nhin')
				->where('object2_id', $dokNhiN->id);
		})->delete();
	}

	/**
	 * Handle the DokNhiN "restored" event.
	 *
	 * @param  \App\Models\DokNhiN  $dokNhiN
	 * @return void
	 */
	public function restored(DokNhiN $dokNhiN)
	{
		//
	}

	/**
	 * Handle the DokNhiN "force deleted" event.
	 *
	 * @param  \App\Models\DokNhiN  $dokNhiN
	 * @return void
	 */
	public function forceDeleted(DokNhiN $dokNhiN)
	{
		//
	}
}
