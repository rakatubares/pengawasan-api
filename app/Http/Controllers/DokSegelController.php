<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokSegelResource;
use App\Http\Resources\DokSegelTableResource;
use App\Models\DokSegel;
use App\Traits\DokumenTrait;
use App\Traits\SwitcherTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokSegelController extends Controller
{
	use DokumenTrait;
	use SwitcherTrait;

	public function __construct()
	{
		$this->doc_type = 'segel';
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
		$all_segel = DokSegel::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$segel_list = DokSegelTableResource::collection($all_segel);
		return $segel_list;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$segel = new DokSegelResource(DokSegel::findOrFail($id));
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
		$segel = new DokSegelResource(DokSegel::findOrFail($id), 'basic');
		return $segel;
	}

	/**
	 * Display object type
	 * 
	 * @param int $id
	 */
	public function objek($id)
	{
		$objek = new DokSegelResource(DokSegel::find($id), 'objek');
		return $objek;
	}

	/**
	 * Display resource based on search query
	 * 
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function search(Request $request)
	{
		$src = $request->src;
		$sta = $request->sta;
		$exc = $request->exc;

		$search = '%' . $src . '%';
		$status = $sta != null ? $sta : [200];

		$search_result = DokSegel::where(function ($query) use ($search, $status) {
				$query->where('no_dok_lengkap', 'like', $search)
					->whereIn('kode_status', $status);
			})
			->when($exc != null, function ($query) use ($exc)
			{
				return $query->orWhere('id', $exc);
			})
			->orderBy('created_at', 'desc')
			->orderBy('id', 'desc')
			->take(5)
			->get();
		$search_list = DokSegelTableResource::collection($search_result);
		return $search_list;
	}

	/*
	 |--------------------------------------------------------------------------
	 | Data modify functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Validate request
	 */
	private function validateSegel(Request $request)
	{
		$request->validate([
			'main.data.jenis_segel' => 'required',
			'main.data.jumlah_segel' => 'required|integer',
		]);
	}

	/**
	 * Prepare data segel
	 */
	private function prepareData(Request $request, $state='insert')
	{
		$no_dok_lengkap = $this->tipe_surat . '-     ' . $this->agenda_dok; 

		$data_segel = [
			'jenis_segel' => $request->main['data']['jenis_segel'],
			'jumlah_segel' => $request->main['data']['jumlah_segel'],
			'satuan_segel' => $request->main['data']['satuan_segel'],
			'tempat_segel' => $request->main['data']['tempat_segel'],
		];

		if ($state == 'insert') {
			$data_segel['agenda_dok'] = $this->agenda_dok;
			$data_segel['no_dok_lengkap'] = $no_dok_lengkap;
			$data_segel['nomor_segel'] = $no_dok_lengkap;
			$data_segel['kode_status'] = 100;
		}

		return $data_segel;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request, $linked_doc=false)
	{
		// Validate data penindakan if not from linked doc
		if ($linked_doc == false) {
			$this->validatePenindakan($request); 
		}

		// Validate data segel
		$this->validateSegel($request);

		DB::beginTransaction();
		try {

			// Save data segel
			$data_segel = $this->prepareData($request, 'insert');
			$segel = DokSegel::create($data_segel);

			// Save data penindakan and create object relation
			if ($linked_doc == false) {
				$this->storePenindakan($request, 'segel', $segel->id);
			}

			// Commit store query
			DB::commit();

			// Return created segel
			$segel_resource = new DokSegelResource(DokSegel::findOrFail($segel->id));
			return $segel_resource;
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
		$is_unpublished = $this->checkUnpublished(DokSegel::class, $id);

		// Update if not published
		if ($is_unpublished) {
			DB::beginTransaction();

			try {
				// Validate data segel
				$this->validateSegel($request);

				// Update BA Segel
				$data_segel = $this->prepareData($request, 'update');
				DokSegel::where('id', $id)->update($data_segel);

				// Update data penindakan if not from linked doc
				if ($linked_doc == false) {
					$this->validatePenindakan($request); 
					$this->updatePenindakan($request);
				}

				// Commit store query
				DB::commit();

				// Return updated SBP
				$segel_resource = new DokSegelResource(DokSegel::findOrFail($id));
				$result = $segel_resource;
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
			// Create array from SBP object
			$segel = new DokSegelResource(DokSegel::find($id));
			$arr = json_decode($segel->toJson(), true);

			// Check penindakan date
			$year = $this->datePenindakan(DokSegel::class, $id);
		
			// Publish each document
			foreach ($arr['dokumen'] as $type => $data) {
				$this->publishDocument($type, $data['id'], $year);
			}

			// Commit transaction
			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}

	/*
	 |--------------------------------------------------------------------------
	 | Destroy or publish functions
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
			$is_unpublished = $this->checkUnpublished(DokSegel::class, $id);
			if ($is_unpublished) {
				DokSegel::find($id)->delete();
			}
			
			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}

	
}
