<?php

namespace App\Http\Controllers;

use App\Http\Resources\RiksaResource;
use App\Http\Resources\RiksaTableResource;
use App\Models\Riksa;
use App\Traits\DokumenTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiksaController extends Controller
{
	use DokumenTrait;

	private $tipe_dok = 'BA';
	private $agenda_dok = '/RIKSA/KPU.03/BD.05/';

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
		$all_riksa = Riksa::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$riksa_list = RiksaTableResource::collection($all_riksa);
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
		$riksa = new RiksaResource(Riksa::findOrFail($id));
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
			$no_dok_lengkap = $this->tipe_dok . '-' . $this->agenda_dok;
			$riksa = Riksa::create([
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
			$riksa_resource = new RiksaResource(Riksa::findOrFail($riksa->id));
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
		$is_unpublished = $this->checkUnpublished(Riksa::class, $id);

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
				$riksa_resource = new RiksaResource(Riksa::findOrFail($id));
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
		$riksa = new RiksaResource(Riksa::find($id));
		$arr = json_decode($riksa->toJson(), true);

		// Check penindakan date
		$year = $this->datePenindakan(Riksa::class, $id);
	
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
		$is_unpublished = $this->checkUnpublished(Riksa::class, $id);
		if ($is_unpublished) {
			Riksa::find($id)->delete();
		}
	}
}