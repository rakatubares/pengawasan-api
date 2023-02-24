<?php

namespace App\Observers;

use App\Models\DokSplit;
use App\Models\ObjectRelation;

class DokSplitObserver
{
	/**
	 * Handle the DokSplit "created" event.
	 *
	 * @param  \App\Models\DokSplit  $dokSplit
	 * @return void
	 */
	public function created(DokSplit $dokSplit)
	{
		//
	}

	/**
	 * Handle the DokSplit "updated" event.
	 *
	 * @param  \App\Models\DokSplit  $dokSplit
	 * @return void
	 */
	public function updated(DokSplit $dokSplit)
	{
		//
	}

	/**
	 * Handle the DokSplit "deleted" event.
	 *
	 * @param  \App\Models\DokSplit  $dokSplit
	 * @return void
	 */
	public function deleted(DokSplit $dokSplit)
	{
		// Get Related LPF
		$lpf = $dokSplit->lpf;

		// Change LPF status to 200
		$lpf->update(['kode_status' => 200]);

		// Detach LPF
		ObjectRelation::where('object1_type', 'lpf')
			->where('object1_id', $lpf->id)
			->where('object2_type', 'split')
			->where('object2_id', $dokSplit->id)
			->delete();

		// Change status to 300
		$dokSplit->update(['kode_status' => 300]);

		// Delete any possible relations
		ObjectRelation::where(function($query) use ($dokSplit) {
			$query->where('object1_type', 'split')
				->where('object1_id', $dokSplit->id);
		})->orWhere(function($query) use ($dokSplit) {
			$query->where('object2_type', 'split')
				->where('object2_id', $dokSplit->id);
		})->delete();
	}

	/**
	 * Handle the DokSplit "restored" event.
	 *
	 * @param  \App\Models\DokSplit  $dokSplit
	 * @return void
	 */
	public function restored(DokSplit $dokSplit)
	{
		//
	}

	/**
	 * Handle the DokSplit "force deleted" event.
	 *
	 * @param  \App\Models\DokSplit  $dokSplit
	 * @return void
	 */
	public function forceDeleted(DokSplit $dokSplit)
	{
		//
	}
}
