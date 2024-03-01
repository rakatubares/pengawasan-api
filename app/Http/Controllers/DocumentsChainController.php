<?php

namespace App\Http\Controllers;

use App\Http\Resources\DocumentsChainResource;
use App\Traits\DocumentTrait;

class DocumentsChainController extends Controller
{
	use DocumentTrait;

    /**
	 * Display data for printout.
	 *
	 * @param  string  $oc_type
	 * @param  int  $doc_id
	 * @return \Illuminate\Http\Response
	 */
	public function show($doc_type, $doc_id)
	{
		$doc = $this->getDocument($doc_type, $doc_id);
		$data = new DocumentsChainResource($doc->chain);
		return $data;
	}
}
