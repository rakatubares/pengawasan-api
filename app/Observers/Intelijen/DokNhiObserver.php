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
		$kode_lkai = $dokNhi->kode_lkai;
		if ($dokNhi->chain->$kode_lkai != null) {
			$dokNhi->chain->$kode_lkai->unFollowedUp();
		}
		parent::deleted($dokNhi);
	}
}
