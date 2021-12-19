<?php

namespace App\Http\Controllers;

use App\Http\Resources\PenindakanResource;
use App\Http\Resources\SbpResource;
use App\Http\Resources\SbpTableResource;
use App\Models\Penindakan;
use App\Models\Sbp;
use App\Traits\DokumenTrait;
use App\Traits\SwitcherTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SbpController extends Controller
{
	use DokumenTrait;
	use SwitcherTrait;
	
	private $tipe_dok = 'SBP';
	private $agenda_dok = '/KPU.03/BD.05/';

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
		$all_sbp = Sbp::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$sbp_list = SbpTableResource::collection($all_sbp);
		return $sbp_list;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$sbp = new SbpResource(Sbp::findOrFail($id));
		return $sbp;
	}

	/**
	 * Display object type
	 * 
	 * @param int $id
	 */
	public function objek($id)
	{
		$objek = new SbpResource(Sbp::find($id), 'objek');
		return $objek;
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
	private function validateSbp(Request $request)
	{
		$request->validate([
			'main.data.wkt_mulai_penindakan' => 'required|date',
			'main.data.wkt_selesai_penindakan' => 'required|date',
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
		$no_dok_lengkap = $this->tipe_dok . '-' . '      ' . $this->agenda_dok;
		$wkt_mulai_penindakan = date('Y-m-d H:i:s', strtotime($request->main['data']['wkt_mulai_penindakan']));
		$wkt_selesai_penindakan = date('Y-m-d H:i:s', strtotime($request->main['data']['wkt_selesai_penindakan']));

		// Data SBP
		$data_sbp = [
			'uraian_penindakan' => $request->main['data']['uraian_penindakan'],
			'alasan_penindakan' => $request->main['data']['alasan_penindakan'],
			'jenis_pelanggaran' => $request->main['data']['jenis_pelanggaran'],
			'wkt_mulai_penindakan' => $wkt_mulai_penindakan,
			'wkt_selesai_penindakan' => $wkt_selesai_penindakan,
			'hal_terjadi' => $request->main['data']['hal_terjadi'],
		];

		if ($state == 'insert') {
			$data_sbp['agenda_dok'] = $this->agenda_dok;
			$data_sbp['no_dok_lengkap'] = $no_dok_lengkap;
			$data_sbp['kode_status'] = 100;
		}

		return $data_sbp;
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
		
		// Validate data SBP
		$this->validateSbp($request);

		DB::beginTransaction();
		try {
			// Save data SBP
			$data_sbp = $this->prepareData($request, 'insert');
			$sbp = Sbp::create($data_sbp);

			// Save data LPTP
			$lptp_request = new Request($request->dokumen['lptp']);
			$lptp = app(LptpController::class)->store($lptp_request);
			$this->createRelation('sbp', $sbp->id, 'lptp', $lptp->id);

			// Save data penindakan and create object relation
			if ($linked_doc == false) {
				$this->storePenindakan($request, 'sbp', $sbp->id);
			}

			// Commit store query
			DB::commit();

			// Return created SBP
			$sbp_resource = new SbpResource(Sbp::findOrFail($sbp->id));
			return $sbp_resource;
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
		$is_unpublished = $this->checkUnpublished(Sbp::class, $id);

		// Update if not published
		if ($is_unpublished) {
			DB::beginTransaction();
			try {
				// Validate data
				$this->validatePenindakan($request);
				$this->validateSbp($request);

				// Update SBP
				$data_sbp = $this->prepareData($request, 'update');
				Sbp::where('id', $id)->update($data_sbp);

				// Update LPTP
				$lptp_request = new Request($request->dokumen['lptp']);
				app(LptpController::class)->update($lptp_request, $request->dokumen['lptp']['id']);

				// Update penindakan
				$this->updatePenindakan($request);

				// Commit store query
				DB::commit();

				// Return updated SBP
				$sbp_resource = new SbpResource(Sbp::findOrFail($id));
				return $sbp_resource;
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
	 * Modify linked documents
	 * 
	 * @param Request $request
	 * @param Int $id
	 */
	public function storeLinkedDoc(Request $request, $id)
	{
		DB::beginTransaction();

		try {
			// Get object penindakan
			$sbp = Sbp::findOrFail($id);
			$penindakan = $sbp->penindakan;

			// Upsert segel
			if ($request->segel == true) {
				$this->createSegel($request, $penindakan->id);
			};

			// Upsert Tegah
			if ($request->tegah == true) {
				$this->createTegah($request, $penindakan->id);
			}

			// Upsert Riksa
			if ($request->riksa == true) {
				$this->createRiksa($request, $penindakan->id);
			}

			$penindakan = new PenindakanResource(Penindakan::find($penindakan->id));

			// Commit transaction
			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}

		return $penindakan;
	}

	/**
	 * Terbitkan penomoran SBP
	 * 
	 * @param  int  $id
	 */
	public function publish($id)
	{
		// Create array from SBP object
		$sbp = new SbpResource(Sbp::find($id));
		$arr = json_decode($sbp->toJson(), true);

		// Check penindakan date
		$year = $this->datePenindakan(Sbp::class, $id);
	
		// Publish each document
		foreach ($arr['dokumen'] as $type => $data) {
			$this->publishDocument($type, $data['id'], $year);
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
	 */
	public function destroy($id)
	{
		DB::beginTransaction();
		try {
			$is_unpublished = $this->checkUnpublished(Sbp::class, $id);
			if ($is_unpublished) {
				Sbp::find($id)->delete();
			}
			
			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}
	
}
