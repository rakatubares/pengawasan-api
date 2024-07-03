<?php

namespace App\Observers\Penyidikan;

use App\Observers\DokObserver;

class DokSplitObserver extends DokObserver
{
	/**
	 * Handle the DokSplit "deleted" event.
	 *
	 * @param  \App\Models\Penyidikan\DokSplit  $dokSplit
	 * @return void
	 */
	public function deleted($dokSplit) {
		$dokSplit->chain->lpf->unFollowedUp();
		parent::deleted($dokSplit);
	}
}
