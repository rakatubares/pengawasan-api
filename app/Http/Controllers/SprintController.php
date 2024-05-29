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
		$sprint_list = SprintResource::collection($all_sprint);
		return $sprint_list;
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
		$search_list = SprintResource::collection($search_result);
		return $search_list;
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

		$insert_result = Sprint::create([
			'nomor_sprint' => $request->nomor_sprint,
			'tanggal_sprint' => $request->tanggal_sprint,
			'pejabat_id' => $request->pejabat['id'],
		]);

		return $insert_result;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$sprint = new SprintResource(Sprint::find($id));
		return $sprint;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
