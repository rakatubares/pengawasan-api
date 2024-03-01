<?php

namespace App\Observers\Intelijen;

use App\Observers\DokObserver;

class DokLkaiObserver extends DokObserver
{
	/**
	 * Handle the DokLkai "deleted" event.
	 *
	 * @param  \App\Models\Intelijen\DokLkai  $dokLkai
	 * @return void
	 */
	public function deleted($dokLkai) {
		if ($dokLkai->chain->lppi != null) {
			$dokLkai->chain->lppi->unFollowedUp();
		}
		parent::deleted($dokLkai);
	}
}
