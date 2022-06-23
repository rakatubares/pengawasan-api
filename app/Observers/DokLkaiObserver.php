<?php

namespace App\Observers;

use App\Models\DokLkai;
use App\Models\ObjectRelation;
use App\Traits\SwitcherTrait;

class DokLkaiObserver
{
	use SwitcherTrait;

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
		// Get LKAI type
		switch (get_class($dokLkai)) {
			case $this->switchObject('lkai', 'model'):
				$lkai_type = 'lkai';
				$lppi_type = 'lppi';
				break;

			case $this->switchObject('lkain', 'model'):
				$lkai_type = 'lkain';
				$lppi_type = 'lppin';
				break;
			
			default:
				$lkai_type = null;
				$lppi_type = null;
				break;
		}

		// Change status to 300
		$dokLkai->update(['kode_status' => 300]);
		
		// Populate list of documents
		$docs_data = $dokLkai->intelijen->dokumen->toArray();
		$docs = [];
		foreach ($docs_data as $doc) {
			$docs[] = $doc['object2_type'];
		}

		// Delete intelijen if lkai is the only document
		if ($docs == [$lkai_type]) {
			$dokLkai->intelijen->delete();
		} else {
			$dokLkai->intelijen->$lppi_type->update(['kode_status' => 200]);
		}

		// Delete any possible relations
		ObjectRelation::where(function($query) use ($dokLkai, $lkai_type) {
			$query->where('object1_type', $lkai_type)
				->where('object1_id', $dokLkai->id);
		})->orWhere(function($query) use ($dokLkai, $lkai_type) {
			$query->where('object2_type', $lkai_type)
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
