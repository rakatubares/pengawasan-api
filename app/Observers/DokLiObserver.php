<?php

namespace App\Observers;

use App\Models\DokLi;

class DokLiObserver
{
    /**
     * Handle the DokLi "created" event.
     *
     * @param  \App\Models\DokLi  $dokLi
     * @return void
     */
    public function created(DokLi $dokLi)
    {
        //
    }

    /**
     * Handle the DokLi "updated" event.
     *
     * @param  \App\Models\DokLi  $dokLi
     * @return void
     */
    public function updated(DokLi $dokLi)
    {
        //
    }

    /**
     * Handle the DokLi "deleted" event.
     *
     * @param  \App\Models\DokLi  $dokLi
     * @return void
     */
    public function deleted(DokLi $dokLi)
    {
        // Change status to 300
		$dokLi->update(['kode_status' => 300]);
    }

    /**
     * Handle the DokLi "restored" event.
     *
     * @param  \App\Models\DokLi  $dokLi
     * @return void
     */
    public function restored(DokLi $dokLi)
    {
        //
    }

    /**
     * Handle the DokLi "force deleted" event.
     *
     * @param  \App\Models\DokLi  $dokLi
     * @return void
     */
    public function forceDeleted(DokLi $dokLi)
    {
        //
    }
}
