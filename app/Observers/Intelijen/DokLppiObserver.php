<?php

namespace App\Observers\Intelijen;

use App\Observers\DokObserver;

class DokLppiObserver extends DokObserver
{
    /**
     * Handle the DokLpti "deleted" event.
     *
     * @param  \App\Models\Intelijen\DokLpti  $dokLpti
     * @return void
     */
    public function deleted($dokLppi) {
        $kodeLpti = $dokLppi->kodeLpti;
        if ($dokLppi->chain->$kodeLpti != null) {
            $dokLppi->chain->$kodeLpti->unFollowedUp();
        }
        parent::deleted($dokLppi);
    }
}
