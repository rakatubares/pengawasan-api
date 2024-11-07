<?php

namespace App\Http\Controllers\Penindakan\Detail;

use App\Http\Controllers\Controller;
use App\Http\Resources\Penindakan\PenindakanBadanResource;
use App\Models\Penindakan\Penindakan;
use Illuminate\Http\Request;

class PenindakanBadanController extends Controller
{
	private function validateData($request) {
		$request->validate([
			'entitas.id' => 'nullable|integer'
		]);
	}

	private function prepareData(Request $request) {
		return [
			'entitas_id' => $request->entitas['id'],
			'asal' => $request->asal,
			'tujuan' => $request->tujuan,
			'pendamping_id' => $request->pendamping ? $request->pendamping['id'] : null,
			'nama_sarkut' => $request->nama_sarkut,
			'jenis_sarkut' => $request->jenis_sarkut,
			'nomor_sarkut' => $request->nomor_sarkut,
			'pengemudi_id' => $request->pengemudi ? $request->pengemudi['id'] : null,
			'bendera_sarkut' => $request->bendera ? $request->bendera['kode_2'] : null,
			'registrasi_sarkut' => $request->registrasi_sarkut,
			'jenis_dokumen' => $request->jenis_dokumen,
			'nomor_dokumen' => $request->nomor_dokumen,
			'tanggal_dokumen' => $request->tanggal_dokumen,
			'uraian_pemeriksaan' => $request->uraian_pemeriksaan,
			'hasil_pemeriksaan' => $request->hasil_pemeriksaan,
		];
	}

	public function show($penindakan_id) {
		$penindakan = Penindakan::findOrFail($penindakan_id);
		return new PenindakanBadanResource($penindakan->badan);
	}

	public function store(Request $request, $penindakan_id) {
		if ($request->flag_badan) {
			// Data preparation
			$this->validateData($request);
			$data_badan = $this->prepareData($request);

			// Save data
			$penindakan = Penindakan::findOrFail($penindakan_id);
			$penindakan->badan()->create($data_badan);

			// Return Resource
			return new PenindakanBadanResource($penindakan->badan);
		} else {
			return null;
		}
	}

	public function update(Request $request, $penindakan_id) {
		$penindakan = Penindakan::findOrFail($penindakan_id);

		if ($request->flag_badan) {
			// Data preparation
			$this->validateData($request);
			$data_badan = $this->prepareData($request);

			// Update data
			if ($penindakan->badan) {
				$penindakan->badan()->update($data_badan);
			} else {
				$penindakan->badan()->create($data_badan);
			}

			// Return resource
			$new_badan = $penindakan->badan()->first();
			return new PenindakanBadanResource($new_badan);
		} else {
			if ($penindakan->badan) {
				// Delete previous data
				$penindakan->badan()->delete();
			}

			return null;
		}
	}
}
