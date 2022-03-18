<?php

namespace App\Http\Controllers;

use App\Http\Resources\RefKemasanResource;
use App\Models\RefKemasan;
use Illuminate\Http\Request;

class RefKemasanController extends Controller
{
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$kemasan = new RefKemasanResource(RefKemasan::find($id));
		return $kemasan;
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

		$start_query = RefKemasan::where('kode_kemasan', 'like', $s.'%')
			->orWhere('uraian_kemasan', 'like', $s.'%');

		$middle_query = RefKemasan::where('kode_kemasan', 'like', '%'.$s.'%')
			->orWhere('uraian_kemasan', 'like', '%'.$s.'%');

		$search_result = $start_query->union($middle_query)->take(5)->get();

		$search_list = RefKemasanResource::collection($search_result);
		return $search_list;
	}
}
