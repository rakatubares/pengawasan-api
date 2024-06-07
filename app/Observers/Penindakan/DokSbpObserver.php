<?php

namespace App\Observers\Penindakan;

use App\Observers\DokObserver;

class DokSbpObserver extends DokObserver
{
	/**
	 * Handle the DokSbp "booked" event.
	 *
	 * @param  \App\Models\Penindakan\DokSbp  $dokSbp
	 * @return void
	 */
	public function booked($dokSbp) 
	{
		parent::booked($dokSbp);
		$kode_lptp = $dokSbp->kode_lptp;
		$dokSbp->chain->$kode_lptp->book();
	}

	/**
	 * Handle the DokSbp "publishing" event.
	 *
	 * @param  \App\Models\Penindakan\DokSbp  $dokSbp
	 * @return void
	 */
	public function publishing($dokSbp)
	{
		parent::publishing($dokSbp);

		$chain = $dokSbp->chain;

		$riksa_badan = $chain->riksa_badan;
		if ($riksa_badan) {
			$is_unpublished = $this->checkUnpublished($riksa_badan);
			if ($is_unpublished) {
				$riksa_badan->publish();
			}
		}

		$riksa = $chain->riksa;
		if ($riksa) {
			$is_unpublished = $this->checkUnpublished($riksa);
			if ($is_unpublished) {
				$riksa->publish();
			}
		}

		$tegah = $chain->tegah;
		if ($tegah) {
			$is_unpublished = $this->checkUnpublished($tegah);
			if ($is_unpublished) {
				$tegah->publish();
			}
		}

		$segel = $chain->segel;
		if ($segel) {
			$is_unpublished = $this->checkUnpublished($segel);
			if ($is_unpublished) {
				$segel->publish();
			}
		}
	}
	
	/**
	 * Handle the DokSbp "published" event.
	 *
	 * @param  \App\Models\Penindakan\DokSbp  $dokSbp
	 * @return void
	 */
	public function published($dokSbp) {
		parent::published($dokSbp);
		$kode_lptp = $dokSbp->kode_lptp;
		$dokSbp->chain->$kode_lptp->publish();
		$dokSbp->update(['kode_status' => 'tindak-lanjut']);
	}

	/**
	 * Handle the DokSbp "deleting" event.
	 *
	 * @param  \App\Models\Penindakan\DokSbp  $dokSbp
	 * @return void
	 */
	public function deleting($dokSbp) {
		$chain = $dokSbp->chain;

		$riksa_badan = $chain->riksa_badan;
		if ($riksa_badan) {
			$is_unpublished = $this->checkUnpublished($riksa_badan);
			if ($is_unpublished) {
				$riksa_badan->delete();
			}
		}

		$riksa = $chain->riksa;
		if ($riksa) {
			$is_unpublished = $this->checkUnpublished($riksa);
			if ($is_unpublished) {
				$riksa->delete();
			}
		}

		$tegah = $chain->tegah;
		if ($tegah) {
			$is_unpublished = $this->checkUnpublished($tegah);
			if ($is_unpublished) {
				$tegah->delete();
			}
		}

		$segel = $chain->segel;
		if ($segel) {
			$is_unpublished = $this->checkUnpublished($segel);
			if ($is_unpublished) {
				$segel->delete();
			}
		}
	}

	/**
	 * Handle the DokSbp "deleted" event.
	 *
	 * @param  \App\Models\Penindakan\DokSbp  $dokSbp
	 * @return void
	 */
	public function deleted($dokSbp) {
		$chain = $dokSbp->chain;

		// Get related documents' code
		$kode_nhi = $dokSbp->kode_nhi;
		$kode_lap = $dokSbp->kode_lap;
		$kode_lptp = $dokSbp->kode_lptp;

		// Detach from source
		if ($chain->$kode_nhi) { $chain->$kode_nhi->unFollowedUp('status_sbp'); }
		if ($chain->$kode_lap) { $chain->$kode_lap->unFollowedUp(); }

		// Delete related LPTP
		$dokSbp->chain->$kode_lptp->delete();
		
		parent::deleted($dokSbp);
	}
}
