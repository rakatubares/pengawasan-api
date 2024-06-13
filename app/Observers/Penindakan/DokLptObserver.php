<?php

namespace App\Observers\Penindakan;

use App\Observers\DokObserver;
use Illuminate\Support\Facades\Auth;

class DokLptObserver extends DokObserver
{
	/**
	 * Handle the dokLpt "published" event.
	 *
	 * @param  \App\Models\penindakan\dokLpt  $dokLpt
	 * @return void
	 */
	public function published($dokumen) 
	{
		$this->updatePenomoran($dokumen);
		$dokumen->status_history()
			->create(['kode_status' => 'terbit', 'nip_pegawai' => Auth::user()->nip]);
	}

	/**
	 * Handle the dokLpt "deleted" event.
	 *
	 * @param  \App\Models\penindakan\dokLpt  $dokLpt
	 * @return void
	 */
	public function deleted($dokLpt) {
		$dokLpt->chain->sbp->unFollowedUp('status_lpt');
	}
}
