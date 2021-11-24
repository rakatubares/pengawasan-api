<?php

namespace App\Http\Controllers;

use App\Models\RefUserCache;
use Illuminate\Http\Request;

class RefUserCacheController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
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
			'user_id' => 'required|integer',
			'username' => 'required',
			'name' => 'required',
			'nip' => 'required',
		]);

		$upsert_result = RefUserCache::updateOrCreate(
			['user_id' => $request->user_id],
			[
				'user_id' => $request->user_id,
				'username' => $request->username,
				'name' => $request->name,
				'nip' => $request->nip,
				'pangkat' => $request->pangkat,
				'penempatan' => $request->penempatan,
				'status' => $request->status,
			]
		);

		return $upsert_result;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
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
