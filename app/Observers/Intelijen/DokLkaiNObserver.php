<?php

namespace App\Observers\Intelijen;

use App\Observers\DokObserver;

class DokLkaiNObserver extends DokObserver
{
	/**
	 * Handle the DokLkai "deleted" event.
	 *
	 * @param  \App\Models\Intelijen\DokLkaiN  $dokLkaiN
	 * @return void
	 */
	public function deleted($dokLkaiN) {
		if ($dokLkaiN->chain->lppin != null) {
			$dokLkaiN->chain->lppin->unFollowedUp();
		}
		parent::deleted($dokLkaiN);
	}
}
