<?php

namespace App\Http\Controllers;

use App\Http\Resources\RefSatuanResource;
use App\Models\RefSatuan;
use Illuminate\Http\Request;

class RefSatuanController extends Controller
{
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$satuan = new RefSatuanResource(RefSatuan::find($id));
		return $satuan;
	}
	
	/**
	 * Display resource based on search query
	 * 
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function search(Request $request)
	{
		$s = $request->s;

		$start_query = RefSatuan::where('kode_satuan', 'like', $s.'%')
			->orWhere('uraian_satuan', 'like', $s.'%');

		$middle_query = RefSatuan::where('kode_satuan', 'like', '%'.$s.'%')
			->orWhere('uraian_satuan', 'like', '%'.$s.'%');

		$search_result = $start_query->union($middle_query)->take(5)->get();

		$search_list = RefSatuanResource::collection($search_result);
		return $search_list;
	}
}
