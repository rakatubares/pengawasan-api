<?php

namespace App\Observers;

use App\Models\DokBukaSegel;
use App\Models\ObjectRelation;

class DokBukaSegelObserver
{
    /**
     * Handle the DokBukaSegel "created" event.
     *
     * @param  \App\Models\DokBukaSegel  $bukaSegel
     * @return void
     */
    public function created(DokBukaSegel $bukaSegel)
    {
        //
    }

    /**
     * Handle the DokBukaSegel "updated" event.
     *
     * @param  \App\Models\DokBukaSegel  $bukaSegel
     * @return void
     */
    public function updated(DokBukaSegel $bukaSegel)
    {
        //
    }

    /**
     * Handle the DokBukaSegel "deleted" event.
     *
     * @param  \App\Models\DokBukaSegel  $bukaSegel
     * @return void
     */
    public function deleted(DokBukaSegel $bukaSegel)
    {
        // Change status to 300
		$bukaSegel->update(['kode_status' => 300]);
		
		// Populate list of documents
		$docs_data = $bukaSegel->penindakan->dokumen->toArray();
		$docs = [];
		foreach ($docs_data as $doc) {
			$docs[] = $doc['object2_type'];
		}

		// Delete penindakan if bukasegel is the only document
		if ($docs == ['bukasegel']) {
			$bukaSegel->penindakan->delete();
		} else {
			$bukaSegel->penindakan->segel->update(['kode_status' => 200]);
		}

		// Delete any possible relations
		ObjectRelation::where(function($query) use ($bukaSegel) {
			$query->where('object1_type', 'bukasegel')
				->where('object1_id', $bukaSegel->id);
		})->orWhere(function($query) use ($bukaSegel) {
			$query->where('object2_type', 'bukasegel')
				->where('object2_id', $bukaSegel->id);
		})->delete();
    }

    /**
     * Handle the DokBukaSegel "restored" event.
     *
     * @param  \App\Models\DokBukaSegel  $bukaSegel
     * @return void
     */
    public function restored(DokBukaSegel $bukaSegel)
    {
        //
    }

    /**
     * Handle the DokBukaSegel "force deleted" event.
     *
     * @param  \App\Models\DokBukaSegel  $bukaSegel
     * @return void
     */
    public function forceDeleted(DokBukaSegel $bukaSegel)
    {
        //
    }
}
