<?php

namespace App\Http\Controllers;

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
	 * Display a listing of penindakan.
	 *
	 * @param  \Illuminate\Http\Request $r
	 * @return \Illuminate\Http\Response
	 */
	public function role(Request $request, $role)
	{
		$roles = [
			'penindakan' => 'p2vue.penindakan'
		];

		$token = $request->bearerToken();
        $this->sso->setToken($token);

		$data = $this->sso->getUserByRole([$roles[$role]], false);
		return $data;
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
