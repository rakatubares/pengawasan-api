<?php

namespace App\Observers\Intelijen;

use App\Observers\DokObserver;

class DokNiObserver extends DokObserver
{
	/**
	 * Handle the DokNi "deleted" event.
	 *
	 * @param  \App\Models\Intelijen\DokNi  $dokNhi
	 * @return void
	 */
	public function deleted($dokNi) {
		$kode_lkai = $dokNi->kode_lkai;
		if ($dokNi->chain->$kode_lkai != null) {
			$dokNi->chain->$kode_lkai->unFollowedUp();
		}
		parent::deleted($dokNi);
	}
}
