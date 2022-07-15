<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokNiNTableResource;

class DokNiNController extends DokNiController
{
	public function __construct()
	{
		$this->doc_type = 'nin';
		$this->lkai_type = 'lkain';
		$this->table_resource = DokNiNTableResource::class;
		$this->prepareModel();
	}
}
