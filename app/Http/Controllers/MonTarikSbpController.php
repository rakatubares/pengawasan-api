<?php

namespace App\Http\Controllers;

use App\Http\Resources\MonTarikSbpResource;
use App\Models\DokSbp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonTarikSbpController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$all_sbp = DokSbp::whereNotIn('kode_status', [100, 300])
			->orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$sbp_list = MonTarikSbpResource::collection($all_sbp);
		return $sbp_list;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$sbp = new MonTarikSbpResource(DokSbp::findOrFail($id));
		return $sbp;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
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
		$request->validate([
			'tanggal_penarikan' => 'required|date',
			'petugas_penarikan.user_id' => 'required|integer',
		]);

		$data_tarik = [
			'status_penarikan' => true,
			'tanggal_penarikan' => $request->tanggal_penarikan,
			'lokasi_penyimpanan' => $request->lokasi_penyimpanan,
			'keterangan_penarikan' => $request->keterangan_penarikan,
			'petugas_penarikan_id' => $request->petugas_penarikan['user_id']
		];

		DokSbp::find($id)->update($data_tarik);

		$sbp = new MonTarikSbpResource(DokSbp::findOrFail($id));
		return $sbp;
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
