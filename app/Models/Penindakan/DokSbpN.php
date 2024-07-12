<?php

namespace App\Models\Penindakan;

class DokSbpN extends DokSbp
{
    protected $table = 'dok_sbpn';
	public $kodeDokumen = 'sbpn';
	public $tipeDokumen = 'SBP-N';
	public $kodeNhi = 'nhin';
	public $kodeLap = 'lapn';
	public $kodeLptp = 'lptpn';
}
