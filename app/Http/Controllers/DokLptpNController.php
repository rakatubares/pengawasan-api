<?php

namespace App\Http\Controllers;

class DokLptpNController extends DokLptpController
{
    public function __construct()
	{
		$this->doc_type = 'lptpn';
		$this->prepareModel();
	}
}
