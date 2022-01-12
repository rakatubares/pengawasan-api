<?php

namespace App\Observers;

use App\Models\ObjectRelation;
use App\Models\Segel;

class SegelObserver
{
    /**
     * Handle the Segel "created" event.
     *
     * @param  \App\Models\Segel  $segel
     * @return void
     */
    public function created(Segel $segel)
    {
        //
    }

    /**
     * Handle the Segel "updated" event.
     *
     * @param  \App\Models\Segel  $segel
     * @return void
     */
    public function updated(Segel $segel)
    {
        //
    }

    /**
     * Handle the Segel "deleted" event.
     *
     * @param  \App\Models\Segel  $segel
     * @return void
     */
    public function deleted(Segel $segel)
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
     * @param  \App\Models\Segel  $segel
     * @return void
     */
    public function restored(Segel $segel)
    {
        //
    }

    /**
     * Handle the Segel "force deleted" event.
     *
     * @param  \App\Models\Segel  $segel
     * @return void
     */
    public function forceDeleted(Segel $segel)
    {
        //
    }
}
