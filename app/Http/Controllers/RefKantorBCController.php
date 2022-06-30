<?php

namespace App\Http\Controllers;

use App\Http\Resources\RefKantorBCResource;
use App\Models\RefKantorBC;
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

		$search_result = RefKantorBC::where('active', true)
			->where('kd_kantor', 'like', $s.'%')
			->orWhere('nama_kantor', 'like', '%'.$s.'%')
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
	public function getDataByCode($kd_kantor)
	{
		$kantor = new RefKantorBCResource(RefKantorBC::where('kd_kantor', $kd_kantor)->first());
		return $kantor;
	}
}
