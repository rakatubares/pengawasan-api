<?php

namespace App\Models\Penindakan;

class DokLptpN extends DokLptp
{
    protected $table = 'dok_lptpn';
	public $kodeDokumen = 'lptpn';
	public $tipeDokumen = 'LPTP-N';
	public $kodeSbp = 'sbpn';
}
