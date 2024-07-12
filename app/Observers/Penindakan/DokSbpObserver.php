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
		$kodeLptp = $dokSbp->kodeLptp;
		$dokSbp->chain->$kodeLptp->book();
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
		$kodeLptp = $dokSbp->kodeLptp;
		$dokSbp->chain->$kodeLptp->publish();
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
		$kodeNhi = $dokSbp->kodeNhi;
		$kodeLap = $dokSbp->kodeLap;
		$kodeLptp = $dokSbp->kodeLptp;

		// Detach from source
		if ($chain->$kodeNhi) { $chain->$kodeNhi->unFollowedUp('status_sbp'); }
		if ($chain->$kodeLap) { $chain->$kodeLap->unFollowedUp(); }

		// Delete related LPTP
		$dokSbp->chain->$kodeLptp->delete();
		
		parent::deleted($dokSbp);
	}
}
