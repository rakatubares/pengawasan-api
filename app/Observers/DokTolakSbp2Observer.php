<?php

namespace App\Observers;

use App\Models\DokTolakSbp2;
use App\Models\ObjectRelation;

class DokTolakSbp2Observer
{
	/**
	 * Handle the DokTolakSbp2 "created" event.
	 *
	 * @param  \App\Models\DokTolakSbp2  $dokTolakSbp2
	 * @return void
	 */
	public function created(DokTolakSbp2 $dokTolakSbp2)
	{
		//
	}

	/**
	 * Handle the DokTolakSbp2 "updated" event.
	 *
	 * @param  \App\Models\DokTolakSbp2  $dokTolakSbp2
	 * @return void
	 */
	public function updated(DokTolakSbp2 $dokTolakSbp2)
	{
		//
	}

	/**
	 * Handle the DokTolakSbp2 "deleted" event.
	 *
	 * @param  \App\Models\DokTolakSbp2  $dokTolakSbp2
	 * @return void
	 */
	public function deleted(DokTolakSbp2 $dokTolakSbp2)
	{
		// Change status to 300
		$dokTolakSbp2->update(['kode_status' => 300]);

		// Change BA Penolakan SBP status
		$tolak1 = $dokTolakSbp2->tolak1;
		$tolak1->update(['status_tolak' => null]);

		// Delete any possible relations
		ObjectRelation::where(function($query) use ($dokTolakSbp2) {
			$query->where('object1_type', 'tolak2')
				->where('object1_id', $dokTolakSbp2->id);
		})->orWhere(function($query) use ($dokTolakSbp2) {
			$query->where('object2_type', 'tolak2')
				->where('object2_id', $dokTolakSbp2->id);
		})->delete();
	}

	/**
	 * Handle the DokTolakSbp2 "restored" event.
	 *
	 * @param  \App\Models\DokTolakSbp2  $dokTolakSbp2
	 * @return void
	 */
	public function restored(DokTolakSbp2 $dokTolakSbp2)
	{
		//
	}

	/**
	 * Handle the DokTolakSbp2 "force deleted" event.
	 *
	 * @param  \App\Models\DokTolakSbp2  $dokTolakSbp2
	 * @return void
	 */
	public function forceDeleted(DokTolakSbp2 $dokTolakSbp2)
	{
		//
	}
}
