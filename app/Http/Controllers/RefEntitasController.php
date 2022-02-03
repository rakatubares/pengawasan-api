<?php

namespace App\Http\Controllers;

use App\Http\Resources\RefEntitasResource;
use App\Models\RefEntitas;
use Illuminate\Http\Request;

class RefEntitasController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
			'nama' => 'required',
			'jenis_identitas' => 'required',
			'nomor_identitas' => 'required'
		]);

		$insert_result = RefEntitas::create([
			'nama' => $request->nama,
			'jenis_kelamin' => $request->jenis_kelamin,
			'tempat_lahir' => $request->tempat_lahir,
			'tanggal_lahir' => $request->tanggal_lahir,
			'warga_negara' => $request->warga_negara,
			'agama' => $request->agama,
			'jenis_identitas' => $request->jenis_identitas,
			'nomor_identitas' => $request->nomor_identitas,
			'pekerjaan' => $request->pekerjaan,
			'alamat' => $request->alamat,
			'nomor_telepon' => $request->nomor_telepon,
			'email' => $request->email
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
        $entitas = new RefEntitasResource(RefEntitas::find($id));
		return $entitas;
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
