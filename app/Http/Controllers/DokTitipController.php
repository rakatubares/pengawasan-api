<?php

namespace App\Http\Controllers;

use App\Http\Resources\DetailStatusResource;
use App\Http\Resources\DokTitipResource;
use App\Http\Resources\DokTitipTableResource;
use App\Models\DokTitip;
use App\Traits\DokumenTrait;
use Illuminate\Http\Request;

class DokTitipController extends Controller
{
	use DokumenTrait;

	private $tipe_dok = 'BA';
	private $agenda_dok = '/TITIP/KPU.03/BD.05/';

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$all_titip = DokTitip::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$titip_list = DokTitipTableResource::collection($all_titip);
		return $titip_list;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function display($id)
	{
		$titip = new DokTitipResource(DokTitip::findOrFail($id), 'display');
		return $titip;
	}

	/**
	 * Display the specified resource form input form.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function form($id)
	{
		$titip = new DokTitipResource(DokTitip::findOrFail($id), 'form');
		return $titip;
	}

	/**
	 * Display object type
	 * 
	 * @param int $id
	 */
	public function objek($id)
	{
		$objek = new DokTitipResource(DokTitip::find($id), 'objek');
		return $objek;
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
			'sprint.id' => 'required|integer',
			'lokasi_titip' => 'required',
			'tanggal_segel' => 'date',
			'penerima.id' => 'required|integer',
			'saksi.id' => 'integer',
			'petugas1.user_id' => 'required'
		]);

        $no_dok_lengkap = $this->tipe_dok . '-' . $this->agenda_dok; 

		$insert_result = DokTitip::create([
			'agenda_dok' => $this->agenda_dok,
			'no_dok_lengkap' => $no_dok_lengkap,
			'sprint_id' => $request->sprint['id'],
			'lokasi_titip' => $request->lokasi_titip,
			'nomor_ba_segel' => $request->nomor_ba_segel,
			'tanggal_segel' => $request->tanggal_segel,
			'penerima_id' => $request->penerima['id'],
			'saksi_id' => $request->saksi['id'],
			'petugas1_id' => $request->petugas1['user_id'],
			'petugas2_id' => $request->petugas2['user_id'],
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
		$titip = new DokTitipResource(DokTitip::findOrFail($id));
		return $titip;
	}

	/**
	 * Display available details
	 * 
	 * @param int $id
	 */
	public function showComplete($id)
	{
		$titip = new DokTitipResource(DokTitip::findOrFail($id), 'complete');
		return $titip;
	}

	/**
	 * Display available details
	 * 
	 * @param int $id
	 */
	public function showDetails($id)
	{
		$titip_details = new DetailStatusResource(DokTitip::findOrFail($id));
		return $titip_details;
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
		$is_unpublished = $this->checkUnpublished(DokTitip::class, $id);

		if ($is_unpublished) {
			$request->validate([
				'sprint.id' => 'required|integer',
				'lokasi_titip' => 'required',
				'tanggal_segel' => 'date',
				'penerima.id' => 'required|integer',
				'saksi.id' => 'integer',
				'petugas1.user_id' => 'required'
			]);

			$tanggal_segel = date('Y-m-d', strtotime($request->tanggal_segel));

			$update_result = DokTitip::where('id', $id)
				->update([
					'sprint_id' => $request->sprint['id'],
					'lokasi_titip' => $request->lokasi_titip,
					'nomor_ba_segel' => $request->nomor_ba_segel,
					'tanggal_segel' => $tanggal_segel,
					'penerima_id' => $request->penerima['id'],
					'saksi_id' => $request->saksi['id'],
					'petugas1_id' => $request->petugas1['user_id'],
					'petugas2_id' => $request->petugas2['user_id'],
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
		$result = $this->deleteDocument(DokTitip::class, $id);
		return $result;
	}

	/**
	 * Terbitkan penomoran dokumen
	 * 
	 * @param  int  $id
	 */
	public function publish($id)
	{
		$doc = $this->publishDocument(DokTitip::class, $id, $this->tipe_dok);
		return $doc;
	}
}
