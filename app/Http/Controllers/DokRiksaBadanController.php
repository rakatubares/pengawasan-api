<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokRiksaBadanResource;
use App\Http\Resources\DokRiksaBadanTableResource;
use App\Models\DetailSarkut;
use App\Models\DokRiksaBadan;
use App\Models\Penindakan;
use App\Traits\DokumenTrait;
use App\Traits\SwitcherTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokRiksaBadanController extends Controller
{
	use DokumenTrait;
	use SwitcherTrait;

	public function __construct()
	{
		$this->doc_type = 'riksabadan';
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
		$all_riksa = DokRiksaBadan::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$riksa_list = DokRiksaBadanTableResource::collection($all_riksa);
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
		$riksa = new DokRiksaBadanResource(DokRiksaBadan::findOrFail($id));
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
		$riksa = new DokRiksaBadanResource(DokRiksaBadan::findOrFail($id), 'display');
		return $riksa;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function form($id)
	{
		$riksa = new DokRiksaBadanResource(DokRiksaBadan::findOrFail($id), 'form');
		return $riksa;
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
			'orang.id' => 'required|integer',
			'pendamping.id' => 'nullable|integer',
			'sarkut.pilot.id' => 'nullable|integer',
			'dokumen.tgl_dok' => 'nullable|date',
		]);
	}

	/**
	 * Prepare data
	 */
	private function prepareData(Request $request, $state='insert')
	{
		$no_dok_lengkap = $this->tipe_surat . '-     ' . $this->agenda_dok; 

		$data_riksa_badan = [
			'asal' => $request->asal,
			'tujuan' => $request->tujuan,
			'pendamping_id' => $request->pendamping['id'],
			'uraian_pemeriksaan' => $request->uraian_pemeriksaan,
			'hasil_pemeriksaan' => $request->hasil_pemeriksaan,
		];

		if ($state == 'insert') {
			$data_riksa_badan['agenda_dok'] = $this->agenda_dok;
			$data_riksa_badan['no_dok_lengkap'] = $no_dok_lengkap;
			$data_riksa_badan['nomor_segel'] = $no_dok_lengkap;
			$data_riksa_badan['kode_status'] = 100;
		}

		return $data_riksa_badan;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request, $linked_doc=false)
	{
		// Validate data BA
		$this->validateData($request);

		DB::beginTransaction();
		try {
			// Save data sarkut
			if (
				($request->sarkut['nama_sarkut'] != null) ||
				($request->sarkut['jenis_sarkut'] != null)
			) {
				$sarkut = DetailSarkut::create([
					'nama_sarkut' => $request->sarkut['nama_sarkut'],
					'jenis_sarkut' => $request->sarkut['jenis_sarkut'],
					'no_flight_trayek' => $request->sarkut['no_flight_trayek'],
					'pilot_id' => $request->sarkut['pilot']['id'],
					'bendera' => $request->sarkut['bendera'],
					'no_reg_polisi' => $request->sarkut['no_reg_polisi'],
				]);
				$sarkut_id = $sarkut->id;
			} else {
				$sarkut_id = null;
			}

			// Save data BA Periksa Badan
			$data_riksa_badan = $this->prepareData($request, 'insert');
			$data_riksa_badan['sarkut_id'] = $sarkut_id;
			$riksa_badan = DokRiksaBadan::create($data_riksa_badan);

			// Save data dokumen barang
			if ($request->dokumen['no_dok'] != null) {
				DokRiksaBadan::find($riksa_badan->id)
					->dokumen()
					->create([
						'jns_dok' => $request->dokumen['jns_dok'],
						'no_dok' => $request->dokumen['no_dok'],
						'tgl_dok' => $request->dokumen['tgl_dok'],
					]);
			}

			// Save data penindakan and create object relation
			if ($linked_doc == false) {
				$penindakan = $this->storePenindakan($request, 'riksabadan', $riksa_badan->id);
				Penindakan::where('id', $penindakan->id)
					->update([
						'object_type' => 'orang', 
						'object_id' => $request->orang['id']
					]);
			}

			// Commit store query
			DB::commit();

			// Return created document
			$riksa_badan_resource = new DokRiksaBadanResource(DokRiksaBadan::findOrFail($riksa_badan->id), 'display');
			return $riksa_badan_resource;
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
		$is_unpublished = $this->checkUnpublished(DokRiksaBadan::class, $id);

		// Update if not published
		if ($is_unpublished) {
			DB::beginTransaction();

			try {
				// Validate data
				$this->validateData($request);

				// Update BA
				$data_riksa_badan = $this->prepareData($request, 'update');
				$riksa_badan = DokRiksaBadan::where('id', $id);
				$riksa_badan->update($data_riksa_badan);

				// Update sarkut
				if (
					($request->sarkut['nama_sarkut'] != null) ||
					($request->sarkut['jenis_sarkut'] != null)
				) {
					// Prepare data sarkut
					$data_sarkut = [
						'nama_sarkut' => $request->sarkut['nama_sarkut'],
						'jenis_sarkut' => $request->sarkut['jenis_sarkut'],
						'no_flight_trayek' => $request->sarkut['no_flight_trayek'],
						'pilot_id' => $request->sarkut['pilot']['id'],
						'bendera' => $request->sarkut['bendera'],
						'no_reg_polisi' => $request->sarkut['no_reg_polisi'],
					];

					// Check existed sarkut
					$existed_sarkut_id = DokRiksaBadan::find($id)->sarkut_id;
					if ($existed_sarkut_id != null) {
						DetailSarkut::where('id', $existed_sarkut_id)->update($data_sarkut);
					} else {
						$sarkut = DetailSarkut::create($data_sarkut);
						DokRiksaBadan::where('id', $id)->update(['sarkut_id' => $sarkut->id]);
					}
				} else {
					// Check existed sarkut
					$existed_sarkut_id = DokRiksaBadan::find($id)->sarkut_id;
					if ($existed_sarkut_id != null) {
						DetailSarkut::where('id', $existed_sarkut_id)->delete();
						DokRiksaBadan::where('id', $id)->update(['sarkut_id' => null]);
					}
				}

				// Update dokumen barang
				if ($request->dokumen['no_dok'] != null) {
					// Prepare data document
					$data_dokumen = [
						'jns_dok' => $request->dokumen['jns_dok'],
						'no_dok' => $request->dokumen['no_dok'],
						'tgl_dok' => $request->dokumen['tgl_dok'],
					];

					// Check existed document
					$existed_dokumen = DokRiksaBadan::find($id)->dokumen;
					if ($existed_dokumen != null) {
						DokRiksaBadan::find($id)->dokumen()->update($data_dokumen);
					} else {
						DokRiksaBadan::find($id)->dokumen()->create($data_dokumen);
					}
				} else {
					// Check existed document
					$existed_dokumen = DokRiksaBadan::find($id)->dokumen;
					if ($existed_dokumen != null) {
						DokRiksaBadan::find($id)->dokumen()->delete();
					}
				}

				// Update data penindakan if not from linked doc
				if ($linked_doc == false) {
					$this->updatePenindakan($request);
				}

				// Update orang
				if ($request->orang['id'] != DokRiksaBadan::find($id)->penindakan->object_id) {
					DokRiksaBadan::find($id)->penindakan()->update(['object_id' => $request->orang['id']]);
				}

				// Commit store query
				DB::commit();

				// Return updated data
				$riksa_badan_resource = new DokRiksaBadanResource(DokRiksaBadan::findOrFail($id), 'form');
				$result = $riksa_badan_resource;
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
			// Create array from document
			$riksa_badan = new DokRiksaBadanResource(DokRiksaBadan::find($id));
			$arr = json_decode($riksa_badan->toJson(), true);

			// Check penindakan date
			$year = $this->datePenindakan(DokRiksaBadan::class, $id);
		
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
			$is_unpublished = $this->checkUnpublished(DokRiksaBadan::class, $id);
			if ($is_unpublished) {
				DokRiksaBadan::find($id)->delete();
			}
			
			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}
}
