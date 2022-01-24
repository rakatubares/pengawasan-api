<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokTitipResource;
use App\Http\Resources\DokTitipTableResource;
use App\Models\DokSegel;
use App\Models\DokTitip;
use App\Traits\DokumenTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokTitipController extends Controller
{
	use DokumenTrait;

	private $tipe_dok = 'BA';
	private $agenda_dok = '/TITIP/KPU.03/BD.05/';

	/*
	 |--------------------------------------------------------------------------
	 | DISPLAY functions
	 |--------------------------------------------------------------------------
	 */

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
	 * Display object type
	 * 
	 * @param int $id
	 */
	public function show($id)
	{
		$titip = new DokTitipResource(DokTitip::find($id));
		return $titip;
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

	/*
	 |--------------------------------------------------------------------------
	 | Data modify functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Validate request
	 */
	private function validateData(Request $request)
	{
		$request->validate([
			'sprint.id' => 'required|integer',
			'segel.id' => 'required|integer',
			'lokasi_titip' => 'required',
			'penerima.id' => 'required|integer',
			'saksi.id' => 'nullable|integer',
			'petugas1.user_id' => 'required|integer',
			'petugas2.user_id' => 'nullable|integer',
		]);
	}

	/**
	 * Prepare data titip
	 */
	private function prepareData(Request $request, $state='insert')
	{
		$no_dok_lengkap = $this->tipe_dok . '-' . $this->agenda_dok;

		$data_titip = [
			'sprint_id' => $request->sprint['id'],
			'lokasi_titip' => $request->lokasi_titip,
			'penerima_id' => $request->penerima['id'],
			'saksi_id' => $request->saksi['id'],
			'petugas1_id' => $request->petugas1['user_id'],
			'petugas2_id' => $request->petugas2['user_id'],
		];

		if ($state == 'insert') {
			$data_titip['agenda_dok'] = $this->agenda_dok;
			$data_titip['no_dok_lengkap'] = $no_dok_lengkap;
			$data_titip['kode_status'] = 100;
		};

		return $data_titip;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		// Validate data titip
		$this->validateData($request);

		DB::beginTransaction();
		try {
			// Cek titip
			$segel = DokSegel::find($request->segel['id']);
			$titip = $segel->titip;

			if ($titip == null) {
				// Save data titip
				$data_titip = $this->prepareData($request, 'insert');
				$titip = DokTitip::create($data_titip);

				// Create relation
				$this->createRelation('segel', $segel->id, 'titip', $titip->id);

				// Change BA Titip status
				$segel->update(['kode_status' => 105]);

				// Commit store query
				DB::commit();

				// Return LPHP
				$titip_resource = new DokTitipResource(DokTitip::findOrFail($titip->id), 'form');
				return $titip_resource;
			} else {
				$result = response()->json(['error' => 'BA Segel telah dibuat BA Penitipan.'], 422);
				return $result;
			}
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
		// Check if document is not published yet
		$is_unpublished = $this->checkUnpublished(DokTitip::class, $id);

		// Update if not published
		if ($is_unpublished) {
			DB::beginTransaction();

			try {
				// Validate data segel
				$this->validateData($request);

				// Update BA Titip
				$data_titip = $this->prepareData($request, 'update');
				DokTitip::where('id', $id)->update($data_titip);

				// Commit store query
				DB::commit();

				// Return updated SBP
				$titip_resource = new DokTitipResource(DokTitip::findOrFail($id), 'form');
				$result = $titip_resource;
			} catch (\Throwable $th) {
				DB::rollBack();
				throw $th;
			}
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan, tidak dapat mengupdate dokumen.'], 422);
		}

		return $result;
	}

	/**
	 * Terbitkan penomoran dokumen
	 * 
	 * @param  int  $id
	 */
	public function publish($id)
	{
		DB::beginTransaction();
		try {
			$this->getDocument(DokTitip::class, $id);
			$this->getCurrentDate();
			$number = $this->getNewDocNumber(DokTitip::class);

			$this->doc->update(['tanggal_dokumen' => $this->tanggal]);
			$this->updateDocNumberAndYear($number, $this->tipe_dok, true);

			$segel = $this->doc->segel;
			if ($segel != null) {
				$segel->update(['kode_status' => 205]);
			}
			
			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}

	/*
	 |--------------------------------------------------------------------------
	 | Destroy functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		DB::beginTransaction();
		try {
			$is_unpublished = $this->checkUnpublished(DokTitip::class, $id);
			if ($is_unpublished) {
				DokTitip::find($id)->delete();
			}
			
			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}
}
