<?php

namespace App\Observers\Intelijen;

use App\Observers\DokObserver;

class DokNhiNObserver extends DokObserver
{
	/**
	 * Handle the DokLkai "deleted" event.
	 *
	 * @param  \App\Models\Intelijen\DokNhiN  $dokNhiN
	 * @return void
	 */
	public function deleted($dokNhiN) {
		if ($dokNhiN->chain->lkain != null) {
			$dokNhiN->chain->lkain->unFollowedUp();
		}
		parent::deleted($dokNhiN);
	}
}
