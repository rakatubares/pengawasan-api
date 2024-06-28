<?php

namespace App\Observers\Penyidikan;

use App\Observers\DokObserver;

class DokLpfObserver extends DokObserver
{
	/**
	 * Handle the DokLpf "deleted" event.
	 *
	 * @param  \App\Models\Penyidikan\DokLpf  $dokLpf
	 * @return void
	 */
	public function deleted($dokLpf) {
		$dokLpf->chain->lpp->unFollowedUp();
		parent::deleted($dokLpf);
	}
}
