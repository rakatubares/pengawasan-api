<?php

namespace App\Observers;

use App\Models\DokSegel;
use App\Models\ObjectRelation;

class DokSegelObserver
{
    /**
     * Handle the Segel "created" event.
     *
     * @param  \App\Models\DokSegel  $segel
     * @return void
     */
    public function created(DokSegel $segel)
    {
        //
    }

    /**
     * Handle the Segel "updated" event.
     *
     * @param  \App\Models\DokSegel  $segel
     * @return void
     */
    public function updated(DokSegel $segel)
    {
        //
    }

    /**
     * Handle the Segel "deleted" event.
     *
     * @param  \App\Models\DokSegel  $segel
     * @return void
     */
    public function deleted(DokSegel $segel)
    {
        // Change status to 300
		$segel->update(['kode_status' => 300]);
		
		// Delete related model
		if ($segel->penindakan != null) {
			$segel->penindakan->delete();
		}

		// Delete any possible relations
		ObjectRelation::where(function($query) use ($segel) {
			$query->where('object1_type', 'segel')
				->where('object1_id', $segel->id);
		})->orWhere(function($query) use ($segel) {
			$query->where('object2_type', 'segel')
				->where('object2_id', $segel->id);
		})->delete();
    }

    /**
     * Handle the Segel "restored" event.
     *
     * @param  \App\Models\DokSegel  $segel
     * @return void
     */
    public function restored(DokSegel $segel)
    {
        //
    }

    /**
     * Handle the Segel "force deleted" event.
     *
     * @param  \App\Models\DokSegel  $segel
     * @return void
     */
    public function forceDeleted(DokSegel $segel)
    {
        //
    }
}
