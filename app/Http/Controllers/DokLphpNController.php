<?php

namespace App\Http\Controllers;

class DokLphpNController extends DokLphpController
{
    public function __construct()
	{
		$this->doc_type = 'lphpn';
		$this->lptp_type = 'lptpn';
		$this->sbp_type = 'sbpn';
		$this->prepareModel();
	}
}
