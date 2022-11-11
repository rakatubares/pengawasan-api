<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokBastResource;
use App\Http\Resources\DokBastTableResource;
use App\Models\DokBast;
use App\Traits\DokumenTrait;
use App\Traits\SwitcherTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokBastController extends Controller
{
	use DokumenTrait;
	use SwitcherTrait;

	public function __construct()
	{
		$this->doc_type = 'bast';
		$this->tipe_surat = $this->switchObject($this->doc_type, 'tipe_dok');
		$this->agenda_dok = $this->switchObject($this->doc_type, 'agenda');
	}

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
		$all_bast = DokBast::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$bast_list = DokBastTableResource::collection($all_bast);
		return $bast_list;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$bast = new DokBastResource(DokBast::findOrFail($id));
		return $bast;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function display($id)
	{
		$bast = new DokBastResource(DokBast::findOrFail($id), 'display');
		return $bast;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function form($id)
	{
		$bast = new DokBastResource(DokBast::findOrFail($id), 'form');
		return $bast;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function objek($id)
	{
		$bast = new DokBastResource(DokBast::findOrFail($id), 'objek');
		return $bast;
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
	private function validateData(Request $request)
	{
		$request->validate([
			'dalam_rangka' => 'required',
			'yang_menyerahkan.type' => 'required',
			'yang_menyerahkan.data.id' => 'required|integer',
			'yang_menyerahkan.atas_nama' => 'required',
			'yang_menerima.type' => 'required',
			'yang_menerima.data.id' => 'required|integer',
			'yang_menerima.atas_nama' => 'required',
		]);
	}

	/**
	 * Prepare data SBP from request to array
	 * 
	 * @param Request $request
	 * @param String $state
	 * @return Array
	 */
	private function prepareData(Request $request, $state='insert')
	{
		$no_dok_lengkap = $this->tipe_surat . '-' . '      ' . $this->agenda_dok;

		// Data BAST
		$data_bast = [
			'dalam_rangka' => $request->dalam_rangka,
			'yang_menerima_type' => $request->yang_menerima['type'],
			'yang_menerima_id'  => $request->yang_menerima['data']['id'],
			'atas_nama_yang_menerima'  => $request->yang_menerima['atas_nama'],
			'yang_menyerahkan_type' => $request->yang_menyerahkan['type'],
			'yang_menyerahkan_id'  => $request->yang_menyerahkan['data']['id'],
			'atas_nama_yang_menyerahkan'  => $request->yang_menyerahkan['atas_nama'],
		];

		if ($state == 'insert') {
			$data_bast['agenda_dok'] = $this->agenda_dok;
			$data_bast['no_dok_lengkap'] = $no_dok_lengkap;
			$data_bast['kode_status'] = 100;
		}

		return $data_bast;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		// Validate data BAST
		$this->validateData($request);

		DB::beginTransaction();
		try {
			// Save data BAST
			$data_bast = $this->prepareData($request, 'insert');
			$bast = DokBast::create($data_bast);

			// Commit store query
			DB::commit();

			// Return created BAST
			$bast_resource = new DokBastResource(DokBast::findOrFail($bast->id), 'form');
			return $bast_resource;
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
		// Check if document is published
		$is_unpublished = $this->checkUnpublished(DokBast::class, $id);

		// Update if not published
		if ($is_unpublished) {
			// Validate data
			$this->validateData($request);

			DB::beginTransaction();
			try {
				// update BAST
				$data_bast = $this->prepareData($request, 'update');
				DokBast::where('id', $id)->update($data_bast);

				// Commit query
				DB::commit();

				// Return updated BAST
				$result = new DokBastResource(DokBast::find($id), 'form');
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
			$this->getCurrentDate();
			$doc = $this->publishDocument($this->doc_type, $id, $this->tahun);

			DB::commit();

			return $doc;
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
		
	}

	/*
	 |--------------------------------------------------------------------------
	 | Data delete functions
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
		$is_unpublished = $this->checkUnpublished(DokBast::class, $id);
		if ($is_unpublished) {
			DokBast::find($id)->delete();
		}
	}
}
