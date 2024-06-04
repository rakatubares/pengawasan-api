<?php

namespace App\Http\Controllers\Penindakan;

use App\Http\Controllers\DokController;
use Illuminate\Http\Request;

class DokTolakSbp1Controller extends DokController
{
	public function __construct($doc_type='tolak1')
	{
		parent::__construct($doc_type);
	}

	protected function validateData(Request $request) 
	{
		$request->validate([
			'alasan' => 'required',
			'sbp.type' => 'required',
			'sbp.id' => 'integer',
		]);
	}

	protected function prepareData(Request $request) 
	{
		$data = [
			'alasan' => $request->alasan,
			'parent_type' => $request->sbp['type'],
			'parent_id' => $request->sbp['id'],
		];

		return $data;
	}

	protected function storing(Request $request) 
	{
		$data = parent::storing($request);

		// Get source's chain
		$source = $this->getDocument($request->sbp['type'], $request->sbp['id']);
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
		$new_source = $this->getDocument($request->sbp['type'], $request->sbp['id']);
		$new_chain = $new_source->chain;
		$new_chain_id = $new_chain->id;

		if ($old_chain_id != $new_chain_id) {
			// Rollback previous chain connection
			$this->doc->tolakable->unFollowedUp('status_tolak');

			// Change chain
			$data['chain_id'] = $new_chain_id;
			$new_source->followedUp('status_tolak');
		}

		return $data;
	}
}
