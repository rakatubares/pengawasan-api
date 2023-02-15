<?php

namespace App\Observers;

use App\Models\DokLpf;
use App\Models\ObjectRelation;

class DokLpfObserver
{
	/**
	 * Handle the DokLpf "created" event.
	 *
	 * @param  \App\Models\DokLpf  $dokLpf
	 * @return void
	 */
	public function created(DokLpf $dokLpf)
	{
		//
	}

	/**
	 * Handle the DokLpf "updated" event.
	 *
	 * @param  \App\Models\DokLpf  $dokLpf
	 * @return void
	 */
	public function updated(DokLpf $dokLpf)
	{
		//
	}

	/**
	 * Handle the DokLpf "deleted" event.
	 *
	 * @param  \App\Models\DokLpf  $dokLpf
	 * @return void
	 */
	public function deleted(DokLpf $dokLpf)
	{
		// Get Related LPP
		$lpp = $dokLpf->lpp;

		// Change LPP status to 200
		$lpp->update(['kode_status' => 200]);

		// Detach LPP
		ObjectRelation::where('object1_type', 'lpp')
			->where('object1_id', $lpp->id)
			->where('object2_type', 'lpf')
			->where('object2_id', $dokLpf->id)
			->delete();

		// Change status to 300
		$dokLpf->update(['kode_status' => 300]);

		// Delete any possible relations
		ObjectRelation::where(function($query) use ($dokLpf) {
			$query->where('object1_type', 'lpf')
				->where('object1_id', $dokLpf->id);
		})->orWhere(function($query) use ($dokLpf) {
			$query->where('object2_type', 'lpf')
				->where('object2_id', $dokLpf->id);
		})->delete();
	}

	/**
	 * Handle the DokLpf "restored" event.
	 *
	 * @param  \App\Models\DokLpf  $dokLpf
	 * @return void
	 */
	public function restored(DokLpf $dokLpf)
	{
		//
	}

	/**
	 * Handle the DokLpf "force deleted" event.
	 *
	 * @param  \App\Models\DokLpf  $dokLpf
	 * @return void
	 */
	public function forceDeleted(DokLpf $dokLpf)
	{
		//
	}
}
