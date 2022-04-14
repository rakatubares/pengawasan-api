<?php

namespace App\Observers;

use App\Models\DokLppi;
use App\Models\ObjectRelation;

class DokLppiObserver
{
    /**
     * Handle the DokLppi "created" event.
     *
     * @param  \App\Models\DokLppi  $dokLppi
     * @return void
     */
    public function created(DokLppi $dokLppi)
    {
        //
    }

    /**
     * Handle the DokLppi "updated" event.
     *
     * @param  \App\Models\DokLppi  $dokLppi
     * @return void
     */
    public function updated(DokLppi $dokLppi)
    {
        //
    }

    /**
     * Handle the DokLppi "deleted" event.
     *
     * @param  \App\Models\DokLppi  $dokLppi
     * @return void
     */
    public function deleted(DokLppi $dokLppi)
    {
        // Change status to 300
		$dokLppi->update(['kode_status' => 300]);
		
		// Delete related model
		if ($dokLppi->intelijen != null) {
			$dokLppi->intelijen->delete();
		}

		// Delete any possible relations
		ObjectRelation::where(function($query) use ($dokLppi) {
			$query->where('object1_type', 'lppi')
				->where('object1_id', $dokLppi->id);
		})->orWhere(function($query) use ($dokLppi) {
			$query->where('object2_type', 'lppi')
				->where('object2_id', $dokLppi->id);
		})->delete();
    }

    /**
     * Handle the DokLppi "restored" event.
     *
     * @param  \App\Models\DokLppi  $dokLppi
     * @return void
     */
    public function restored(DokLppi $dokLppi)
    {
        //
    }

    /**
     * Handle the DokLppi "force deleted" event.
     *
     * @param  \App\Models\DokLppi  $dokLppi
     * @return void
     */
    public function forceDeleted(DokLppi $dokLppi)
    {
        //
    }
}
