<?php

namespace App\Observers\Intelijen;

use App\Observers\DokObserver;

class DokLptiObserver extends DokObserver
{
    /**
     * Handle the DokLpti "deleted" event.
     *
     * @param  \App\Models\Intelijen\DokLpti  $dokLpti
     * @return void
     */
    public function deleted($dokLpti) {
        if ($dokLpti->chain->sti != null) {
            $dokLpti->chain->sti->unFollowedUp();
        }
        parent::deleted($dokLpti);
    }
}
