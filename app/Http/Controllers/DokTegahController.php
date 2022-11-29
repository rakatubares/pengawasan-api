<?php

namespace App\Http\Controllers;

use App\Http\Resources\DetailStatusResource;
use App\Http\Resources\DokTegahResource;
use App\Http\Resources\DokTegahTableResource;
use App\Models\DokTegah;
use App\Traits\DokumenTrait;
use App\Traits\SwitcherTrait;
use Illuminate\Http\Request;

class DokTegahController extends Controller
{
	use DokumenTrait;
	use SwitcherTrait;

	public function __construct()
	{
		$this->doc_type = 'tegah';
		$this->tipe_surat = $this->switchObject($this->doc_type, 'tipe_dok');
		$this->agenda_dok = $this->switchObject($this->doc_type, 'agenda');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$all_tegah = DokTegah::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$tegah_list = DokTegahTableResource::collection($all_tegah);
		return $tegah_list;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
        $no_dok_lengkap = $this->tipe_surat . '-     ' . $this->agenda_dok;

		$insert_result = DokTegah::create([
			'agenda_dok' => $this->agenda_dok,
			'no_dok_lengkap' => $no_dok_lengkap,
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
		$tegah = new DokTegahResource(DokTegah::findOrFail($id));
		return $tegah;
	}

	/**
	 * Display available details
	 * 
	 * @param int $id
	 */
	public function showComplete($id)
	{
		$tegah = new DokTegahResource(DokTegah::findOrFail($id), 'complete');
		return $tegah;
	}

	/**
	 * Display available details
	 * 
	 * @param int $id
	 */
	public function showDetails($id)
	{
		$tegah_details = new DetailStatusResource(DokTegah::findOrFail($id));
		return $tegah_details;
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
		$is_unpublished = $this->checkUnpublished(DokTegah::class, $id);

		if ($is_unpublished) {
			$request->validate([
				'sprint.id' => 'required|integer',
				'saksi.id' => 'integer',
				'petugas1.user_id' => 'required'
			]);

			$update_result = DokTegah::where('id', $id)
				->update([
					'sprint_id' => $request->sprint['id'],
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
		$result = $this->deleteDocument(DokTegah::class, $id);
		return $result;
	}

	/**
	 * Terbitkan penomoran dokumen
	 * 
	 * @param  int  $id
	 */
	public function publish($id)
	{
		$doc = $this->publishDocument(DokTegah::class, $id, $this->tipe_dok);
		return $doc;
	}
}
