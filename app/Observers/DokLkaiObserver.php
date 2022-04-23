<?php

namespace App\Observers;

use App\Models\DokLkai;
use App\Models\ObjectRelation;

class DokLkaiObserver
{
	/**
	 * Handle the DokLkai "created" event.
	 *
	 * @param  \App\Models\DokLkai  $dokLkai
	 * @return void
	 */
	public function created(DokLkai $dokLkai)
	{
		//
	}

	/**
	 * Handle the DokLkai "updated" event.
	 *
	 * @param  \App\Models\DokLkai  $dokLkai
	 * @return void
	 */
	public function updated(DokLkai $dokLkai)
	{
		//
	}

	/**
	 * Handle the DokLkai "deleted" event.
	 *
	 * @param  \App\Models\DokLkai  $dokLkai
	 * @return void
	 */
	public function deleted(DokLkai $dokLkai)
	{
		// Change status to 300
		$dokLkai->update(['kode_status' => 300]);
		
		// Populate list of documents
		$docs_data = $dokLkai->intelijen->dokumen->toArray();
		$docs = [];
		foreach ($docs_data as $doc) {
			$docs[] = $doc['object2_type'];
		}

		// Delete intelijen if lkai is the only document
		if ($docs == ['lkai']) {
			$dokLkai->intelijen->delete();
		} else {
			$dokLkai->intelijen->lppi->update(['kode_status' => 200]);
		}

		// Delete any possible relations
		ObjectRelation::where(function($query) use ($dokLkai) {
			$query->where('object1_type', 'lkai')
				->where('object1_id', $dokLkai->id);
		})->orWhere(function($query) use ($dokLkai) {
			$query->where('object2_type', 'lkai')
				->where('object2_id', $dokLkai->id);
		})->delete();
	}

	/**
	 * Handle the DokLkai "restored" event.
	 *
	 * @param  \App\Models\DokLkai  $dokLkai
	 * @return void
	 */
	public function restored(DokLkai $dokLkai)
	{
		//
	}

	/**
	 * Handle the DokLkai "force deleted" event.
	 *
	 * @param  \App\Models\DokLkai  $dokLkai
	 * @return void
	 */
	public function forceDeleted(DokLkai $dokLkai)
	{
		//
	}
}
