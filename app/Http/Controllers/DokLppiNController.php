<?php

namespace App\Http\Controllers;

class DokLppiNController extends DokLppiController
{
	public function __construct()
	{
		$this->doc_type = 'lppin';
		$this->prepareModel();
	}
}
