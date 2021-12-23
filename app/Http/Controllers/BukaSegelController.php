<?php

namespace App\Http\Controllers;

use App\Http\Resources\BukaSegelResource;
use App\Http\Resources\BukaSegelTableResource;
use App\Models\BukaSegel;
use App\Models\Segel;
use App\Traits\DokumenTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukaSegelController extends Controller
{
	use DokumenTrait;
	
	private $tipe_dok = 'BA';
	private $agenda_dok = '/BUKA SEGEL/KPU.03/BD.05/';

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
		$all_buka_segel = BukaSegel::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$buka_segel_list = BukaSegelTableResource::collection($all_buka_segel);
		return $buka_segel_list;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$buka_segel = new BukaSegelResource(BukaSegel::findOrFail($id));
		return $buka_segel;
	}

	/*
	 |--------------------------------------------------------------------------
	 | Data modify functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Validate request
	 */
	private function validateBukaSegel(Request $request)
	{
		$request->validate([
			'main.data.sprint.id' => 'required|integer',
			'main.data.jenis_segel' => 'required',
			'main.data.jumlah_segel' => 'required|integer',
			'main.data.nomor_segel' => 'required',
			'main.data.saksi.id' => 'required|integer',
			'main.data.petugas1.user_id' => 'required'
		]);
	}

	private function prepareData(Request $request, $state='insert')
	{
		$no_dok_lengkap = $this->tipe_dok . '-' . $this->agenda_dok;
		$tanggal_segel = date('Y-m-d', strtotime($request->main['data']['tanggal_segel']));

		$data_buka_segel = [
			'sprint_id' => $request->main['data']['sprint']['id'],
			'nomor_segel' => $request->main['data']['nomor_segel'],
			'tanggal_segel' => $tanggal_segel,
			'jenis_segel' => $request->main['data']['jenis_segel'],
			'jumlah_segel' => $request->main['data']['jumlah_segel'],
			'satuan_segel' => $request->main['data']['satuan_segel'],
			'tempat_segel' => $request->main['data']['tempat_segel'],
			'saksi_id' => $request->main['data']['saksi']['id'],
			'petugas1_id' => $request->main['data']['petugas1']['user_id'],
			'petugas2_id' => $request->main['data']['petugas2']['user_id'],
		];

		if ($state == 'insert') {
			$data_buka_segel['agenda_dok'] = $this->agenda_dok;
			$data_buka_segel['no_dok_lengkap'] = $no_dok_lengkap;
			$data_buka_segel['kode_status'] = 100;
		}

		return $data_buka_segel;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{ 
		// Validate data buka segel
		$this->validateBukaSegel($request);

		DB::beginTransaction();
		try {
			// Save data buka segel
			$data_buka_segel = $this->prepareData($request, 'insert');
			$buka_segel = BukaSegel::create($data_buka_segel);

			// Save data penindakan and create object relation
			$segel_id = $request->dokumen['segel']['id'];
			if ($segel_id == null) {
				$this->storePenindakan($request, 'bukasegel', $buka_segel->id, true);
			} else {
				$segel = Segel::find($segel_id);
				$penindakan_id = $segel->penindakan->id;
				$this->createRelation('penindakan', $penindakan_id, 'bukasegel', $buka_segel->id);
				$segel->update(['kode_status' => 101]);
			}

			// Commit store query
			DB::commit();

			// Return created buka segel
			$buka_segel_resource = new BukaSegelResource(BukaSegel::findOrFail($buka_segel->id));
			return $buka_segel_resource;
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
	public function update(Request $request, $id, $linked_doc=false)
	{
		// Check if document is not published yet
		$is_unpublished = $this->checkUnpublished(BukaSegel::class, $id);

		// Update if not published
		if ($is_unpublished) {
			// Validate data buka segel
			$this->validateBukaSegel($request);

			DB::beginTransaction();
			try {
				// Update BA Segel
				$data_buka_segel = $this->prepareData($request, 'update');
				BukaSegel::where('id', $id)->update($data_buka_segel);

				// Commit store query
				DB::commit();

				// Return updated SBP
				$buka_segel_resource = new BukaSegelResource(BukaSegel::findOrFail($id));
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
			$this->getDocument(BukaSegel::class, $id);
			$this->getCurrentDate();
			$number = $this->getNewDocNumber(BukaSegel::class);
			$this->updateDocNumberAndYear($number, $this->tipe_dok, true);

			$segel = $this->doc->penindakan->segel;
			if ($segel != null) {
				$segel->update(['kode_status' => 201]);
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
			$is_unpublished = $this->checkUnpublished(BukaSegel::class, $id);
			if ($is_unpublished) {
				BukaSegel::find($id)->delete();
			}
			
			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}

	
}
