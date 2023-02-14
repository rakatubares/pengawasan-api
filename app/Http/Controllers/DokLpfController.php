<?php

namespace App\Http\Controllers;

class DokLpfController extends DokPenyidikanController
{
	public function __construct($doc_type='lpf')
	{
		parent::__construct($doc_type);
	}

	protected function getPenyidikan($id)
	{
		$this->getDocument($id);
		$this->penyidikan = $this->doc->lpp->penyidikan;
	}

	public function bhp($id)
	{
		$this->getPenyidikan($id);
		$bhp_resource = $this->getBhpData();
		
		return $bhp_resource;
	}
}
