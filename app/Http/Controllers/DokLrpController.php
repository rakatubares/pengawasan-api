<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokLrpController extends DokPenyidikanController
{
	public function __construct($doc_type='lrp')
	{
		parent::__construct($doc_type);
	}
}
