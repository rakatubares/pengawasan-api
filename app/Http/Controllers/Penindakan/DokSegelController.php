<?php

namespace App\Http\Controllers\Penindakan;

use App\Http\Controllers\DokController;

class DokSegelController extends DokController
{
	public function __construct($doc_type='segel')
	{
		parent::__construct($doc_type);
	}
}