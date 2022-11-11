<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokContohResource;
use App\Http\Resources\DokContohTableResource;
use App\Models\DokContoh;
use App\Traits\DokumenTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokContohController extends Controller
{
	use DokumenTrait;

	public function __construct()
	{
		$this->doc_type = 'contoh';
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
		$all_contoh = DokContoh::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$contoh_list = DokContohTableResource::collection($all_contoh);
		return $contoh_list;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$contoh = new DokContohResource(DokContoh::findOrFail($id));
		return $contoh;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function display($id)
	{
		$contoh = new DokContohResource(DokContoh::findOrFail($id), 'display');
		return $contoh;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function objek($id)
	{
		$contoh = new DokContohResource(DokContoh::findOrFail($id), 'objek');
		return $contoh;
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
			'sprint.id' => 'required|integer',
			'lokasi' => 'required',
			'saksi.id' => 'nullable|integer',
			'petugas1.user_id' => 'required|integer',
			'petugas2.user_id' => 'nullable|integer',
		]);
	}

	/**
	 * Prepare data titip
	 * 
	 * @param  \Illuminate\Http\Request  $request
	 * @param String $state
	 * @return Array
	 */
	private function prepareData(Request $request, String $state='insert')
	{
		$no_dok_lengkap = $this->tipe_surat . '-     ' . $this->agenda_dok;
		
		$data_contoh = [
			'sprint_id' => $request->sprint['id'],
			'lokasi' => $request->lokasi,
			'saksi_id' => $request->saksi['id'],
			'petugas1_id' => $request->petugas1['user_id'],
			'petugas2_id' => $request->petugas2['user_id'],
		];

		if ($state == 'insert') {
			$data_contoh['agenda_dok'] = $this->agenda_dok;
			$data_contoh['no_dok_lengkap'] = $no_dok_lengkap;
			$data_contoh['kode_status'] = 100;
		};

		return $data_contoh;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		// Validate data contoh
		$this->validateData($request);

		DB::beginTransaction();
		try {
			// Save data titip
			$data_contoh = $this->prepareData($request, 'insert');
			$contoh = DokContoh::create($data_contoh);

			// Commit store query
			DB::commit();

			// Return BA Contoh
			$contoh_resource = new DokContohResource(DokContoh::findOrFail($contoh->id));
			return $contoh_resource;
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
		$is_unpublished = $this->checkUnpublished(DokContoh::class, $id);

		if ($is_unpublished) {
			DB::beginTransaction();

			try {
				// Validate data BA Contoh
				$this->validateData($request);
	
				// Update BA Contoh
				$data_contoh = $this->prepareData($request, 'update');
				DokContoh::where('id', $id)->update($data_contoh);
	
				// Commit query
				DB::commit();
	
				// Return BA Contoh
				$contoh_resource = new DokContohResource(DokContoh::findOrFail($id));
				return $contoh_resource;
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
			$this->getDocument(DokContoh::class, $id);
			$this->getCurrentDate();
			$number = $this->getNewDocNumber(DokContoh::class);

			$this->doc->update(['tanggal_dokumen' => $this->tanggal]);
			$this->updateDocNumberAndYear($number, $this->tipe_surat, true);

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
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		DB::beginTransaction();
		try {
			$is_unpublished = $this->checkUnpublished(DokContoh::class, $id);
			if ($is_unpublished) {
				DokContoh::find($id)->delete();
			}
			
			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}
}
