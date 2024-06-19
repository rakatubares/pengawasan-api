<?php

namespace App\Traits;

use App\Models\DocumentsChain;

trait DocumentsChainTrait 
{
	protected function createChain() {
		return DocumentsChain::create();
	}

	protected function getChain($doc) {
		return $doc->chain;
	}

	protected function setChainStatus($latest_document) {
		$this->chain->update([
			'latest_document' => $latest_document,
		]);
	}
}