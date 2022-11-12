<?php

namespace App\Observers;

use App\Models\DokLphp;
use App\Models\ObjectRelation;
use App\Traits\SwitcherTrait;

class DokLphpObserver
{
	use SwitcherTrait;

    /**
     * Handle the DokLphp "created" event.
     *
     * @param  \App\Models\DokLphp  $dokLphp
     * @return void
     */
    public function created(DokLphp $dokLphp)
    {
        //
    }

    /**
     * Handle the DokLphp "updated" event.
     *
     * @param  \App\Models\DokLphp  $dokLphp
     * @return void
     */
    public function updated(DokLphp $dokLphp)
    {
        //
    }

    /**
     * Handle the DokLphp "deleted" event.
     *
     * @param  \App\Models\DokLphp  $dokLphp
     * @return void
     */
    public function deleted(DokLphp $dokLphp)
    {
		// Get LPHP type
		switch (get_class($dokLphp)) {
			case $this->switchObject('lphp', 'model'):
				$lphp_type = 'lphp';
				break;

			case $this->switchObject('lphpn', 'model'):
				$lphp_type = 'lphpn';
				break;
			
			default:
				$lphp_type = null;
				break;
		}

        // Change status to 300
		$dokLphp->update(['kode_status' => 300]);

		// Change SBP status
		$sbp = $dokLphp->lptp->sbp;
		$sbp->update(['kode_status' => 200]);

		// Delete any possible relations
		ObjectRelation::where(function($query) use ($dokLphp, $lphp_type) {
			$query->where('object1_type', $lphp_type)
				->where('object1_id', $dokLphp->id);
		})->orWhere(function($query) use ($dokLphp, $lphp_type) {
			$query->where('object2_type', $lphp_type)
				->where('object2_id', $dokLphp->id);
		})->delete();
    }

    /**
     * Handle the DokLphp "restored" event.
     *
     * @param  \App\Models\DokLphp  $dokLphp
     * @return void
     */
    public function restored(DokLphp $dokLphp)
    {
        //
    }

    /**
     * Handle the DokLphp "force deleted" event.
     *
     * @param  \App\Models\DokLphp  $dokLphp
     * @return void
     */
    public function forceDeleted(DokLphp $dokLphp)
    {
        //
    }
}
