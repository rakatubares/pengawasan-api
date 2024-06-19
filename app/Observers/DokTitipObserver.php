<?php

namespace App\Observers;

use App\Models\DokTitip;
use App\Models\ObjectRelation;

class DokTitipObserver
{
    /**
     * Handle the DokTitip "created" event.
     *
     * @param  \App\Models\DokTitip  $dokTitip
     * @return void
     */
    public function created(DokTitip $dokTitip)
    {
        //
    }

    /**
     * Handle the DokTitip "updated" event.
     *
     * @param  \App\Models\DokTitip  $dokTitip
     * @return void
     */
    public function updated(DokTitip $dokTitip)
    {
        //
    }

    /**
     * Handle the DokTitip "deleted" event.
     *
     * @param  \App\Models\DokTitip  $dokTitip
     * @return void
     */
    public function deleted(DokTitip $dokTitip)
    {
        // Change status to 300
		$dokTitip->update(['kode_status' => 300]);

		// Populate list of documents
		$dokTitip->segel->update(['kode_status' => 200]);

		// Delete relations
		ObjectRelation::where(function($query) use ($dokTitip) {
			$query->where('object1_type', 'titip')
				->where('object1_id', $dokTitip->id);
		})->orWhere(function($query) use ($dokTitip) {
			$query->where('object2_type', 'titip')
				->where('object2_id', $dokTitip->id);
		})->delete();
    }

    /**
     * Handle the DokTitip "restored" event.
     *
     * @param  \App\Models\DokTitip  $dokTitip
     * @return void
     */
    public function restored(DokTitip $dokTitip)
    {
        //
    }

    /**
     * Handle the DokTitip "force deleted" event.
     *
     * @param  \App\Models\DokTitip  $dokTitip
     * @return void
     */
    public function forceDeleted(DokTitip $dokTitip)
    {
        //
    }
}
