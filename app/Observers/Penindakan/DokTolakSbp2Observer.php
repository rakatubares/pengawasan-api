<?php

namespace App\Observers\Penindakan;

use App\Observers\DokObserver;
use Illuminate\Support\Facades\Auth;

class DokTolakSbp2Observer extends DokObserver
{
	/**
	 * Handle the DokTolakSbp2 "deleted" event.
	 *
	 * @param  \App\Models\Penindakan\DokTolakSbp2  $dokTolakSbp2
	 * @return void
	 */
	public function deleted($dokTolakSbp2) {
		$dokTolakSbp2->tolak1->unFollowedUp('status_tolak');
		parent::deleted($dokTolakSbp2);
	}

	/**
	 * Handle the DokTolakSbp2 "published" event.
	 *
	 * @param  \App\Models\Penindakan\DokTolakSbp2  $dokTolakSbp2
	 * @return void
	 */
	public function published($dokumen)
	{
		$this->updatePenomoran($dokumen);
		$dokumen->status_history()
			->create(['kode_status' => 'terbit', 'nip_pegawai' => Auth::user()->nip]);
	}
}
