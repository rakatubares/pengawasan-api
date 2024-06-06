<?php

namespace App\Models\Penindakan;

class DokLapN extends DokLap
{
    protected $table = 'dok_lapn';
	public $kode_dokumen = 'lapn';
	public $tipe_dokumen = 'LAP-N';
	public $kode_nhi = 'nhin';
}
