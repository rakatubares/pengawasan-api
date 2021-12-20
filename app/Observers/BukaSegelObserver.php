<?php

namespace App\Observers;

use App\Models\BukaSegel;
use App\Models\ObjectRelation;

class BukaSegelObserver
{
    /**
     * Handle the BukaSegel "created" event.
     *
     * @param  \App\Models\BukaSegel  $bukaSegel
     * @return void
     */
    public function created(BukaSegel $bukaSegel)
    {
        //
    }

    /**
     * Handle the BukaSegel "updated" event.
     *
     * @param  \App\Models\BukaSegel  $bukaSegel
     * @return void
     */
    public function updated(BukaSegel $bukaSegel)
    {
        //
    }

    /**
     * Handle the BukaSegel "deleted" event.
     *
     * @param  \App\Models\BukaSegel  $bukaSegel
     * @return void
     */
    public function deleted(BukaSegel $bukaSegel)
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
     * Handle the BukaSegel "restored" event.
     *
     * @param  \App\Models\BukaSegel  $bukaSegel
     * @return void
     */
    public function restored(BukaSegel $bukaSegel)
    {
        //
    }

    /**
     * Handle the BukaSegel "force deleted" event.
     *
     * @param  \App\Models\BukaSegel  $bukaSegel
     * @return void
     */
    public function forceDeleted(BukaSegel $bukaSegel)
    {
        //
    }
}
