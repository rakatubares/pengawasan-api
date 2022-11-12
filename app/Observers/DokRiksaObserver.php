<?php

namespace App\Observers;

use App\Models\ObjectRelation;
use App\Models\DokRiksa;

class DokRiksaObserver
{
	/**
	 * Handle events after all transactions are committed.
	 *
	 * @var bool
	 */
	public $afterCommit = true;

	/**
	 * Handle the DokRiksa "created" event.
	 *
	 * @param  \App\Models\DokRiksa  $riksa
	 * @return void
	 */
	public function created(DokRiksa $riksa)
	{
		//
	}

	/**
	 * Handle the DokRiksa "updated" event.
	 *
	 * @param  \App\Models\DokRiksa  $riksa
	 * @return void
	 */
	public function updated(DokRiksa $riksa)
	{
		//
	}

	/**
	 * Handle the DokRiksa "deleted" event.
	 *
	 * @param  \App\Models\DokRiksa  $riksa
	 * @return void
	 */
	public function deleted(DokRiksa $riksa)
	{
		// Change status to 300
		$riksa->update(['kode_status' => 300]);
		
		// Delete related model
		if ($riksa->penindakan != null) {
			$riksa->penindakan->delete();
		}

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
	 * Handle the DokRiksa "restored" event.
	 *
	 * @param  \App\Models\DokRiksa  $riksa
	 * @return void
	 */
	public function restored(DokRiksa $riksa)
	{
		//
	}

	/**
	 * Handle the DokRiksa "force deleted" event.
	 *
	 * @param  \App\Models\DokRiksa  $riksa
	 * @return void
	 */
	public function forceDeleted(DokRiksa $riksa)
	{
		//
	}
}
