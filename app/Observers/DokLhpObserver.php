<?php

namespace App\Observers;

use App\Models\DokLhp;
use App\Models\ObjectRelation;

class DokLhpObserver
{
	/**
	 * Handle the DokLhp "created" event.
	 *
	 * @param  \App\Models\DokLhp  $dokLhp
	 * @return void
	 */
	public function created(DokLhp $dokLhp)
	{
		//
	}

	/**
	* Handle the DokLhp "updated" event.
	*
	* @param  \App\Models\DokLhp  $dokLhp
	* @return void
	*/
	public function updated(DokLhp $dokLhp)
	{
		//
	}

	/**
	* Handle the DokLhp "deleted" event.
	*
	* @param  \App\Models\DokLhp  $dokLhp
	* @return void
	*/
	public function deleted(DokLhp $dokLhp)
	{
		// Get Related SPLIT
		$split = $dokLhp->split;

		// Change SPLIT status to 200
		$split->update(['kode_status' => 200]);

		// Detach SPLIT
		ObjectRelation::where('object1_type', 'split')
			->where('object1_id', $split->id)
			->where('object2_type', 'lhp')
			->where('object2_id', $dokLhp->id)
			->delete();

		// Change status to 300
		$dokLhp->update(['kode_status' => 300]);

		// Delete any possible relations
		ObjectRelation::where(function($query) use ($dokLhp) {
			$query->where('object1_type', 'lhp')
				->where('object1_id', $dokLhp->id);
		})->orWhere(function($query) use ($dokLhp) {
			$query->where('object2_type', 'lhp')
				->where('object2_id', $dokLhp->id);
		})->delete();
	}

	/**
	* Handle the DokLhp "restored" event.
	*
	* @param  \App\Models\DokLhp  $dokLhp
	* @return void
	*/
	public function restored(DokLhp $dokLhp)
	{
		//
	}

	/**
	* Handle the DokLhp "force deleted" event.
	*
	* @param  \App\Models\DokLhp  $dokLhp
	* @return void
	*/
	public function forceDeleted(DokLhp $dokLhp)
	{
		//
	}
}
