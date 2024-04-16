<?php

namespace App\Http\Controllers\Penindakan;

use App\Http\Controllers\DokController;

class DokLptpController extends DokController
{
	public function __construct($doc_type='lptp')
	{
		parent::__construct($doc_type);
	}
}
