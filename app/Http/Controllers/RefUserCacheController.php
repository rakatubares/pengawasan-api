<?php

namespace App\Http\Controllers;

use App\Http\Resources\JabatanResource;
use App\Models\RefJabatan;
use App\Models\RefUserCache;
use App\Services\SSO;
use Illuminate\Http\Request;

class RefUserCacheController extends Controller
{
	/**
	 * Initiate SSO
	 * 
	 * @param SSO $sso
	 */
	public function __construct(SSO $sso)
	{
		$this->sso = $sso;
	}

	/**
	 * Display a listing of users by role.
	 *
	 * @param  \Illuminate\Http\Request $r
	 * @return \Illuminate\Http\Response
	 */
	public function role(Request $request)
	{
		// $roles = [
		// 	'penindakan' => 'p2vue.penindakan'
		// ];

		$token = $request->bearerToken();
        $this->sso->setToken($token);

		$roles = $request->roles;

		$data = $this->sso->getUserByRole($roles, false);
		return $data;
	}

	/**
	 * Display a listing of users by jabatan.
	 *
	 * @param  \Illuminate\Http\Request $r
	 * @return \Illuminate\Http\Response
	 */
	public function jabatan(Request $request)
	{
		$token = $request->bearerToken();
        $this->sso->setToken($token);

		$positions = $request->positions;

		$data = $this->sso->getUserByPosition($positions, true);
		return $data;
	}

	/**
	 * Display a listing of users by jabatan.
	 *
	 * @param  \Illuminate\Http\Request $r
	 * @return \Illuminate\Http\Response
	 */
	public function listJabatan(Request $request)
	{
		// $token = $request->bearerToken();
        // $this->sso->setToken($token);

		// $positions = $request->positions;

		// $data = $this->sso->getJabatanByCode($positions);
		// return $data;
		$results = RefJabatan::whereIn('kode', $request->positions)->get();
		$jabatan = JabatanResource::collection($results);
		return $jabatan;
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
				'pejabat' => $request->pejabat,
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
	public function show(Request $request, $id)
	{
		$token = $request->bearerToken();
        $this->sso->setToken($token);

		$data = $this->sso->getUserById($id);
		return $data;
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
