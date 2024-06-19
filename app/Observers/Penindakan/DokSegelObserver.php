<?php

namespace App\Observers\Penindakan;

use App\Observers\DokObserver;

class DokSegelObserver extends DokObserver
{
	/**
	 * Handle the DokSegel "publishing" event.
	 *
	 * @param  \App\Models\Penindakan\DokSegel  $dokSegel
	 * @return void
	 */
	public function publishing($dokSbp)
	{
		parent::publishing($dokSbp);
		if ($dokSbp->nomor_segel == null) {
			$dokSbp->nomor_segel = $dokSbp->no_dok_lengkap;
		}
	}
}
