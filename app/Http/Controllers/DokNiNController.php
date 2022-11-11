<?php

namespace App\Http\Controllers;

class DokNiNController extends DokNiController
{
	public function __construct()
	{
		parent::__construct('nin');
		$this->lkai_type = 'lkain';
		$this->status_draft_lkai = 123;
		$this->status_published_lkai = 223;
		$this->prepareLkai($this->lkai_type);
	}
}