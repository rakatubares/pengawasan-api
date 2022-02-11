<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokRiksaResource;
use App\Http\Resources\DokRiksaTableResource;
use App\Models\DokRiksa;
use App\Traits\DokumenTrait;
use App\Traits\SwitcherTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokRiksaController extends Controller
{
	use DokumenTrait;
	use SwitcherTrait;

	public function __construct()
	{
		$this->doc_type = 'riksa';
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
		$all_riksa = DokRiksa::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$riksa_list = DokRiksaTableResource::collection($all_riksa);
		return $riksa_list;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$riksa = new DokRiksaResource(DokRiksa::findOrFail($id));
		return $riksa;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function display($id)
	{
		$riksa = new DokRiksaResource(DokRiksa::findOrFail($id), 'display');
		return $riksa;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function form($id)
	{
		$riksa = new DokRiksaResource(DokRiksa::findOrFail($id), 'form');
		return $riksa;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function objek($id)
	{
		$riksa = new DokRiksaResource(DokRiksa::findOrFail($id), 'objek');
		return $riksa;
	}

	/*
	 |--------------------------------------------------------------------------
	 | Data modify functions
	 |--------------------------------------------------------------------------
	 */

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

		DB::beginTransaction();
		try {
			// Save data pemeriksaan
			$no_dok_lengkap = $this->tipe_surat . '-     ' . $this->agenda_dok;
			$riksa = DokRiksa::create([
				'agenda_dok' => $this->agenda_dok,
				'no_dok_lengkap' => $no_dok_lengkap,
				'kode_status' => 100,
			]);

			// Save data penindakan and create object relation
			if ($linked_doc == false) {
				$this->storePenindakan($request, 'riksa', $riksa->id);
			}

			// Commit store query
			DB::commit();

			// Return created document
			$riksa_resource = new DokRiksaResource(DokRiksa::findOrFail($riksa->id), 'form');
			return $riksa_resource;
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
		$is_unpublished = $this->checkUnpublished(DokRiksa::class, $id);

		// Update if not published
		if ($is_unpublished) {
			DB::beginTransaction();

			try {
				// Update data penindakan
				$this->validatePenindakan($request); 
				$this->updatePenindakan($request);

				// Commit store query
				DB::commit();

				// Return updated SBP
				$riksa_resource = new DokRiksaResource(DokRiksa::findOrFail($id), 'form');
				$result = $riksa_resource;
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
		// Create array from SBP object
		$riksa = new DokRiksaResource(DokRiksa::find($id));
		$arr = json_decode($riksa->toJson(), true);

		// Check penindakan date
		$year = $this->datePenindakan(DokRiksa::class, $id);
	
		// Publish each document
		foreach ($arr['dokumen'] as $type => $data) {
			$this->publishDocument($type, $data['id'], $year);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$is_unpublished = $this->checkUnpublished(DokRiksa::class, $id);
		if ($is_unpublished) {
			DokRiksa::find($id)->delete();
		}
	}
}