<?php

namespace App\Observers\Penindakan;

use App\Observers\DokObserver;

class DokLphpObserver extends DokObserver
{
	/**
	 * Handle the dokLphp "deleted" event.
	 *
	 * @param  \App\Models\penindakan\dokLphp  $dokLphp
	 * @return void
	 */
	public function deleted($dokLphp) {
		$dokLphp->chain->lptp->unFollowedUp();
	}
}
