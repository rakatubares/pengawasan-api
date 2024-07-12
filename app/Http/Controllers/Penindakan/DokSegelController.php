<?php

namespace App\Http\Controllers\Penindakan;

use Illuminate\Http\Request;

class DokSegelController extends PenindakanController
{
	protected $docType = 'segel';

	protected function validateData(Request $request)
	{
		$request->validate([
			'jenis_segel' => 'required',
		]);
	}

	protected function prepareData(Request $request)
	{
		return [
			'jenis_segel' => $request->jenis_segel,
			'jumlah_segel' => $request->jumlah_segel,
			'satuan_segel' => $request->satuan_segel,
			'tempat_segel' => $request->tempat_segel,
			'nomor_segel' => $request->nomor_segel,
		];
	}

	protected function storing(Request $request)
	{
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
