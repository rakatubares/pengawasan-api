<?php

namespace App\Observers\Penindakan;

use App\Observers\DokObserver;

class DokBukaPengamanObserver extends DokObserver
{
	/**
	 * Handle the DokBukaPengaman "deleted" event.
	 *
	 * @param  \App\Models\Penindakan\DokBukaPengaman  $dokBukaPengaman
	 * @return void
	 */
	public function deleted($dokBukaPengaman) {
		// Roll back BA Pengaman status if related
		if ($dokBukaPengaman->chain->pengaman != null) {
			$dokBukaPengaman->chain->pengaman->unFollowedUp('status_buka');
		}
		
		parent::deleted($dokBukaPengaman);
	}
}
