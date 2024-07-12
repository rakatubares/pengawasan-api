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
		$kodeLkai = $dokNhi->kodeLkai;
		if ($dokNhi->chain->$kodeLkai != null) {
			$dokNhi->chain->$kodeLkai->unFollowedUp();
		}
		parent::deleted($dokNhi);
	}
}
