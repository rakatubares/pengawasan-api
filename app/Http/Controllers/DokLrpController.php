<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokLrpController extends DokPenyidikanController
{
	public function __construct($doc_type='lrp')
	{
		parent::__construct($doc_type);
	}

	protected function getPenyidikan($id)
	{
		$this->getDocument($id);
		$this->penyidikan = $this->doc->lhp->split->lpf->lpp->penyidikan;
	}

	public function bhp($id)
	{
		$this->getPenyidikan($id);
		$bhp_resource = $this->getBhpData();
		
		return $bhp_resource;
	}
}
