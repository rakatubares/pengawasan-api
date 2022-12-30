<?php

namespace App\Http\Controllers;

class DokSbpNController extends DokSbpController
{
    public function __construct()
	{
		parent::__construct('sbpn');
		$this->lptp_type = 'lptpn';
		$this->lptp_controller = DokLptpNController::class;
	}
}
