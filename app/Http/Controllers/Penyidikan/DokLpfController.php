<?php

namespace App\Http\Controllers\Penyidikan;

use App\Http\Controllers\DokController;
use Illuminate\Http\Request;

class DokLpfController extends DokController
{
	protected $doc_type = 'lpf';

	protected function prepareData(Request $request) 
	{
		$data = [
			'saksi_id' => $request->saksi ? $request->saksi['id'] : null,
			'tanggal_bap_saksi' => $request->tanggal_bap_saksi,
			'tersangka_id' => $request->tersangka ? $request->tersangka['id'] : null,
			'tanggal_bap_tersangka' => $request->tanggal_bap_tersangka,
			'resume_perkara' => $request->resume_perkara,
			'tanggal_resume_perkara' => $request->tanggal_resume_perkara,
			'jenis_dokumen_lain' => $request->jenis_dokumen_lain,
			'nomor_dokumen_lain' => $request->nomor_dokumen_lain,
			'tanggal_dokumen_lain' => $request->tanggal_dokumen_lain,
			'kesimpulan' => $request->kesimpulan,
			'usulan' => $request->usulan,
			'catatan' => $request->catatan,
		];

		return $data;
	}

	protected function storing(Request $request) 
	{
		$data = parent::storing($request);

		// Get source's chain
		$source = $this->attachTo('lpp', $request->lpp['id']);
		$chain = $source->chain;

		// Attach to chain's documents
		$data['chain_id'] = $chain->id;

		return $data;
	}

	protected function updating(Request $request) 
	{
		$data = parent::updating($request);

		// Get existing source
		$existing_source_id = $this->doc->chain->lpp->id;

		// Change chain
		if ($existing_source_id != $request->lpp['id']) 
		{
			// Detach from previous LP
			$this->detachFrom('lpp', $existing_source_id);

			// Attach to new source
			$source = $this->attachTo('lpp', $request->lpp['id']);
			$chain = $source->chain;

			$data['chain_id'] = $chain->id;
		}

		return $data;
	}
}
