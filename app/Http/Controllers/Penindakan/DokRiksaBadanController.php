<?php

namespace App\Http\Controllers\Penindakan;

use App\Http\Controllers\Penindakan\Detail\PenindakanBadanController;
use Illuminate\Http\Request;

class DokRiksaBadanController extends PenindakanController
{
	protected $docType = 'riksa_badan';

	protected function storing(Request $request) {
		$data = parent::storing($request);
		$chain = $this->createChain();
		$data['chain_id'] = $chain->id;

		return $data;
	}

	protected function stored($request)
	{
		$this->createPenindakan($request);
		$data_badan = $request->penindakan['objek']['badan'];
		$data_badan['flag_badan'] = true;
		$penindakanBadanController = new PenindakanBadanController();
		$penindakanBadanController->store(
			new Request($data_badan),
			$this->penindakan->id
		);
		parent::stored($request);
	}

	protected function updated($request) {
		$this->updatePenindakan($request);
		$data_badan = $request->penindakan['objek']['badan'];
		$data_badan['flag_badan'] = true;
		$penindakanBadanController = new PenindakanBadanController();
		$penindakanBadanController->update(
			new Request($data_badan),
			$this->doc->chain->penindakan->id
		);
		parent::updated($request);
	}
}
