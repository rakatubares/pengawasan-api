<?php

namespace App\Observers\Intelijen;

use App\Observers\DokObserver;

class DokNhiObserver extends DokObserver
{
	/**
	 * Handle the DokLkai "deleted" event.
	 *
	 * @param  \App\Models\Intelijen\DokNhi  $dokNhi
	 * @return void
	 */
	public function deleted($dokNhi) {
		if ($dokNhi->chain->lkai != null) {
			$dokNhi->chain->lkai->unFollowedUp();
		}
		parent::deleted($dokNhi);
	}
}
