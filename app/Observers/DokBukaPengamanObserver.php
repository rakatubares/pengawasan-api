<?php

namespace App\Observers;

use App\Models\DokBukaPengaman;
use App\Models\ObjectRelation;

class DokBukaPengamanObserver
{
    /**
     * Handle the DokBukaPengaman "created" event.
     *
     * @param  \App\Models\DokBukaPengaman  $dokBukaPengaman
     * @return void
     */
    public function created(DokBukaPengaman $dokBukaPengaman)
    {
        //
    }

    /**
     * Handle the DokBukaPengaman "updated" event.
     *
     * @param  \App\Models\DokBukaPengaman  $dokBukaPengaman
     * @return void
     */
    public function updated(DokBukaPengaman $dokBukaPengaman)
    {
        //
    }

    /**
     * Handle the DokBukaPengaman "deleted" event.
     *
     * @param  \App\Models\DokBukaPengaman  $dokBukaPengaman
     * @return void
     */
    public function deleted(DokBukaPengaman $dokBukaPengaman)
    {
        // Change status to 300
		$dokBukaPengaman->update(['kode_status' => 300]);
		
		// Populate list of documents
		$docs_data = $dokBukaPengaman->penindakan->dokumen->toArray();
		$docs = [];
		foreach ($docs_data as $doc) {
			$docs[] = $doc['object2_type'];
		}

		// Delete penindakan if bukapengaman is the only document
		if ($docs == ['bukapengaman']) {
			$dokBukaPengaman->penindakan->delete();
		} else {
			$dokBukaPengaman->penindakan->pengaman->update(['kode_status' => 200]);
		}

		// Delete any possible relations
		ObjectRelation::where(function($query) use ($dokBukaPengaman) {
			$query->where('object1_type', 'bukapengaman')
				->where('object1_id', $dokBukaPengaman->id);
		})->orWhere(function($query) use ($dokBukaPengaman) {
			$query->where('object2_type', 'bukapengaman')
				->where('object2_id', $dokBukaPengaman->id);
		})->delete();
    }

    /**
     * Handle the DokBukaPengaman "restored" event.
     *
     * @param  \App\Models\DokBukaPengaman  $dokBukaPengaman
     * @return void
     */
    public function restored(DokBukaPengaman $dokBukaPengaman)
    {
        //
    }

    /**
     * Handle the DokBukaPengaman "force deleted" event.
     *
     * @param  \App\Models\DokBukaPengaman  $dokBukaPengaman
     * @return void
     */
    public function forceDeleted(DokBukaPengaman $dokBukaPengaman)
    {
        //
    }
}
