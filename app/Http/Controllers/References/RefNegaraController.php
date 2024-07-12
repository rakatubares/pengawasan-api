<?php

namespace App\Http\Controllers\References;

use App\Http\Controllers\Controller;
use App\Http\Resources\References\RefNegaraResource;
use App\Models\References\RefNegara;
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
		return new RefNegaraResource(RefNegara::where('kode_2', $code)->first());
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

		return RefNegaraResource::collection($search_result);
	}
}
