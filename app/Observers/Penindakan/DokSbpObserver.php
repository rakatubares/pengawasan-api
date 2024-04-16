<?php

namespace App\Observers\Penindakan;

use App\Observers\DokObserver;

class DokSbpObserver extends DokObserver
{
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
		$dokSbp->chain->lptp->publish();
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
		if ($dokSbp->chain->lap != null) {
			$dokSbp->chain->lap->unFollowedUp();
		}
		$dokSbp->chain->lptp->delete();
		parent::deleted($dokSbp);
	}
}
