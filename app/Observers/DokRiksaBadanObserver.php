<?php

namespace App\Observers;

use App\Models\DokRiksaBadan;
use App\Models\ObjectRelation;

class DokRiksaBadanObserver
{
    /**
     * Handle the DokRiksaBadan "created" event.
     *
     * @param  \App\Models\DokRiksaBadan  $dokRiksaBadan
     * @return void
     */
    public function created(DokRiksaBadan $dokRiksaBadan)
    {
        //
    }

    /**
     * Handle the DokRiksaBadan "updated" event.
     *
     * @param  \App\Models\DokRiksaBadan  $dokRiksaBadan
     * @return void
     */
    public function updated(DokRiksaBadan $dokRiksaBadan)
    {
        //
    }

    /**
     * Handle the DokRiksaBadan "deleted" event.
     *
     * @param  \App\Models\DokRiksaBadan  $dokRiksaBadan
     * @return void
     */
    public function deleted(DokRiksaBadan $dokRiksaBadan)
    {
        // Change status to 300
		$dokRiksaBadan->update(['kode_status' => 300]);
		
		// Delete related model
		if ($dokRiksaBadan->sarkut != null) {
			$dokRiksaBadan->sarkut->delete();
		}
		if ($dokRiksaBadan->dokumen != null) {
			$dokRiksaBadan->dokumen->delete();
		}
		if ($dokRiksaBadan->penindakan != null) {
			$dokRiksaBadan->penindakan->delete();
		}

		// Delete any possible relations
		ObjectRelation::where(function($query) use ($dokRiksaBadan) {
			$query->where('object1_type', 'riksabadan')
				->where('object1_id', $dokRiksaBadan->id);
		})->orWhere(function($query) use ($dokRiksaBadan) {
			$query->where('object2_type', 'riksabadan')
				->where('object2_id', $dokRiksaBadan->id);
		})->delete();
    }

    /**
     * Handle the DokRiksaBadan "restored" event.
     *
     * @param  \App\Models\DokRiksaBadan  $dokRiksaBadan
     * @return void
     */
    public function restored(DokRiksaBadan $dokRiksaBadan)
    {
        //
    }

    /**
     * Handle the DokRiksaBadan "force deleted" event.
     *
     * @param  \App\Models\DokRiksaBadan  $dokRiksaBadan
     * @return void
     */
    public function forceDeleted(DokRiksaBadan $dokRiksaBadan)
    {
        //
    }
}
