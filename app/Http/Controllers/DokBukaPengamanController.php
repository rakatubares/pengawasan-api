<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokBukaPengamanResource;
use App\Http\Resources\DokBukaPengamanTableResource;
use App\Models\DokBukaPengaman;
use App\Models\DokPengaman;
use App\Traits\DokumenTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokBukaPengamanController extends Controller
{
	use DokumenTrait;

	private $tipe_dok = 'BA';
	private $agenda_dok = '/TANDAPENGAMAN/KPU.03/BD.05/';

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
		$all_buka_pengaman = DokBukaPengaman::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$buka_pengaman_list = DokBukaPengamanTableResource::collection($all_buka_pengaman);
		return $buka_pengaman_list;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$segel = new DokBukaPengamanResource(DokBukaPengaman::findOrFail($id));
		return $segel;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function basic($id)
	{
		$segel = new DokBukaPengamanResource(DokBukaPengaman::findOrFail($id), 'basic');
		return $segel;
	}

	/**
	 * Display object type
	 * 
	 * @param int $id
	 */
	public function objek($id)
	{
		$objek = new DokBukaPengamanResource(DokBukaPengaman::find($id), 'objek');
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
			'main.data.sprint.id' => 'required|integer',
			'main.data.jenis_pengaman' => 'required',
			'main.data.jumlah_pengaman' => 'required|integer',
			'main.data.nomor_pengaman' => 'required',
			'main.data.saksi.id' => 'required|integer',
			'main.data.petugas1.user_id' => 'required'
		]);
	}

	private function prepareData(Request $request, $state='insert')
	{
		$no_dok_lengkap = $this->tipe_dok . '-' . $this->agenda_dok;
		$tanggal_pengaman = date('Y-m-d', strtotime($request->main['data']['tanggal_pengaman']));

		$data_buka_pengaman = [
			'sprint_id' => $request->main['data']['sprint']['id'],
			'nomor_pengaman' => $request->main['data']['nomor_pengaman'],
			'tanggal_pengaman' => $tanggal_pengaman,
			'jenis_pengaman' => $request->main['data']['jenis_pengaman'],
			'jumlah_pengaman' => $request->main['data']['jumlah_pengaman'],
			'satuan_pengaman' => $request->main['data']['satuan_pengaman'],
			'tempat_pengaman' => $request->main['data']['tempat_pengaman'],
			'dasar_pengamanan' => $request->main['data']['dasar_pengamanan'],
			'saksi_id' => $request->main['data']['saksi']['id'],
			'petugas1_id' => $request->main['data']['petugas1']['user_id'],
			'petugas2_id' => $request->main['data']['petugas2']['user_id'],
		];

		if ($state == 'insert') {
			$data_buka_pengaman['agenda_dok'] = $this->agenda_dok;
			$data_buka_pengaman['no_dok_lengkap'] = $no_dok_lengkap;
			$data_buka_pengaman['kode_status'] = 100;
		}

		return $data_buka_pengaman;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		// Validate data buka tanda pengaman
		$this->validateData($request);

		DB::beginTransaction();
		try {
			// Save data buka tanda pengaman
			$data_buka_pengaman = $this->prepareData($request, 'insert');
			$buka_pengaman = DokBukaPengaman::create($data_buka_pengaman);

			// Save data penindakan and create object relation
			$pengaman_id = $request->dokumen['pengaman']['id'];
			// var_dump($pengaman_id);
			if ($pengaman_id == null) {
				// echo 'pengaman is null';
				$this->storePenindakan($request, 'bukapengaman', $buka_pengaman->id, true);
			} else {
				// echo 'pengaman is not null';
				$pengaman = DokPengaman::find($pengaman_id);
				$penindakan_id = $pengaman->penindakan->id;
				$this->createRelation('penindakan', $penindakan_id, 'bukapengaman', $buka_pengaman->id);
				$pengaman->update(['kode_status' => 104]);
			}

			// Commit store query
			DB::commit();

			// Return created buka tanda pengaman
			$buka_pengaman_resource = new DokBukaPengamanResource(DokBukaPengaman::findOrFail($buka_pengaman->id));
			return $buka_pengaman_resource;
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
		$is_unpublished = $this->checkUnpublished(DokBukaPengaman::class, $id);

		// Update if not published
		if ($is_unpublished) {
			// Validate data buka tanda pengaman
			$this->validateData($request);

			DB::beginTransaction();
			try {
				// Update BA Buka Tanda Pengaman
				$data_buka_pengaman = $this->prepareData($request, 'update');
				DokBukaPengaman::where('id', $id)->update($data_buka_pengaman);

				// Commit store query
				DB::commit();

				// Return updated SBP
				$buka_segel_resource = new DokBukaPengamanResource(DokBukaPengaman::findOrFail($id));
				$result = $buka_segel_resource;
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
			$this->getDocument(DokBukaPengaman::class, $id);
			$this->getCurrentDate();
			$number = $this->getNewDocNumber(DokBukaPengaman::class);
			$this->updateDocNumberAndYear($number, $this->tipe_dok, true);

			$pengaman = $this->doc->penindakan->pengaman;
			if ($pengaman != null) {
				$pengaman->update(['kode_status' => 204]);
			}
			
			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}

	/*
	 |--------------------------------------------------------------------------
	 | Destroy function
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
			$is_unpublished = $this->checkUnpublished(DokBukaPengaman::class, $id);
			if ($is_unpublished) {
				DokBukaPengaman::find($id)->delete();
			}
			
			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}
}
