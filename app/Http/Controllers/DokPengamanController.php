<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokPengamanResource;
use App\Http\Resources\DokPengamanTableResource;
use App\Models\DokPengaman;
use App\Traits\DokumenTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokPengamanController extends Controller
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
		$all_pengaman = DokPengaman::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$pengaman_list = DokPengamanTableResource::collection($all_pengaman);
		return $pengaman_list;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$segel = new DokPengamanResource(DokPengaman::findOrFail($id));
		return $segel;
	}

	/**
	 * Display object type
	 * 
	 * @param int $id
	 */
	public function basic($id)
	{
		$objek = new DokPengamanResource(DokPengaman::find($id), 'basic');
		return $objek;
	}

	/**
	 * Display object type
	 * 
	 * @param int $id
	 */
	public function objek($id)
	{
		$objek = new DokPengamanResource(DokPengaman::find($id), 'objek');
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
			'main.data.jenis_pengaman' => 'required',
			'main.data.jumlah_pengaman' => 'required|integer',
		]);
	}

	/**
	 * Prepare data segel
	 */
	private function prepareData(Request $request, $state='insert')
	{
		$no_dok_lengkap = $this->tipe_dok . '-' . $this->agenda_dok; 

		$data_pengaman = [
			'alasan_pengamanan' => $request->main['data']['alasan_pengamanan'],
			'keterangan' => $request->main['data']['keterangan'],
			'jenis_pengaman' => $request->main['data']['jenis_pengaman'],
			'jumlah_pengaman' => $request->main['data']['jumlah_pengaman'],
			'satuan_pengaman' => $request->main['data']['satuan_pengaman'],
			'tempat_pengaman' => $request->main['data']['tempat_pengaman'],
		];

		if ($state == 'insert') {
			$data_pengaman['agenda_dok'] = $this->agenda_dok;
			$data_pengaman['no_dok_lengkap'] = $no_dok_lengkap;
			$data_pengaman['nomor_pengaman'] = $no_dok_lengkap;
			$data_pengaman['kode_status'] = 100;
		}

		return $data_pengaman;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		// Validate data
		$this->validatePenindakan($request);
		$this->validateData($request);

		DB::beginTransaction();
		try {
			// Save data BA Tanda Pengaman
			$data_pengaman = $this->prepareData($request, 'insert');
			$pengaman = DokPengaman::create($data_pengaman);

			// Save data penindakan
			$this->storePenindakan($request, 'pengaman', $pengaman->id);

			// Commit queries
			DB::commit();

			// Return created pengaman
			$segel_resource = new DokPengamanResource(DokPengaman::findOrFail($pengaman->id));
			return $segel_resource;
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		// Check if document is not published yet
		$is_unpublished = $this->checkUnpublished(DokPengaman::class, $id);

		// Update if not published
		if ($is_unpublished) {
			DB::beginTransaction();

			try {
				// Validate data segel
				$this->validateData($request);

				// Update BA Segel
				$data_pengaman = $this->prepareData($request, 'update');
				DokPengaman::where('id', $id)->update($data_pengaman);

				// Update data penindakan if not from linked doc
				$this->validatePenindakan($request); 
				$this->updatePenindakan($request);

				// Commit store query
				DB::commit();

				// Return updated SBP
				$pengaman_resource = new DokPengamanResource(DokPengaman::findOrFail($id));
				$result = $pengaman_resource;
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
			// Check penindakan date
			$year = $this->datePenindakan(DokPengaman::class, $id);
		
			// Publish each document
			$this->publishDocument('pengaman', $id, $year);

			// Commit transaction
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
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		DB::beginTransaction();
		try {
			$is_unpublished = $this->checkUnpublished(DokPengaman::class, $id);
			if ($is_unpublished) {
				DokPengaman::find($id)->delete();
			}
			
			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}
}
