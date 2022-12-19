<?php

namespace App\Http\Controllers;

use App\Http\Resources\ObjectResource;
use App\Models\DokLpp;

class DokLppController extends DokPenyidikanController
{
	public function __construct($doc_type='lpp')
	{
		parent::__construct($doc_type);
	}

	public function docs($id)
	{
		$lpp = DokLpp::find($id);
		$penindakan_id = $lpp->penyidikan->penindakan->id;
		$docs_penindakan = DokPenindakanController::getRelatedDocuments($penindakan_id);

		$doc_lpp = [[
			'doc_type' => 'lpp',
			'doc_id' => (int)$id,
		]];
		$docs = array_merge($doc_lpp, $docs_penindakan);
		return $docs;
	}

	public function objek($id)
	{
		$lpp = $this->getDocument($id, $this->doc_type);
		$penindakan = $lpp->penyidikan->penindakan;
		$object_resource = new ObjectResource($penindakan->objectable, $penindakan->object_type);
		return $object_resource;
	}
}
