<?php

namespace App\Http\Controllers;

use App\Http\Resources\SprintResource;
use App\Models\Sprint;
use Illuminate\Http\Request;

class SprintController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$all_sprint = Sprint::all();
		return SprintResource::collection($all_sprint);
	}

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
		$search_result = Sprint::where('nomor_sprint', 'like', $search)
			->orderBy('tanggal_sprint', 'DESC')
			->take(5)
			->get();
		return SprintResource::collection($search_result);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$request->validate([
			'nomor_sprint' => 'required|unique:sprint,nomor_sprint,NULL,id,deleted_at,NULL',
			'tanggal_sprint' => 'required|date',
			'pejabat.id' => 'required|integer'
		]);

		return Sprint::create([
			'nomor_sprint' => $request->nomor_sprint,
			'tanggal_sprint' => $request->tanggal_sprint,
			'pejabat_id' => $request->pejabat['id'],
		]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		return new SprintResource(Sprint::find($id));
	}
}
