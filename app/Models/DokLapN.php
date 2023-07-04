<?php

namespace App\Models;

class DokLapN extends DokLap
{
    protected $table = 'dok_lapn';
	protected $lap_type = 'lapn';
	protected $nhi_type = 'nhin';
	protected $nhi_model = DokNhiN::class;

	public function nhin() {
		return $this->nhi();
	}
}
