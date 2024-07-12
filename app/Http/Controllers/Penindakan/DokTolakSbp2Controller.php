<?php

namespace App\Http\Controllers\Penindakan;

use App\Http\Controllers\DokController;
use Illuminate\Http\Request;

class DokTolakSbp2Controller extends DokController
{
	protected $docType = 'tolak2';

	protected function validateData(Request $request)
	{
		$request->validate([
			'alasan' => 'required',
			'tolak1.id' => 'integer',
		]);
	}

	protected function prepareData(Request $request)
	{
		return [
			'alasan' => $request->alasan,
			'tolak1_id' => $request->tolak1['id'],
			'saksi_id' => $request->saksi['id'],
		];
	}

	protected function storing(Request $request)
	{
		$data = parent::storing($request);

		// Get source's chain
		$source = $this->getDocument('tolak1', $request->tolak1['id']);
		$source->followedUp('status_tolak');

		// Attach to chain's documents if exist
		$chain = $source->chain;
		$data['chain_id'] = $chain->id;

		return $data;
	}

	protected function updating(Request $request)
	{
		$data = parent::updating($request);

		// Get previous chain
		$old_chain = $this->doc->chain;
		$old_chain_id = $old_chain->id;

		// Get new chain
		$new_source = $this->getDocument('tolak1', $request->tolak1['id']);
		$new_chain = $new_source->chain;
		$new_chain_id = $new_chain->id;

		if ($old_chain_id != $new_chain_id) {
			// Rollback previous chain connection
			$this->doc->tolak1->unFollowedUp('status_tolak');

			// Change chain
			$data['chain_id'] = $new_chain_id;
			$new_source->followedUp('status_tolak');
		}

		return $data;
	}
}
