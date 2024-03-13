<?php

namespace App\Http\Controllers\References;

use App\Http\Controllers\Controller;
use App\Http\Resources\References\RefBandaraResource;
// use App\Http\Resources\RefBandaraResource;
use App\Models\References\RefBandara;
// use App\Models\RefBandara;
use Illuminate\Http\Request;

class RefBandaraController extends Controller
{
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($code)
	{
		$port = new RefBandaraResource(RefBandara::where('iata_code', $code)->first());
		return $port;
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

		$start_query = RefBandara::where('iata_code', 'like', $s.'%')
			->orWhere('airport_name', 'like', $s.'%')
			->orWhere('municipality', 'like', $s.'%');

		$middle_query = RefBandara::where('airport_name', 'like', '%'.$s.'%')
			->orWhere('municipality', 'like', '%'.$s.'%');

		$search_result = $start_query->union($middle_query)->take(5)->get();

		$search_list = RefBandaraResource::collection($search_result);
		return $search_list;
	}
}
