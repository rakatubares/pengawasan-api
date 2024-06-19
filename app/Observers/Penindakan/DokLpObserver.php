<?php

namespace App\Observers\Penindakan;

use App\Observers\DokObserver;

class DokLpObserver extends DokObserver
{
	/**
	 * Handle the dokLp "deleted" event.
	 *
	 * @param  \App\Models\penindakan\dokLp  $dokLp
	 * @return void
	 */
	public function deleted($dokLp) {
		$kode_lphp = $dokLp->kode_lphp;
		$dokLp->chain->$kode_lphp->unFollowedUp();
	}
}
