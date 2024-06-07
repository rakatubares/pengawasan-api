<?php

namespace App\Models\Penindakan;

class DokLptpN extends DokLptp
{
    protected $table = 'dok_lptpn';
	public $kode_dokumen = 'lptpn';
	public $tipe_dokumen = 'LPTP-N';
	public $kode_sbp = 'sbpn';
}
