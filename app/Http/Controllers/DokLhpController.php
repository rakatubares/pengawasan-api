<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokLhpController extends DokPenyidikanController
{
	public function __construct($doc_type='lhp')
	{
		parent::__construct($doc_type);
	}

	protected function getPenyidikan($id)
	{
		$this->getDocument($id);
		$this->penyidikan = $this->doc->split->lpf->lpp->penyidikan;
	}

	public function bhp($id)
	{
		$this->getPenyidikan($id);
		$bhp_resource = $this->getBhpData();
		
		return $bhp_resource;
	}
}
