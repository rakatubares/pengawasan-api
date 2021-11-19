<?php

namespace App\Http\Controllers;

use App\Http\Resources\RefSprintResource;
use App\Models\RefSprint;
use Illuminate\Http\Request;

class RefSprintController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$all_sprint = RefSprint::all();
		$sprint_list = RefSprintResource::collection($all_sprint);
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
		$s = $request->s;
		$search = '%' . $s . '%';
		$search_result = RefSprint::where('nomor_sprint', 'like', $search)
			->orderBy('tanggal_sprint', 'DESC')
			->take(5)
			->get();
		$search_list = RefSprintResource::collection($search_result);
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
			'nomor_sprint' => 'required|unique:ref_sprint,nomor_sprint,NULL,id,deleted_at,NULL',
			'tanggal_sprint' => 'required|date',
			'pejabat.id' => 'required|integer'
		]);

		$insert_result = RefSprint::create([
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
		$sprint = new RefSprintResource(RefSprint::find($id));
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
