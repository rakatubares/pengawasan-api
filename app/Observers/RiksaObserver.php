<?php

namespace App\Observers;

use App\Models\ObjectRelation;
use App\Models\Riksa;

class RiksaObserver
{
	/**
	 * Handle events after all transactions are committed.
	 *
	 * @var bool
	 */
	public $afterCommit = true;

	/**
	 * Handle the Riksa "created" event.
	 *
	 * @param  \App\Models\Riksa  $riksa
	 * @return void
	 */
	public function created(Riksa $riksa)
	{
		//
	}

	/**
	 * Handle the Riksa "updated" event.
	 *
	 * @param  \App\Models\Riksa  $riksa
	 * @return void
	 */
	public function updated(Riksa $riksa)
	{
		//
	}

	/**
	 * Handle the Riksa "deleted" event.
	 *
	 * @param  \App\Models\Riksa  $riksa
	 * @return void
	 */
	public function deleted(Riksa $riksa)
	{
		// Change status to 300
		$riksa->update(['kode_status' => 300]);
		
		// Delete related model
		$riksa->penindakan->delete();

		// Delete any possible relations
		ObjectRelation::where(function($query) use ($riksa) {
			$query->where('object1_type', 'riksa')
				->where('object1_id', $riksa->id);
		})->orWhere(function($query) use ($riksa) {
			$query->where('object2_type', 'riksa')
				->where('object2_id', $riksa->id);
		})->delete();
	}

	/**
	 * Handle the Riksa "restored" event.
	 *
	 * @param  \App\Models\Riksa  $riksa
	 * @return void
	 */
	public function restored(Riksa $riksa)
	{
		//
	}

	/**
	 * Handle the Riksa "force deleted" event.
	 *
	 * @param  \App\Models\Riksa  $riksa
	 * @return void
	 */
	public function forceDeleted(Riksa $riksa)
	{
		//
	}
}
