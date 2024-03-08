<?php

namespace App\Observers\Intelijen;

class DokNhiNEximObserver
{
    /**
	 * Handle the DokNi "deleted" event.
	 *
	 * @param  \App\Models\Intelijen\DokNhiNExim  $dokNhiNExim
	 * @return void
	 */
	public function deleted($dokNhiNExim) {
		$dokNhiNExim->nhin->barang->each->delete();
	}
}
