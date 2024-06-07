<?php

namespace App\Http\Controllers\Penindakan;

use Illuminate\Http\Request;

class DokTegahController extends PenindakanController
{
	protected $doc_type = 'tegah';

	protected function storing(Request $request) {
		$data = parent::storing($request);
		$chain = $this->createChain();
		$data['chain_id'] = $chain->id;

		return $data;
	}

	protected function stored($request)
	{
		$this->createPenindakan($request);
		parent::stored($request);
	}

	protected function updated($request) {
		$this->updatePenindakan($request);
		parent::updated($request);
	}
}
