<?php

namespace App\Http\Controllers\Penindakan;

use Illuminate\Http\Request;

class DokTegahController extends PenindakanController
{
	public function __construct($doc_type='tegah')
	{
		parent::__construct($doc_type);
	}

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
