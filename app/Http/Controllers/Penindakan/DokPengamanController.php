<?php

namespace App\Http\Controllers\Penindakan;

use Illuminate\Http\Request;

class DokPengamanController extends PenindakanController
{
	public function __construct($doc_type='pengaman')
	{
		parent::__construct($doc_type);
	}

	protected function validateData(Request $request) 
	{
		$request->validate([
			'jenis_pengaman' => 'required',
		]);
	}

	protected function prepareData(Request $request) 
	{
		$data = [
			'alasan_pengamanan' => $request->alasan_pengamanan,
			'keterangan' => $request->keterangan,
			'jenis_pengaman' => $request->jenis_pengaman,
			'jumlah_pengaman' => $request->jumlah_pengaman,
			'satuan_pengaman' => $request->satuan_pengaman,
			'tempat_pengaman' => $request->tempat_pengaman,
			'nomor_pengaman' => $request->nomor_pengaman,
		];

		return $data;
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
