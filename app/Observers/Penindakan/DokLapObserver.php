<?php

namespace App\Observers\Penindakan;

use App\Observers\DokObserver;

class DokLapObserver extends DokObserver
{
	/**
	 * Handle the DokLap "deleted" event.
	 *
	 * @param  \App\Models\Intelijen\DokLap  $dokLap
	 * @return void
	 */
	public function deleted($dokLap) {
		// Roll back NHI status if related
		$kode_nhi = $dokLap->kode_nhi;
		if ($dokLap->chain->$kode_nhi != null) {
			$dokLap->chain->$kode_nhi->unFollowedUp();
		}

		// Roll back LI-1 status if related
		if ($dokLap->chain->li != null) {
			$dokLap->chain->li->unFollowedUp();
		}
		
		parent::deleted($dokLap);
	}
}
