<?php

namespace App\Http\Controllers\Penindakan\Detail;

use App\Http\Controllers\Controller;
use App\Http\Resources\Penindakan\PenindakanBarangResource;
use App\Models\Penindakan\Penindakan;
use Illuminate\Http\Request;

class PenindakanBarangController extends Controller
{
	private function validateData($request) {
		$request->validate([
			'jumlah_kemasan' => 'integer',
		]);
	}

	private function prepareData(Request $request) {
		$tanggal_dokumen = $request->tanggal_dokumen != null ? date('Y-m-d', strtotime($request->tanggal_dokumen)) : null;

		$data_barang = [
			'jumlah_kemasan' => $request->jumlah_kemasan,
			'jenis_kemasan_id' => $request->kemasan ? $request->kemasan['id'] : null,
			'nomor_kemasan' => $request->nomor_kemasan,
			'jenis_dokumen' => $request->jenis_dokumen,
			'nomor_dokumen' => $request->nomor_dokumen,
			'tanggal_dokumen' => $tanggal_dokumen,
			'pemilik_id' => $request->pemilik ? $request->pemilik['id'] : null,
		];

		return $data_barang;
	}

	public function show($penindakan_id) {
		$penindakan = Penindakan::findOrFail($penindakan_id);
		return new PenindakanBarangResource($penindakan->barang);
	}

	public function store(Request $request, $penindakan_id) {
		if ($request->flag_barang) {
			// Data preparation
			$this->validateData($request);
			$data_barang = $this->prepareData($request);

			// Save data
			$penindakan = Penindakan::findOrFail($penindakan_id);
			$penindakan->barang()->create($data_barang);

			// Return Resource
			return new PenindakanBarangResource($penindakan->barang);
		} else {
			return null;
		}
	}

	public function update(Request $request, $penindakan_id) {
		$penindakan = Penindakan::findOrFail($penindakan_id);

		if ($request->flag_barang) {
			// Data preparation
			$this->validateData($request);
			$data_barang = $this->prepareData($request);

			// Update data
			if ($penindakan->barang) {
				$penindakan->barang()->update($data_barang);
			} else {
				$penindakan->barang()->create($data_barang);
			}

			// Return resource
			$new_barang = $penindakan->barang()->first();
			return new PenindakanBarangResource($new_barang);
		} else {
			if ($penindakan->barang) {
				// Delete previous data 
				$penindakan->barang()->delete();
			}

			return null;
		}
	}
}
