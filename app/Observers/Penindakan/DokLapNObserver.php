<?php

namespace App\Observers\Penindakan;

use App\Observers\DokObserver;

class DokLapNObserver extends DokObserver
{
	/**
	 * Handle the DokLapN "deleted" event.
	 *
	 * @param  \App\Models\Intelijen\DokLapN  $dokLapN
	 * @return void
	 */
	public function deleted($dokLapN) {
		// Roll back NHI status if related
		if ($dokLapN->chain->nhin != null) {
			$dokLapN->chain->nhin->unFollowedUp();
		}
		
		parent::deleted($dokLapN);
	}
}
