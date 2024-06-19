<?php

namespace App\Http\Controllers\References;

use App\Http\Controllers\Controller;
use App\Http\Resources\References\RefKantorBCResource;
use App\Models\References\RefKantorBC;
use Illuminate\Http\Request;

class RefKantorBCController extends Controller
{
	/**
	 * Display resource based on search query
	 * 
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function search(Request $request)
	{
		$s = $request->s;

		$search_result = RefKantorBC::where('flag_aktif', 'Y')
			->where('kode_kantor', 'like', $s.'%')
			->orWhere('nama_kantor_panjang', 'like', '%'.$s.'%')
			->take(5)->get();

		$search_list = RefKantorBCResource::collection($search_result);
		return $search_list;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function getDataByCode($kode_kantor)
	{
		$kantor = new RefKantorBCResource(RefKantorBC::where('kode_kantor', $kode_kantor)->first());
		return $kantor;
	}
}
