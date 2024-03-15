<?php

namespace App\Models;

use App\Models\Penindakan\DokLap;

class DokLapN extends DokLap
{
    protected $table = 'dok_lapn';
	protected $tipe_lap = 'lapn';
	protected $tipe_nhi = 'nhin';
	protected $nhi_model = DokNhiN::class;

	public function nhin() {
		return $this->nhi();
	}
}
