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
		$kodeLkai = $dokNi->kodeLkai;
		if ($dokNi->chain->$kodeLkai != null) {
			$dokNi->chain->$kodeLkai->unFollowedUp();
		}
		parent::deleted($dokNi);
	}
}
