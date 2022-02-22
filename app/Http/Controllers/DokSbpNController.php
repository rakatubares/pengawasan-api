<?php

namespace App\Http\Controllers;

class DokSbpNController extends DokSbpController
{
    public function __construct()
	{
		$this->doc_type = 'sbpn';
		$this->lptp_type = 'lptpn';
		$this->lptp_controller = DokLptpNController::class;
		$this->prepareModel();
	}
}
