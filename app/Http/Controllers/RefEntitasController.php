<?php

namespace App\Http\Controllers;

use App\Http\Resources\RefEntitasResource;
use App\Models\RefEntitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RefEntitasController extends Controller
{
	/*
	 |--------------------------------------------------------------------------
	 | DISPLAY functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$entitas = new RefEntitasResource(RefEntitas::find($id));
		return $entitas;
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
		$search_result = RefEntitas::where('nama', 'like', $search)
			->orderBy('nama')
			->take(10)
			->get();
		$search_list = RefEntitasResource::collection($search_result);
		return $search_list;
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
	public function validateData(Request $request)
	{
		$request->validate([
			'nama' => 'required',
			'jenis_identitas' => 'required',
			'nomor_identitas' => 'required'
		]);
	}

	/**
	 * Prepare data from request to array
	 * 
	 * @param  \Illuminate\Http\Request  $request
	 */
	public function prepareData(Request $request)
	{
		$data_entitas = [
			'nama' => $request->nama,
			'alias' => $request->alias,
			'jenis_kelamin' => $request->jenis_kelamin,
			'tempat_lahir' => $request->tempat_lahir,
			'tanggal_lahir' => $request->tanggal_lahir,
			'kd_warga_negara' => $request->warga_negara['kode_2'],
			'agama' => $request->agama,
			'jenis_identitas' => $request->jenis_identitas,
			'penerbit_identitas' => $request->penerbit_identitas,
			'tempat_identitas_terbit' => $request->tempat_identitas_terbit,
			'alamat' => $request->alamat,
			'alamat_tinggal' => $request->alamat_tinggal,
			'nomor_identitas' => $request->nomor_identitas,
			'pekerjaan' => $request->pekerjaan,
			'nomor_telepon' => $request->nomor_telepon,
			'email' => $request->email
		];

		return $data_entitas;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$this->validateData($request);

		DB::beginTransaction();
		try {
			$data_entitas = $this->prepareData($request);
			$insert_result = RefEntitas::create($data_entitas);
			DB::commit();

			return new RefEntitasResource(RefEntitas::find($insert_result->id));
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
	public function update(Request $request, $id)
	{
		$this->validateData($request);

		DB::beginTransaction();
		try {
			$data_entitas = $this->prepareData($request);
			RefEntitas::find($id)->update($data_entitas);
			DB::commit();
			
			return new RefEntitasResource(RefEntitas::find($id));
		} catch (\Throwable $th) {
			DB::rollBack();
		}
	}
}
