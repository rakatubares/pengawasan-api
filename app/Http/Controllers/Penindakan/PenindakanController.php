<?php

namespace App\Http\Controllers\Penindakan;

use App\Http\Controllers\DokController;
use App\Models\Penindakan\DokRiksa;
use App\Models\Penindakan\DokRiksaBadan;
use App\Models\Penindakan\DokSegel;
use App\Models\Penindakan\DokTegah;
use App\Models\Penindakan\Penindakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenindakanController extends DokController
{
	private function prepareDataPenindakan($request) {
		$penindakan = $request->penindakan;

		$sprint_id = $penindakan['sprint'] ? $penindakan['sprint']['id'] : null;
		$tanggal_mulai_penindakan = isset($penindakan['tanggal_mulai_penindakan'])
			? (
				$penindakan['tanggal_mulai_penindakan'] != null
					? date('Y-m-d', strtotime($penindakan['tanggal_mulai_penindakan'])) 
					: null
			) : null;
		$waktu_mulai_penindakan = isset($penindakan['waktu_mulai_penindakan'])
			? $penindakan['waktu_mulai_penindakan'] : null;
		$tanggal_selesai_penindakan = isset($penindakan['tanggal_selesai_penindakan'])
			? (
				$penindakan['tanggal_selesai_penindakan'] != null
					? date('Y-m-d', strtotime($penindakan['tanggal_selesai_penindakan'])) 
					: null
			) : null;
		$waktu_selesai_penindakan = isset($penindakan['waktu_selesai_penindakan'])
			? $penindakan['waktu_selesai_penindakan'] : null;
		$saksi_id = $penindakan['saksi'] ? $penindakan['saksi']['id'] : null;
		$kategori_penindakan_id = isset($penindakan['kategori_penindakan'])
			? (
				$penindakan['kategori_penindakan'] != null
					? $penindakan['kategori_penindakan']['id'] 
					: null
			) : null;
		$uraian_penindakan = isset($penindakan['uraian_penindakan'])
			? $penindakan['uraian_penindakan'] : null;
		$alasan_penindakan = isset($penindakan['alasan_penindakan'])
			? $penindakan['alasan_penindakan'] : null;
		$jenis_pelanggaran = isset($penindakan['jenis_pelanggaran'])
			? $penindakan['jenis_pelanggaran'] : null;
		$hal_terjadi = isset($penindakan['hal_terjadi'])
			? $penindakan['hal_terjadi'] : null;

		$data_penindakan = [
			'sprint_id' => $sprint_id,
			'tanggal_mulai_penindakan' => $tanggal_mulai_penindakan,
			'waktu_mulai_penindakan' => $waktu_mulai_penindakan,
			'tanggal_selesai_penindakan' => $tanggal_selesai_penindakan,
			'waktu_selesai_penindakan' => $waktu_selesai_penindakan,
			'lokasi_penindakan' => $penindakan['lokasi_penindakan'],
			'kategori_penindakan_id' => $kategori_penindakan_id,
			'uraian_penindakan' => $uraian_penindakan,
			'alasan_penindakan' => $alasan_penindakan,
			'jenis_pelanggaran' => $jenis_pelanggaran,
			'hal_terjadi' => $hal_terjadi,
			'saksi_id' => $saksi_id,
		];

		return $data_penindakan;
	}

	protected function createPenindakan($request) {
		// Save Penindakan
		$data_penindakan = $this->prepareDataPenindakan($request);
		$data_penindakan['chain_id'] = $this->doc->chain->id;
		$this->penindakan = Penindakan::create($data_penindakan);

		// Save petugas
		$this->savePetugas($request->penindakan['petugas'], $this->penindakan);
	}

	protected function updatePenindakan($request) {
		$penindakan = $this->doc->chain->penindakan;
		
		// Update penindakan
		$data_penindakan = $this->prepareDataPenindakan($request);
		$penindakan->update($data_penindakan);

		// Save petugas
		$this->updatePetugas($request->penindakan['petugas'], $penindakan);
	}

	protected function changeChain($chain_id) {
		$chain = $this->doc->chain;

		$chain->penindakan->update(['chain_id' => $chain_id]);
		
		if ($chain->sbp) { $chain->sbp->update(['chain_id' => $chain_id]); }
		if ($chain->lptp) { $chain->lptp->update(['chain_id' => $chain_id]); }
	}

	public function tindakan(Request $request, $penindakan_id) {
		$penindakan = Penindakan::findOrFail($penindakan_id);
		$chain = $penindakan->chain;
		$data = ['chain_id' => $chain->id];

		DB::beginTransaction();
		try {
			// BA Riksa Badan
			$existing_riksa_badan = $chain->riksa_badan;
			if ($request->riksa_badan) { 
				if (!$existing_riksa_badan) {
					DokRiksaBadan::create($data); 
				}
			} else {
				if ($existing_riksa_badan) {
					$existing_riksa_badan->delete();
				}
			}

			// BA Riksa
			$existing_riksa = $chain->riksa;
			if ($request->riksa) { 
				if (!$existing_riksa) {
					DokRiksa::create($data);
				}
			} else {
				if ($existing_riksa) {
					$existing_riksa->delete();
				}
			}

			// BA Tegah
			$existing_tegah = $chain->tegah;
			if ($request->tegah) { 
				if (!$existing_tegah) {
					DokTegah::create($data);
				}
			} else {
				if ($existing_tegah) {
					$existing_tegah->delete();
				}
			}
				

			// BA Segel
			$existing_segel = $chain->segel;
			if ($request->segel) { 
				$data_segel = $data;
				$data_segel['jenis_segel'] = $request->data_segel['jenis_segel'];
				$data_segel['jumlah_segel'] = $request->data_segel['jumlah_segel'];
				$data_segel['satuan_segel'] = $request->data_segel['satuan_segel'];
				$data_segel['tempat_segel'] = $request->data_segel['tempat_segel'];
				$data_segel['nomor_segel'] = $request->data_segel['nomor_segel'];

				if (!$existing_segel) {
					DokSegel::create($data_segel); 
				} else {
					$existing_segel->update($data_segel);
				}
			} else {
				if ($existing_segel) {
					$existing_segel->delete();
				}
			}

			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}

		return $request;
	}
}
