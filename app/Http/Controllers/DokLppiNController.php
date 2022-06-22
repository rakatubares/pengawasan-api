<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokLppiNController extends DokLppiController
{
	public function __construct()
	{
		$this->doc_type = 'lppin';
		$this->prepareModel();
	}
}
