<?php

namespace App\Http\Controllers;

use App\Http\Resources\RefKategoriBarangResource;
use App\Models\RefKategoriBarang;
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
		$category_list = RefKategoriBarangResource::collection($active_categories);
		return $category_list;
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$kategori = new RefKategoriBarangResource(RefKategoriBarang::find($id));
		return $kategori;
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

		$search_list = RefKategoriBarangResource::collection($search_result);
		return $search_list;
	}
}
