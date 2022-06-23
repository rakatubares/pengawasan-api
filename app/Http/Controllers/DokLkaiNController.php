<?php

namespace App\Http\Controllers;

class DokLkaiNController extends DokLkaiController
{
	public function __construct()
	{
		$this->doc_type = 'lkain';
		$this->lppi_type = 'lppin';
		$this->prepareModel();
	}
}
