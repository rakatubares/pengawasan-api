<?php

namespace App\Observers;

use App\Models\DokSbpN;
use App\Models\ObjectRelation;

class DokSbpNObserver
{
    /**
     * Handle the DokSbpN "created" event.
     *
     * @param  \App\Models\DokSbpN  $dokSbpN
     * @return void
     */
    public function created(DokSbpN $dokSbpN)
    {
        //
    }

    /**
     * Handle the DokSbpN "updated" event.
     *
     * @param  \App\Models\DokSbpN  $dokSbpN
     * @return void
     */
    public function updated(DokSbpN $dokSbpN)
    {
        //
    }

    /**
     * Handle the DokSbpN "deleted" event.
     *
     * @param  \App\Models\DokSbpN  $dokSbpN
     * @return void
     */
    public function deleted(DokSbpN $dokSbpN)
    {
        // Change status to 300
		$dokSbpN->update(['kode_status' => 300]);

		// Delete related model
		$dokSbpN->lptp->delete();
		if ($dokSbpN->penindakan != null) {
			$dokSbpN->penindakan->delete();
		}

		// Delete any possible relations
		ObjectRelation::where(function($query) use ($dokSbpN) {
			$query->where('object1_type', 'sbp')
				->where('object1_id', $dokSbpN->id);
		})->orWhere(function($query) use ($dokSbpN) {
			$query->where('object2_type', 'sbp')
				->where('object2_id', $dokSbpN->id);
		})->delete();
    }

    /**
     * Handle the DokSbpN "restored" event.
     *
     * @param  \App\Models\DokSbpN  $dokSbpN
     * @return void
     */
    public function restored(DokSbpN $dokSbpN)
    {
        //
    }

    /**
     * Handle the DokSbpN "force deleted" event.
     *
     * @param  \App\Models\DokSbpN  $dokSbpN
     * @return void
     */
    public function forceDeleted(DokSbpN $dokSbpN)
    {
        //
    }
}
