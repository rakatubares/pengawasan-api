<?php

namespace App\Http\Controllers;

class DokLkaiNController extends DokLkaiController
{
	public function __construct()
	{
		parent::__construct('lkain');
		$this->lppi_type = 'lppin';
		$this->lppi_draft_status = 121;
		$this->lppi_published_status = 221;
		$this->prepareLppi();
	}
}