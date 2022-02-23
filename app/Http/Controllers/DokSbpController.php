<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokSbpResource;
use App\Http\Resources\DokSbpTableResource;
use App\Models\ObjectRelation;
use App\Models\Penindakan;
use App\Traits\DokumenTrait;
use App\Traits\SwitcherTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokSbpController extends Controller
{
	use DokumenTrait;
	use SwitcherTrait;
	
	public function __construct()
	{
		$this->doc_type = 'sbp';
		$this->lptp_type = 'lptp';
		$this->lptp_controller = DokLptpController::class;
		$this->prepareModel();
	}

	protected function prepareModel()
	{
		$this->tipe_surat = $this->switchObject($this->doc_type, 'tipe_dok');
		$this->agenda_dok = $this->switchObject($this->doc_type, 'agenda');
		$this->model = $this->switchObject($this->doc_type, 'model');
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
		$all_sbp = $this->model::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$sbp_list = DokSbpTableResource::collection($all_sbp);
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
		$sbp = new DokSbpResource($this->model::findOrFail($id), null, $this->doc_type);
		return $sbp;
	}

	/**
	 * Display object type
	 * 
	 * @param int $id
	 */
	public function display($id)
	{
		$sbp = new DokSbpResource($this->model::find($id), 'display');
		return $sbp;
	}

	/**
	 * Display object type
	 * 
	 * @param int $id
	 */
	public function form($id)
	{
		$sbp = new DokSbpResource($this->model::find($id), 'form');
		return $sbp;
	}

	/**
	 * Display object type
	 * 
	 * @param int $id
	 */
	public function objek($id)
	{
		$objek = new DokSbpResource($this->model::find($id), 'objek');
		return $objek;
	}

	/**
	 * Display object type
	 * 
	 * @param int $id
	 */
	public function linked($id)
	{
		$objek = new DokSbpResource($this->model::find($id), 'linked');
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
		$flt = $request->flt;
		$exc = $request->exc;
		$search = '%' . $src . '%';

		$search_result = $this->model::where(function ($query) use ($search, $flt) 
			{
				$query->where('no_dok_lengkap', 'like', $search)
					->when($flt != null, function ($query) use ($flt)
					{
						foreach ($flt as $column => $value) {
							if (is_array($value)) {
								$query->whereIn($column, $value);
							} else if ($value == null) {
								$query->where($column, $value);
							} else {
								$search_value = '%' . $value . '%';
								$query->where($column, 'like', $search_value);
							}
						}
						return $query;
					});
			})
			->when($exc != null, function ($query) use ($exc)
			{
				return $query->orWhere('id', $exc);
			})
			->orderBy('created_at', 'desc')
			->orderBy('id', 'desc')
			->take(5)
			->get();
		$search_list = DokSbpTableResource::collection($search_result);
		return $search_list;
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
			'wkt_mulai_penindakan' => 'required|date',
			'wkt_selesai_penindakan' => 'required|date',
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
		$wkt_mulai_penindakan = date('Y-m-d H:i:s', strtotime($request->wkt_mulai_penindakan));
		$wkt_selesai_penindakan = date('Y-m-d H:i:s', strtotime($request->wkt_selesai_penindakan));

		// Data SBP
		$data_sbp = [
			'uraian_penindakan' => $request->uraian_penindakan,
			'alasan_penindakan' => $request->alasan_penindakan,
			'jenis_pelanggaran' => $request->jenis_pelanggaran,
			'wkt_mulai_penindakan' => $wkt_mulai_penindakan,
			'wkt_selesai_penindakan' => $wkt_selesai_penindakan,
			'hal_terjadi' => $request->hal_terjadi,
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
			$sbp = $this->model::create($data_sbp);

			// Save data LPTP
			$lptp_request = new Request($request->lptp);
			$lptp = app($this->lptp_controller)->store($lptp_request);
			$this->createRelation($this->doc_type, $sbp->id, $this->lptp_type, $lptp->id);

			// Save data penindakan and create object relation
			if ($linked_doc == false) {
				$this->storePenindakan($request, $this->doc_type, $sbp->id);
			}

			// Commit store query
			DB::commit();

			// Return created SBP
			$sbp_resource = new DokSbpResource($this->model::findOrFail($sbp->id), 'form', $this->doc_type);
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
		$is_unpublished = $this->checkUnpublished($this->model, $id);

		// Update if not published
		if ($is_unpublished) {
			DB::beginTransaction();
			try {
				// Validate data
				$this->validatePenindakan($request);
				$this->validateSbp($request);

				// Update SBP
				$data_sbp = $this->prepareData($request, 'update');
				$this->model::where('id', $id)->update($data_sbp);

				// Update LPTP
				$lptp_request = new Request($request->lptp);
				app($this->lptp_controller)->update($lptp_request, $request->lptp['id']);

				// Update penindakan
				$this->updatePenindakan($request);

				// Commit store query
				DB::commit();

				// Return updated SBP
				$sbp_resource = new DokSbpResource($this->model::findOrFail($id));
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
	 * Terbitkan penomoran SBP
	 * 
	 * @param  int  $id
	 */
	public function publish($id)
	{
		// Create array from SBP object
		$sbp = new DokSbpResource($this->model::find($id));
		$arr = json_decode($sbp->toJson(), true);

		// Check penindakan date
		$year = $this->datePenindakan($this->model, $id);
	
		// Publish each document
		foreach ($arr['dokumen'] as $type => $data) {
			$this->publishDocument($type, $data['id'], $year);
		}
	}

	/*
	 |--------------------------------------------------------------------------
	 | CREATE LINKED DOCUMENTS
	 |--------------------------------------------------------------------------
	 */

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
			$sbp = $this->model::findOrFail($id);
			$penindakan = $sbp->penindakan;

			// Upsert segel
			if ($request->segel == true) {
				$this->createSegel($request, $penindakan);
			} else {
				$this->deleteLinkedDoc($penindakan, 'segel');
			};

			// Upsert Tegah
			if ($request->tegah == true) {
				$this->createTegah($request, $penindakan);
			} else {
				$this->deleteLinkedDoc($penindakan, 'tegah');
			};

			// Upsert Riksa
			if ($request->riksa == true) {
				$this->createRiksa($request, $penindakan);
			} else {
				$this->deleteLinkedDoc($penindakan, 'riksa');
			};

			// Commit transaction
			DB::commit();

			// Return linked doc
			$dokumen = new DokSbpResource($this->model::findOrFail($id), 'linked');
			return $dokumen;
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}

		
	}

	/**
	 * Create segel
	 * 
	 * @param Request $request
	 * @param Penindakan $penindakan
	 */
	private function createSegel(Request $request, Penindakan $penindakan)
	{
		$segel_array = [
			'jenis_segel' => $request->data_segel['jenis'],
			'jumlah_segel' => $request->data_segel['jumlah'],
			'satuan_segel' => $request->data_segel['satuan'],
			'tempat_segel' => $request->data_segel['tempat'],
		];

		$segel_request = new Request($segel_array);

		$existing_segel = $penindakan->segel;
		if ($existing_segel == null) {
			$segel = app(DokSegelController::class)->store($segel_request, true);
			$this->createRelation('penindakan', $penindakan->id, 'segel', $segel->id);
		} else {
			$segel = app(DokSegelController::class)->update($segel_request, $existing_segel->id, true);
		}
	}

	/**
	 * Create BA Tegah
	 * 
	 * @param Request $request
	 * @param Penindakan $penindakan_id
	 */
	private function createTegah(Request $request, Penindakan $penindakan)
	{
		// Check existing document
		$existing_tegah = $penindakan->tegah;

		// Save if document not exists
		if ($existing_tegah == null) {
			$tegah = app(DokTegahController::class)->store($request);
			$this->createRelation('penindakan', $penindakan->id, 'tegah', $tegah->id);
		}
	}

	/**
	 * Create BA Periksa
	 * 
	 * @param Request $request
	 * @param Penindakan $penindakan
	 */
	private function createRiksa(Request $request, Penindakan $penindakan)
	{
		// Check existing document
		$existing_riksa = $penindakan->riksa;

		// Save if document not exists
		if ($existing_riksa == null) {
			$riksa = app(DokRiksaController::class)->store($request, true);
			$this->createRelation('penindakan', $penindakan->id, 'riksa', $riksa->id);
		}
	}

	/**
	 * Delete linked doc without observer
	 * 
	 * @param Penindakan $penindakan
	 */
	private function deleteLinkedDoc(Penindakan $penindakan, $doc_type)
	{
		// Get existing doc
		$existing_doc = $penindakan->$doc_type;

		if ($existing_doc) {
			// Remove relation between doc and penindakan
			ObjectRelation::where([
				'object1_type' => 'penindakan',
				'object1_id' => $penindakan->id,
				'object2_type' => $doc_type,
				'object2_id' => $existing_doc->id
			])->delete();

			// Delete doc
			$model = $this->switchObject($doc_type, 'model');
			$model::find($existing_doc->id)->delete();
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
			$is_unpublished = $this->checkUnpublished($this->model, $id);
			if ($is_unpublished) {
				$this->model::find($id)->delete();
			}
			
			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}
	
}
