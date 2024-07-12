<?php

namespace App\Http\Controllers\References;

use App\Http\Controllers\Controller;
use App\Http\Resources\References\RefKategoriBarangResource;
use App\Models\References\RefKategoriBarang;
use Illuminate\Http\Request;

class RefKategoriBarangController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$active_categories = RefKategoriBarang::where(['active' => true])->orderBy('kategori')->get();
		return RefKategoriBarangResource::collection($active_categories);
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		return new RefKategoriBarangResource(RefKategoriBarang::find($id));
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

		$search_result = RefKategoriBarang::where('kategori', 'like', '%'.$s.'%')
			->where('active', true)
			->take(5)
			->get();

		return RefKategoriBarangResource::collection($search_result);
	}
}
