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
		if ($dokNi->chain->lkai != null) {
			$dokNi->chain->lkai->unFollowedUp();
		}
		parent::deleted($dokNi);
	}
}
