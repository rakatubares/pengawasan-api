<?php

namespace App\Http\Controllers;

use App\Http\Resources\RefNegaraResource;
use App\Models\RefNegara;
use Illuminate\Http\Request;

class RefNegaraController extends Controller
{
	/**
	 * Display the specified resource.
	 *
	 * @param  string  $code
	 * @return \Illuminate\Http\Response
	 */
	public function show($code)
	{
		$country = new RefNegaraResource(RefNegara::where('kode_2', $code)->first());
		return $country;
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

		$search_result = RefNegara::where('kode_2', 'like', $s.'%')
			->orWhere('kode_3', 'like', $s.'%')
			->orWhere('nama_negara', 'like', '%'.$s.'%')
			->take(5)
			->get();

		$search_list = RefNegaraResource::collection($search_result);
		return $search_list;
	}
}
