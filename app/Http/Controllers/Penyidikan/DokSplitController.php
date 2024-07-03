<?php

namespace App\Http\Controllers\Penyidikan;

use App\Http\Controllers\DokController;
use Illuminate\Http\Request;

class DokSplitController extends DokController
{
	protected $doc_type = 'split';

	protected function prepareData(Request $request) 
	{
		$data = [
			'dugaan_pelanggaran' => $request->dugaan_pelanggaran,
		];

		return $data;
	}

	protected function storing(Request $request) 
	{
		$data = parent::storing($request);

		// Get source's chain
		$source = $this->attachTo('lpf', $request->lpf['id']);
		$chain = $source->chain;

		// Attach to chain's documents
		$data['chain_id'] = $chain->id;

		return $data;
	}

	protected function stored(Request $request) 
	{
		if ($request->has('petugas')) {
			// Pejabat
			$petugas = array_filter(
				$request->petugas,
				fn ($key) => $key != 'pelaksana',
				ARRAY_FILTER_USE_KEY,
			);
			$this->savePetugas($petugas, $this->doc);

			// Pelaksana
			$nip_pelaksana = [];
			foreach ($request->petugas['pelaksana'] as $pelaksana) {
				if (!in_array($pelaksana['nip'], $nip_pelaksana)) {
					$this->saveNonPejabat('petugas', $pelaksana, $this->doc);
					array_push($nip_pelaksana, $pelaksana['nip']);
				}
			}
			
		}
		if ($request->has('tembusan')) {$this->setTembusan($request->tembusan, $this->doc);}
	}

	protected function updating(Request $request) 
	{
		$data = parent::updating($request);

		// Get existing source
		$existing_source_id = $this->doc->chain->lpf->id;

		// Change chain
		if ($existing_source_id != $request->lpf['id']) 
		{
			// Detach from previous LP
			$this->detachFrom('lpf', $existing_source_id);

			// Attach to new source
			$source = $this->attachTo('lpf', $request->lpf['id']);
			$chain = $source->chain;

			$data['chain_id'] = $chain->id;
		}

		return $data;
	}

	protected function updated(Request $request) 
	{
		if ($request->has('petugas')) {
			// Pejabat
			$petugas = array_filter(
				$request->petugas,
				fn ($key) => $key != 'pelaksana',
				ARRAY_FILTER_USE_KEY,
			);
			$this->savePetugas($petugas, $this->doc);

			// Pelaksana
			
			// Get existing pelaksana
			$existing_pelaksana_nip = [];
			foreach ($this->doc->detail_petugas as $petugas) {
				if ($petugas['posisi'] == 'petugas') {
					array_push($existing_pelaksana_nip, $petugas['nip']);
				}
			}

			// Insert new pelaksana
			$new_pelaksana_nip = [];
			foreach ($request->petugas['pelaksana'] as $pelaksana) {
				if (!in_array($pelaksana['nip'], $existing_pelaksana_nip)) {
					$this->saveNonPejabat('petugas', $pelaksana, $this->doc);
				}
				array_push($new_pelaksana_nip, $pelaksana['nip']);
			}
			
			// Delete not chosen pelaksana
			foreach ($existing_pelaksana_nip as $nip) {
				if (!in_array($nip, $new_pelaksana_nip)) {
					$this->doc->detail_petugas()
						->where(['posisi' => 'petugas', 'nip' => $nip])
						->delete();
				}
			}
		}
		if ($request->has('tembusan')) {$this->setTembusan($request->tembusan, $this->doc);}
	}
}
