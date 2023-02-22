<?php

namespace App\Http\Controllers;

class DokSplitController extends DokPenyidikanController
{
	public function __construct($doc_type='split')
	{
		parent::__construct($doc_type);
	}

	protected function getPenyidikan($id)
	{
		$this->getDocument($id);
		$this->penyidikan = $this->doc->lpf->lpp->penyidikan;
	}
}
