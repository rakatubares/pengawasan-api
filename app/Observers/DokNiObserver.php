<?php

namespace App\Observers;

use App\Models\DokNi;
use App\Models\ObjectRelation;
use App\Traits\SwitcherTrait;

class DokNiObserver
{
	use SwitcherTrait;

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
		// Get LKAI type
		switch (get_class($dokNi)) {
			case $this->switchObject('ni', 'model'):
				$ni_type = 'ni';
				$lkai_type = 'lkai';
				break;

			case $this->switchObject('nin', 'model'):
				$ni_type = 'nin';
				$lkai_type = 'lkain';
				break;
			
			default:
				$ni_type = null;
				$lkai_type = null;
				break;
		}

		// Change status to 300
		$dokNi->update(['kode_status' => 300]);

		// Delete intelijen if lkai is the only document
		$dokNi->intelijen->$lkai_type->update(['kode_status' => 200]);

		// Delete any possible relations
		ObjectRelation::where(function($query) use ($ni_type, $dokNi) {
			$query->where('object1_type', $ni_type)
				->where('object1_id', $dokNi->id);
		})->orWhere(function($query) use ($ni_type, $dokNi) {
			$query->where('object2_type', $ni_type)
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
