<?php

namespace App\Models\Penindakan;

class DokSbpN extends DokSbp
{
    protected $table = 'dok_sbpn';
	public $kode_dokumen = 'sbpn';
	public $tipe_dokumen = 'SBP-N';
	public $kode_nhi = 'nhin';
	public $kode_lap = 'lapn';
	public $kode_lptp = 'lptpn';
}
