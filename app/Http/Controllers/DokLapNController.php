<?php

namespace App\Http\Controllers;

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
