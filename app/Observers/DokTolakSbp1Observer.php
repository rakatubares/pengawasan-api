<?php

namespace App\Observers;

use App\Models\DokTolakSbp1;
use App\Models\ObjectRelation;

class DokTolakSbp1Observer
{
    /**
     * Handle the DokTolakSbp1 "created" event.
     *
     * @param  \App\Models\DokTolakSbp1  $dokTolakSbp1
     * @return void
     */
    public function created(DokTolakSbp1 $dokTolakSbp1)
    {
        //
    }

    /**
     * Handle the DokTolakSbp1 "updated" event.
     *
     * @param  \App\Models\DokTolakSbp1  $dokTolakSbp1
     * @return void
     */
    public function updated(DokTolakSbp1 $dokTolakSbp1)
    {
        //
    }

    /**
     * Handle the DokTolakSbp1 "deleted" event.
     *
     * @param  \App\Models\DokTolakSbp1  $dokTolakSbp1
     * @return void
     */
    public function deleted(DokTolakSbp1 $dokTolakSbp1)
    {
        // Change status to 300
		$dokTolakSbp1->update(['kode_status' => 300]);

		// Change SBP status
		$sbp = $dokTolakSbp1->sbp;
		$sbp->update(['status_tolak' => null]);

		// Delete any possible relations
		ObjectRelation::where(function($query) use ($dokTolakSbp1) {
			$query->where('object1_type', 'tolak1')
				->where('object1_id', $dokTolakSbp1->id);
		})->orWhere(function($query) use ($dokTolakSbp1) {
			$query->where('object2_type', 'tolak1')
				->where('object2_id', $dokTolakSbp1->id);
		})->delete();
    }

    /**
     * Handle the DokTolakSbp1 "restored" event.
     *
     * @param  \App\Models\DokTolakSbp1  $dokTolakSbp1
     * @return void
     */
    public function restored(DokTolakSbp1 $dokTolakSbp1)
    {
        //
    }

    /**
     * Handle the DokTolakSbp1 "force deleted" event.
     *
     * @param  \App\Models\DokTolakSbp1  $dokTolakSbp1
     * @return void
     */
    public function forceDeleted(DokTolakSbp1 $dokTolakSbp1)
    {
        //
    }
}
