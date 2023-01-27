<?php

namespace App\Observers;

use App\Models\DokLpp;
use App\Models\ObjectRelation;

class DokLppObserver
{
	/**
	 * Handle the DokLpp "created" event.
	 *
	 * @param  \App\Models\DokLpp  $dokLpp
	 * @return void
	 */
	public function created(DokLpp $dokLpp)
	{
		//
	}

	/**
	 * Handle the DokLpp "updated" event.
	 *
	 * @param  \App\Models\DokLpp  $dokLpp
	 * @return void
	 */
	public function updated(DokLpp $dokLpp)
	{
		//
	}

	/**
	 * Handle the DokLpp "deleted" event.
	 *
	 * @param  \App\Models\DokLpp  $dokLpp
	 * @return void
	 */
	public function deleted(DokLpp $dokLpp)
	{
		// Get related objects
		$penyidikan = $dokLpp->penyidikan;
		$penindakan = $penyidikan->penindakan;
		$lp = $penindakan->sbp->lptp->lphp->lp;

		// Change LP status to 200
		$lp->update(['kode_status' => 200]);

		// Detach penindakan
		ObjectRelation::where('object1_type', 'penindakan')
			->where('object1_id', $penindakan->id)
			->where('object2_type', 'penyidikan')
			->where('object2_id', $penyidikan->id)
			->delete();

		// Change status to 300
		$dokLpp->update(['kode_status' => 300]);

		// Delete penyidikan model
		$dokLpp->penyidikan->delete();

		// Delete any possible relations
		ObjectRelation::where(function($query) use ($dokLpp) {
			$query->where('object1_type', 'lpp')
				->where('object1_id', $dokLpp->id);
		})->orWhere(function($query) use ($dokLpp) {
			$query->where('object2_type', 'lpp')
				->where('object2_id', $dokLpp->id);
		})->delete();
	}

	/**
	 * Handle the DokLpp "restored" event.
	 *
	 * @param  \App\Models\DokLpp  $dokLpp
	 * @return void
	 */
	public function restored(DokLpp $dokLpp)
	{
		//
	}

	/**
	 * Handle the DokLpp "force deleted" event.
	 *
	 * @param  \App\Models\DokLpp  $dokLpp
	 * @return void
	 */
	public function forceDeleted(DokLpp $dokLpp)
	{
		//
	}
}
