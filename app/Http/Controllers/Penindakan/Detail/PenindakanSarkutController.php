<?php

namespace App\Http\Controllers\Penindakan\Detail;

use App\Http\Controllers\Controller;
use App\Http\Resources\Penindakan\PenindakanSarkutResource;
use App\Models\Penindakan\Penindakan;
use Illuminate\Http\Request;

class PenindakanSarkutController extends Controller
{
	private function validateData($request) {
		$request->validate([
			'nama_sarkut' => 'required',
			'jenis_sarkut' => 'required',
			'pengemudi.id' => 'nullable|integer',
		]);
	}

	private function prepareData(Request $request) {
		return [
			'nama_sarkut' => $request->nama_sarkut,
			'jenis_sarkut' => $request->jenis_sarkut,
			'nomor_sarkut' => $request->nomor_sarkut,
			'jumlah_kapasitas' => $request->jumlah_kapasitas,
			'satuan_kapasitas' => $request->satuan_kapasitas,
			'pengemudi_id' => $request->pengemudi ? $request->pengemudi['id'] : null,
			'bendera_sarkut' => $request->bendera ? $request->bendera['kode_2'] : null,
			'registrasi_sarkut' => $request->registrasi_sarkut,
		];
	}

	public function show($penindakan_id) {
		$penindakan = Penindakan::findOrFail($penindakan_id);
		return new PenindakanSarkutResource($penindakan->sarkut);
	}

	public function store(Request $request, $penindakan_id) {
		if ($request->flag_sarkut) {
			// Data preparation
			$this->validateData($request);
			$data_sarkut = $this->prepareData($request);

			// Save data
			$penindakan = Penindakan::findOrFail($penindakan_id);
			$penindakan->sarkut()->create($data_sarkut);

			// Return Resource
			return new PenindakanSarkutResource($penindakan->sarkut);
		} else {
			return null;
		}
	}

	public function update(Request $request, $penindakan_id) {
		$penindakan = Penindakan::findOrFail($penindakan_id);

		if ($request->flag_sarkut) {
			// Data preparation
			$this->validateData($request);
			$data_sarkut = $this->prepareData($request);

			// Update data
			if ($penindakan->sarkut) {
				$penindakan->sarkut()->update($data_sarkut);
			} else {
				$penindakan->sarkut()->create($data_sarkut);
			}

			// Return resource
			$new_sarkut = $penindakan->sarkut()->first();
			return new PenindakanSarkutResource($new_sarkut);
		} else {
			if ($penindakan->sarkut) {
				// Delete previous data
				$penindakan->sarkut()->delete();
			}

			return null;
		}
	}
}
