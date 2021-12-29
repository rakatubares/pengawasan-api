<?php

namespace App\Observers;

use App\Models\DokPengaman;
use App\Models\ObjectRelation;

class DokPengamanObserver
{
    /**
     * Handle the DokPengaman "created" event.
     *
     * @param  \App\Models\DokPengaman  $dokPengaman
     * @return void
     */
    public function created(DokPengaman $dokPengaman)
    {
        //
    }

    /**
     * Handle the DokPengaman "updated" event.
     *
     * @param  \App\Models\DokPengaman  $dokPengaman
     * @return void
     */
    public function updated(DokPengaman $dokPengaman)
    {
        //
    }

    /**
     * Handle the DokPengaman "deleted" event.
     *
     * @param  \App\Models\DokPengaman  $dokPengaman
     * @return void
     */
    public function deleted(DokPengaman $dokPengaman)
    {
        // Change status to 300
		$dokPengaman->update(['kode_status' => 300]);
		
		// Delete related model
		if ($dokPengaman->penindakan != null) {
			$dokPengaman->penindakan->delete();
		}

		// Delete any possible relations
		ObjectRelation::where(function($query) use ($dokPengaman) {
			$query->where('object1_type', 'pengaman')
				->where('object1_id', $dokPengaman->id);
		})->orWhere(function($query) use ($dokPengaman) {
			$query->where('object2_type', 'pengaman')
				->where('object2_id', $dokPengaman->id);
		})->delete();
    }

    /**
     * Handle the DokPengaman "restored" event.
     *
     * @param  \App\Models\DokPengaman  $dokPengaman
     * @return void
     */
    public function restored(DokPengaman $dokPengaman)
    {
        //
    }

    /**
     * Handle the DokPengaman "force deleted" event.
     *
     * @param  \App\Models\DokPengaman  $dokPengaman
     * @return void
     */
    public function forceDeleted(DokPengaman $dokPengaman)
    {
        //
    }
}
