<?php

namespace App\Http\Controllers\Entitas;

use App\Http\Controllers\Controller;
use App\Http\Resources\Entitas\EntitasBadanHukumResource;
use App\Models\Entitas\EntitasBadanHukum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntitasBadanHukumController extends Controller
{
    public function search(Request $request) 
	{
		$search = "%{$request->search}%";
		$search_result = EntitasBadanHukum::where('nama', 'like', $search)
			->orderBy('nama')
			->take(5)
			->get();
		$search_list = EntitasBadanHukumResource::collection($search_result);
		return $search_list;
	}

	public function show($entity_id) {
		$entity = EntitasBadanHukum::findOrFail($entity_id);
		return new EntitasBadanHukumResource($entity);
	}

	/*
	 |--------------------------------------------------------------------------
	 | Data modify functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Validate request
	 * 
	 * @param  \Illuminate\Http\Request  $request
	 */
	public function validateData(Request $request) {
		$request->validate([
			'nama' => 'required',
			'email=' => 'nullable|email:rfc,dns',
		]);
	}

	/**
	 * Validate request
	 * 
	 * @param  \Illuminate\Http\Request  $request
	 */
	public function prepareData(Request $request) {
		$data = [];
		$data['nama'] = $request->nama;
		$data['alamat'] = $request->alamat;
		$data['nomor_telepon'] = $request->nomor_telepon;
		$data['email'] = $request->email;
		return $data;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		// return $request;
		
		DB::beginTransaction();
		try {
			$this->validateData($request);
			$data = $this->prepareData($request);

			// Save entity
			$entitas = EntitasBadanHukum::create($data);

			// Save identities
			if ($request->has('identitas')) {
				app(EntitasIdentitasController::class)->saveIdentitas($entitas, $request->identitas);
			}

			// Commit query
			DB::commit();

			// Return data resource
			return new EntitasBadanHukumResource($entitas);
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		DB::beginTransaction();
		try {
			$this->validateData($request);
			$data = $this->prepareData($request);

			// Get existing data
			$entitas = EntitasBadanHukum::findOrFail($id);

			// Update data
			$entitas->update($data);

			// Update identities
			app(EntitasIdentitasController::class)->updateIdentitas($entitas, $request->identitas);

			// Commit query
			DB::commit();

			// Return data resource
			return $this->show($id);
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}
}
