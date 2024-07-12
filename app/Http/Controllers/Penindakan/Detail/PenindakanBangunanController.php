<?php

namespace App\Http\Controllers\Penindakan\Detail;

use App\Http\Controllers\Controller;
use App\Http\Resources\Penindakan\PenindakanBangunanResource;
use App\Models\Penindakan\Penindakan;
use Illuminate\Http\Request;

class PenindakanBangunanController extends Controller
{
	private function validateData($request) {
		$request->validate([
			'alamat' => 'required',
			'pemilik.id' => 'nullable|integer',
		]);
	}

	private function prepareData(Request $request) {
		return [
			'alamat' => $request->alamat,
			'no_reg' => $request->no_reg,
			'pemilik_id' => $request->pemilik ? $request->pemilik['id'] : null,
		];
	}

	public function show($penindakan_id) {
		$penindakan = Penindakan::findOrFail($penindakan_id);
		return new PenindakanBangunanResource($penindakan->bangunan);
	}

	public function store(Request $request, $penindakan_id) {
		if ($request->flag_bangunan) {
			// Data preparation
			$this->validateData($request);
			$data_bangunan = $this->prepareData($request);

			// Save data
			$penindakan = Penindakan::findOrFail($penindakan_id);
			$penindakan->bangunan()->create($data_bangunan);

			// Return Resource
			return new PenindakanBangunanResource($penindakan->bangunan);
		} else {
			return null;
		}
	}

	public function update(Request $request, $penindakan_id) {
		$penindakan = Penindakan::findOrFail($penindakan_id);

		if ($request->flag_bangunan) {
			// Data preparation
			$this->validateData($request);
			$data_bangunan = $this->prepareData($request);

			// Update data
			if ($penindakan->bangunan) {
				$penindakan->bangunan()->update($data_bangunan);
			} else {
				$penindakan->bangunan()->create($data_bangunan);
			}

			// Return resource
			$new_bangunan = $penindakan->bangunan()->first();
			return new PenindakanBangunanResource($new_bangunan);
		} else {
			if ($penindakan->bangunan) {
				// Delete previous bangunan data
				$penindakan->bangunan()->delete();
			}

			return null;
		}
	}
}
