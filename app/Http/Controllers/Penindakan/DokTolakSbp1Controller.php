<?php

namespace App\Http\Controllers\Penindakan;

use App\Http\Controllers\DokController;

class DokTolakSbp1Controller extends DokController
{
	public function __construct($doc_type='tolak1')
	{
		parent::__construct($doc_type);
	}
}
