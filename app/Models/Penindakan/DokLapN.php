<?php

namespace App\Models\Penindakan;

class DokLapN extends DokLap
{
    protected $table = 'dok_lapn';
	public $kodeDokumen = 'lapn';
	public $tipeDokumen = 'LAP-N';
	public $kodeNhi = 'nhin';
}
