<?php

namespace App\Http\Controllers\Penyidikan;

use App\Http\Controllers\Controller;
use App\Http\Resources\Penyidikan\PenyidikanBhpResource;
use App\Models\Penyidikan\PenyidikanBhp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BhpController extends Controller
{
    private function validateData($request) {
		$request->validate([
			'jumlah_kemasan' => 'nullable|integer',
		]);
	}

	private function prepareData(Request $request) {
		$tanggal_dokumen = $request->tanggal_dokumen != null ? date('Y-m-d', strtotime($request->tanggal_dokumen)) : null;

		$data = [
			'jumlah_kemasan' => $request->jumlah_kemasan,
			'jenis_kemasan_id' => $request->kemasan ? $request->kemasan['id'] : null,
			'jenis_dokumen' => $request->jenis_dokumen,
			'nomor_dokumen' => $request->nomor_dokumen,
			'tanggal_dokumen' => $tanggal_dokumen,
			'nama_sarkut' => $request->nama_sarkut,
			'jenis_sarkut' => $request->jenis_sarkut,
			'nomor_sarkut' => $request->nomor_sarkut,
			'registrasi_sarkut' => $request->registrasi_sarkut,
			'nomor_kontainer' => $request->nomor_kontainer,
			'ukuran_kontainer' => $request->ukuran_kontainer,
		];

		return $data;
	}

	public function update(Request $request, $bhp_id) {
		$bhp = PenyidikanBhp::findOrFail($bhp_id);

		// Data preparation
		$this->validateData($request);
		$data = $this->prepareData($request);

		DB::beginTransaction();

		try {
			// Update data
			$bhp->update($data);
			DB::commit();

			// Return data
			$new_bhp = PenyidikanBhp::findOrFail($bhp_id);
			return new PenyidikanBhpResource($new_bhp);
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}
}
