<?php

namespace App\Http\Controllers;

use App\Http\Resources\JabatanResource;
use App\Models\References\RefJabatan;
use App\Models\RefUserCache;
use App\Services\SSO;
use Illuminate\Http\Request;

class RefUserCacheController extends Controller
{
	private $sso;
	
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
	 * Search user by name/nip query
	 *
	 * @param  \Illuminate\Http\Request $r
	 * @return \Illuminate\Http\Response
	 */
	public function search(Request $request) {
		$token = $request->bearerToken();
        $this->sso->setToken($token);

		$query = $request['query'];

		return $this->sso->getUserByNameNip($query);
	}

	/**
	 * Display a listing of users by role.
	 *
	 * @param  \Illuminate\Http\Request $r
	 * @return \Illuminate\Http\Response
	 */
	public function nip(Request $request)
	{
		$token = $request->bearerToken();
        $this->sso->setToken($token);

		$nip = $request->nip;

		return $this->sso->getUserByNip($nip, false);
	}

	/**
	 * Display a listing of users by role.
	 *
	 * @param  \Illuminate\Http\Request $r
	 * @return \Illuminate\Http\Response
	 */
	public function role(Request $request)
	{
		$token = $request->bearerToken();
        $this->sso->setToken($token);

		$roles = $request->roles;

		return $this->sso->getUserByRole($roles, false);
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

		return $this->sso->getUserByPosition($positions, true);
	}

	/**
	 * Display a listing of users by jabatan.
	 *
	 * @param  \Illuminate\Http\Request $r
	 * @return \Illuminate\Http\Response
	 */
	public function listJabatan(Request $request)
	{
		$results = RefJabatan::whereIn('kode', $request->positions)->get();
		return JabatanResource::collection($results);
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

		return RefUserCache::updateOrCreate(
			['user_id' => $request->user_id],
			[
				'user_id' => $request->user_id,
				'username' => $request->username,
				'name' => $request->name,
				'nip' => $request->nip,
				'pangkat' => $request->pangkat,
				'penempatan' => $request->penempatan,
				'pejabat' => $request->pejabat,
				'jabatan' => $request->jabatan,
				'status' => $request->status,
			]
		);
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

		return $this->sso->getUserById($id);
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
