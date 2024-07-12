<?php

namespace App\Http\Controllers\Penindakan;

use App\Http\Controllers\DokController;
use Illuminate\Http\Request;

class DokLapController extends DokController
{
	protected $docType = 'lap';

	/*
	 |--------------------------------------------------------------------------
	 | Data modify functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Validate request
	 */
	protected function validateData(Request $request)
	{
		$request->validate([
			'tanggal_dokumen' => 'nullable|date',
			'sumber_id' => 'nullable|integer',
			'tanggal_sumber' => 'nullable|date',
			'dugaan_pelanggaran.id' => 'required|integer',
			'flag_pelaku' => 'integer',
			'flag_pelanggaran' => 'integer',
			'flag_locus' => 'integer',
			'flag_tempus' => 'integer',
			'flag_kewenangan' => 'integer',
			'flag_sdm' => 'integer',
			'flag_sarpras' => 'integer',
			'flag_anggaran' => 'integer',
			'flag_layak_penindakan' => 'boolean',
			'skema_penindakan.id' => 'nullable|integer',
			'flag_layak_patroli' => 'nullable|integer',
		]);
	}

	/**
	 * Prepare data from request to array
	 *
	 * @param Request $request
	 * @param String $state
	 * @return Array
	 */
	protected function prepareData(Request $request, $state='insert')
	{
		// Make source null if source id is not available
		if (
			($request->jenis_sumber != 'lainnya') &
			($request->sumber_id == null)
		) {
			$request->jenis_sumber = null;
			$request->nomor_sumber = null;
			$request->tanggal_sumber = null;
		}

		$thn_dok = $request->tanggal_dokumen != null ? date('Y', strtotime($request->tanggal_dokumen)) : null;
		$tanggal_dokumen = $request->tanggal_dokumen != null ? date('Y-m-d', strtotime($request->tanggal_dokumen)) : null;
		$tanggal_sumber = $request->tanggal_sumber != null ? date('Y-m-d', strtotime($request->tanggal_sumber)) : null;
		$skema_penindakan_id = $request->skema_penindakan != null ? $request->skema_penindakan['id'] : null;
		$keterangan_skema_penindakan = $request->skema_penindakan != null ? $request->keterangan_skema_penindakan : null;

		return [
			'thn_dok' => $thn_dok,
			'tanggal_dokumen' => $tanggal_dokumen,
			'jenis_sumber' => $request->jenis_sumber,
			'nomor_sumber' => $request->nomor_sumber,
			'tanggal_sumber' => $tanggal_sumber,
			'dugaan_pelanggaran_id' => $request->dugaan_pelanggaran['id'],
			'flag_pelaku' => $request->flag_pelaku,
			'keterangan_pelaku' => $request->keterangan_pelaku,
			'flag_pelanggaran' => $request->flag_pelanggaran,
			'keterangan_pelanggaran' => $request->keterangan_pelanggaran,
			'flag_locus' => $request->flag_locus,
			'keterangan_locus' => $request->keterangan_locus,
			'flag_tempus' => $request->flag_tempus,
			'keterangan_tempus' => $request->keterangan_tempus,
			'flag_kewenangan' => $request->flag_kewenangan,
			'keterangan_kewenangan' => $request->keterangan_kewenangan,
			'flag_sdm' => $request->flag_sdm,
			'keterangan_sdm' => $request->keterangan_sdm,
			'flag_sarpras' => $request->flag_sarpras,
			'keterangan_sarpras' => $request->keterangan_sarpras,
			'flag_anggaran' => $request->flag_anggaran,
			'keterangan_anggaran' => $request->keterangan_anggaran,
			'flag_layak_penindakan' => $request->flag_layak_penindakan,
			'skema_penindakan_id' => $skema_penindakan_id,
			'keterangan_skema_penindakan' => $keterangan_skema_penindakan,
			'flag_layak_patroli' => $request->flag_layak_patroli,
			'keterangan_patroli' => $request->keterangan_patroli,
			'kesimpulan' => $request->kesimpulan,
		];
	}

	protected function storing(Request $request) {
		$data = parent::storing($request);

		if (
			($request->jenis_sumber != 'lainnya') &
			($request->sumber_id != null)
		) {
			// Attach to existing chain when source is available
			$source = $this->attachTo($request->jenis_sumber, $request->sumber_id);
			$chain = $source->chain;
			$data['nomor_sumber'] = $source->no_dok_lengkap;
			$data['tanggal_sumber'] = $source->tanggal_dokumen;
		} else {
			// Create new chain when source is not available
			$chain = $this->createChain();
		}
		$data['chain_id'] = $chain->id;

		return $data;
	}

	protected function updating(Request $request) {
		$data = parent::updating($request);

		// Get existing source
		$existing_jenis_sumber = $this->doc->jenis_sumber;

		// Get new source
		$new_jenis_sumber = $request->jenis_sumber;

		if (
			($existing_jenis_sumber != 'lainnya') &
			($existing_jenis_sumber != null)
		) {
			$existing_source = $this->doc->chain->$existing_jenis_sumber;
			if (
				($new_jenis_sumber != 'lainnya') &
				($new_jenis_sumber != null)
			) {
				$new_source = $this->getDocument($request->jenis_sumber, $request->sumber_id);
				if ($new_source != $existing_source) {
					// Detach from previous chain and attach to new chain
					// when new source is available and different from previous one
					$this->detachFrom($existing_jenis_sumber, $existing_source->id);
					$source = $this->attachTo($new_jenis_sumber, $request->sumber_id);
					$data['chain_id'] = $source->chain_id;
					$data['nomor_sumber'] = $source->no_dok_lengkap;
					$data['tanggal_sumber'] = $source->tanggal_dokumen;
				}
			} else {
				// Detach from previous chain and create new chain
				// when new source is not available
				$this->detachFrom($existing_jenis_sumber, $existing_source->id);
				$chain = $this->createChain();
				$data['chain_id'] = $chain->id;
			}
		} else {
			if (
				($new_jenis_sumber != 'lainnya') &
				($new_jenis_sumber != null)
			) {
				// Delete previous chain and attach to new chain
				// when new source is available
				$existing_chain = $this->doc->chain;
				$existing_chain->delete();
				$source = $this->attachTo($new_jenis_sumber, $request->sumber_id);
				$data['chain_id'] = $source->chain_id;
				$data['nomor_sumber'] = $source->no_dok_lengkap;
				$data['tanggal_sumber'] = $source->tanggal_dokumen;
			}
		}

		return $data;
	}
}
