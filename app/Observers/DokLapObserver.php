<?php

namespace App\Observers;

use App\Models\DokLap;
use App\Models\DokLapN;
use App\Models\ObjectRelation;
use App\Traits\SwitcherTrait;

class DokLapObserver
{
	use SwitcherTrait;

	/**
	 * Handle the DokLap "deleted" event.
	 *
	 * @param  \App\Models\DokLap  $dokLap
	 * @return void
	 */
	public function deleted(DokLap|DokLapN $dokLap)
	{
		// Get LP type
		switch (get_class($dokLap)) {
			case $this->switchObject('lap', 'model'):
				$lap_type = 'lap';
				break;

			case $this->switchObject('lapn', 'model'):
				$lap_type = 'lapn';
				break;
			
			default:
				$lap_type = null;
				break;
		}

		// Change status to 300
		$dokLap->update(['kode_status' => 300]);

		if ($dokLap->li != null) {
			$dokLap->li->update(['kode_status' => 200]);
		}

		if ($dokLap->nhi != null) {
			$dokLap->nhi->update(['kode_status' => 200]);
		}

		if ($dokLap->nhin != null) {
			$dokLap->nhin->update(['kode_status' => 200]);
		}

		// Delete any possible relations
		ObjectRelation::where(function($query) use ($dokLap, $lap_type) {
			$query->where('object1_type', $lap_type)
				->where('object1_id', $dokLap->id);
		})->orWhere(function($query) use ($dokLap, $lap_type) {
			$query->where('object2_type', $lap_type)
				->where('object2_id', $dokLap->id);
		})->delete();
	}
}
