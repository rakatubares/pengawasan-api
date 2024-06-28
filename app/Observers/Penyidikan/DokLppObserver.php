<?php

namespace App\Observers\Penyidikan;

use App\Observers\DokObserver;

class DokLppObserver extends DokObserver
{
	/**
	 * Handle the DokLpp "deleted" event.
	 *
	 * @param  \App\Models\Penyidikan\DokLpp  $dokLpp
	 * @return void
	 */
	public function deleted($dokLpp) {
		if ($dokLpp->chain->lp) { $dokLpp->chain->lp->unFollowedUp(); }
		if ($dokLpp->chain->lpn) { $dokLpp->chain->lpn->unFollowedUp(); }
		$dokLpp->chain->penyidikan->delete();
		parent::deleted($dokLpp);
	}
}
