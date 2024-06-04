<?php

namespace App\Observers\Penindakan;

use App\Observers\DokObserver;

class DokBukaSegelObserver extends DokObserver
{
	/**
	 * Handle the DokBukaSegel "deleted" event.
	 *
	 * @param  \App\Models\Penindakan\DokBukaSegel  $dokBukaSegel
	 * @return void
	 */
	public function deleted($dokBukaSegel) {
		// Roll back BA Segel status if related
		if ($dokBukaSegel->chain->segel != null) {
			$dokBukaSegel->chain->segel->unFollowedUp();
		}
		
		parent::deleted($dokBukaSegel);
	}
}
