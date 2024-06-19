<?php

namespace App\Http\Controllers;

use App\Http\Resources\CacahResource;
use App\Http\Resources\CacahTableResource;
use App\Models\Cacah;
use App\Traits\DokumenTrait;
use Illuminate\Http\Request;

class CacahController extends Controller
{
	use DokumenTrait;

	private $tipe_dok = 'BA';
	private $agenda_dok = '/KPU.03/BD.05/CACAH/';

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$all_cacah = Cacah::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$cacah_list = CacahTableResource::collection($all_cacah);
		return $cacah_list;
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
			'tempat_cacah' => 'required',
			'pejabat_st_id' => 'required|integer',
			'nomor_st' => 'required',
			'tanggal_st' => 'required|date',
			'tanggal_penindakan' => 'required|date',
			'barang_penindakan' => 'required',
			'tempat_penyimpanan' => 'required',
			'petugas_penindakan_1_id' => 'required|integer'
		]);

		$no_dok_lengkap = $this->tipe_dok . '-' . $this->agenda_dok;
		$tanggal_st = date('Y-m-d', strtotime($request->tanggal_st));
		$tanggal_penindakan = date('Y-m-d', strtotime($request->tanggal_penindakan));

		$insert_result = Cacah::create([
			'agenda_dok' => $this->agenda_dok,
			'no_dok_lengkap' => $no_dok_lengkap,
			'tempat_cacah' => $request->tempat_cacah,
			'pejabat_st_id' => $request->pejabat_st['id'],
			'nomor_st' => $request->nomor_st,
			'tanggal_st' => $tanggal_st,
			'tempat_penindakan' => $request->tempat_penindakan,
			'tanggal_penindakan' => $tanggal_penindakan,
			'barang_penindakan' => $request->barang_penindakan,
			'tempat_penyimpanan' => $request->tempat_penyimpanan,
			'petugas_penindakan_1_id' => $request->petugas_penindakan_1['user_id'],
			'petugas_penindakan_2_id' => $request->petugas_penindakan_2['user_id'],
			'petugas_penyidikan_1_id' => $request->petugas_penyidikan_1['user_id'],
			'petugas_penyidikan_2_id' => $request->petugas_penyidikan_2['user_id'],
			'kode_status' => 100,
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
		$cacah = new CacahResource(Cacah::findOrFail($id));
		return $cacah;
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
		// Check if document is not published yet
		$is_unpublished = $this->checkUnpublished(Segel::class, $id);

		// Update if not published
		if ($is_unpublished) {
			$request->validate([
				'tempat_cacah' => 'required',
				'pejabat_st_id' => 'required|integer',
				'nomor_st' => 'required',
				'tanggal_st' => 'required|date',
				'tanggal_penindakan' => 'required|date',
				'barang_penindakan' => 'required',
				'tempat_penyimpanan' => 'required',
				'petugas_penindakan_1_id' => 'required|integer'
			]);

			$tanggal_st = date('Y-m-d', strtotime($request->tanggal_st));
			$tanggal_penindakan = date('Y-m-d', strtotime($request->tanggal_penindakan));

			$update_result = Cacah::create([
				'tempat_cacah' => $request->tempat_cacah,
				'pejabat_st_id' => $request->pejabat_st['id'],
				'nomor_st' => $request->nomor_st,
				'tanggal_st' => $tanggal_st,
				'tempat_penindakan' => $request->tempat_penindakan,
				'tanggal_penindakan' => $tanggal_penindakan,
				'barang_penindakan' => $request->barang_penindakan,
				'tempat_penyimpanan' => $request->tempat_penyimpanan,
				'petugas_penindakan_1_id' => $request->petugas_penindakan_1['user_id'],
				'petugas_penindakan_2_id' => $request->petugas_penindakan_2['user_id'],
				'petugas_penyidikan_1_id' => $request->petugas_penyidikan_1['user_id'],
				'petugas_penyidikan_2_id' => $request->petugas_penyidikan_2['user_id'],
				'kode_status' => 101,
			]);

			$result = $update_result;
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan, tidak dapat mengupdate dokumen.'], 422);
		}

		return $result;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$result = $this->deleteDocument(Cacah::class, $id);
		return $result;
	}

	/**
	 * Terbitkan penomoran dokumen
	 * 
	 * @param  int  $id
	 */
	public function publish($id)
	{
		$doc = $this->publishDocument(Cacah::class, $id, $this->tipe_dok);
		return $doc;
	}
}
