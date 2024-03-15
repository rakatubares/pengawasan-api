<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Penindakan\DokLapController;

class DokLapNController extends DokLapController
{
	protected $related_documents = [
		'NHI-N' => 'nhin'
	];

	function __construct()
	{
		parent::__construct('lapn');	
	}
}
