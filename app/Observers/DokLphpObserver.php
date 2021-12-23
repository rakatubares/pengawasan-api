<?php

namespace App\Observers;

use App\Models\DokLphp;
use App\Models\ObjectRelation;

class DokLphpObserver
{
    /**
     * Handle the DokLphp "created" event.
     *
     * @param  \App\Models\DokLphp  $dokLphp
     * @return void
     */
    public function created(DokLphp $dokLphp)
    {
        //
    }

    /**
     * Handle the DokLphp "updated" event.
     *
     * @param  \App\Models\DokLphp  $dokLphp
     * @return void
     */
    public function updated(DokLphp $dokLphp)
    {
        //
    }

    /**
     * Handle the DokLphp "deleted" event.
     *
     * @param  \App\Models\DokLphp  $dokLphp
     * @return void
     */
    public function deleted(DokLphp $dokLphp)
    {
        // Change status to 300
		$dokLphp->update(['kode_status' => 300]);

		// Change SBP status
		$sbp = $dokLphp->lptp->sbp;
		$sbp->update(['kode_status' => 200]);

		// Delete any possible relations
		ObjectRelation::where(function($query) use ($dokLphp) {
			$query->where('object1_type', 'lphp')
				->where('object1_id', $dokLphp->id);
		})->orWhere(function($query) use ($dokLphp) {
			$query->where('object2_type', 'lphp')
				->where('object2_id', $dokLphp->id);
		})->delete();
    }

    /**
     * Handle the DokLphp "restored" event.
     *
     * @param  \App\Models\DokLphp  $dokLphp
     * @return void
     */
    public function restored(DokLphp $dokLphp)
    {
        //
    }

    /**
     * Handle the DokLphp "force deleted" event.
     *
     * @param  \App\Models\DokLphp  $dokLphp
     * @return void
     */
    public function forceDeleted(DokLphp $dokLphp)
    {
        //
    }
}
