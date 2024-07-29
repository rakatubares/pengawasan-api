<?php

namespace App\Observers\Intelijen;

use App\Observers\DokObserver;

class DokLkaiObserver extends DokObserver
{
    /**
     * Handle the DokLkai "deleted" event.
     *
     * @param  \App\Models\Intelijen\DokLkai  $dokLkai
     * @return void
     */
    public function deleted($dokLkai) {
        $kodeLppi = $dokLkai->kodeLppi;
        if ($dokLkai->chain->$kodeLppi != null) {
            $dokLkai->chain->$kodeLppi->unFollowedUp();
        }
        parent::deleted($dokLkai);
    }
}
