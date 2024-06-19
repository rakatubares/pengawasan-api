<?php

namespace App\Http\Controllers\References;

use App\Http\Controllers\Controller;
use App\Http\Resources\References\RefLokasiResource;
use App\Models\References\RefLokasi;
use Illuminate\Http\Request;

class RefLokasiController extends Controller
{
	/**
	 * Display resource based on search query
	 * 
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function search(Request $request)
	{
		$src = $request->src;
		$search = '%' . $src . '%';

		$search_result = RefLokasi::where('lokasi', 'like', $search)
			->orderBy('lokasi')
			->take(5)
			->get();

		$search_list = RefLokasiResource::collection($search_result);
		return $search_list;
	}

	public function save($lokasi) 
	{
		$lokasi = trim(strtoupper($lokasi));
		$is_exist = $this->checkLokasi($lokasi);
		if (!$is_exist) {
			RefLokasi::create(['lokasi' => $lokasi]);
		}
	}

	private function checkLokasi($lokasi) {
		$data_lokasi = RefLokasi::where('lokasi', '=', $lokasi)->first();
		if ($data_lokasi != null) {
			$result = true;
		} else {
			$result = false;
		}

		return $result;
	}
}
