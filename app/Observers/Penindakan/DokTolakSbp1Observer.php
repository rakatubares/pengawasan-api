<?php

namespace App\Observers\Penindakan;

use App\Observers\DokObserver;
use Illuminate\Support\Facades\Auth;

class DokTolakSbp1Observer extends DokObserver
{
	/**
	 * Handle the DokTolakSbp1 "deleted" event.
	 *
	 * @param  \App\Models\Penindakan\DokTolakSbp1  $dokTolakSbp1
	 * @return void
	 */
	public function deleted($dokTolakSbp1) {
		$dokTolakSbp1->tolakable->unFollowedUp('status_tolak');
		parent::deleted($dokTolakSbp1);
	}

	/**
	 * Handle the DokTolakSbp1 "published" event.
	 *
	 * @param  \App\Models\Penindakan\DokTolakSbp1  $dokTolakSbp1
	 * @return void
	 */
	public function published($dokumen) 
	{
		$this->updatePenomoran($dokumen);
		$dokumen->status_history()
			->create(['kode_status' => 'terbit', 'nip_pegawai' => Auth::user()->nip]);
	}
}
