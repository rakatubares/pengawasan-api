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
		$kode_lppi = $dokLkai->kode_lppi;
		if ($dokLkai->chain->$kode_lppi != null) {
			$dokLkai->chain->$kode_lppi->unFollowedUp();
		}
		parent::deleted($dokLkai);
	}
}
