<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokRiksaBadanResource;
use App\Http\Resources\DokSbpTableResource;
use App\Http\Resources\DokSegelResource;
use App\Models\ObjectRelation;
use App\Models\Penindakan;
use App\Traits\SwitcherTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokSbpController extends DokPenindakanController
{
	use SwitcherTrait;
	
	public function __construct($doc_type='sbp')
	{
		parent::__construct($doc_type);
		$this->lptp_type = 'lptp';
		$this->lptp_controller = DokLptpController::class;
	}

	/*
	 |--------------------------------------------------------------------------
	 | DISPLAY functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Display object type
	 * 
	 * @param int $id
	 */
	public function linked($id)
	{
		$linked_docs = [];
		$related_docs = $this->getRelatedDocuments($id);
		foreach ($related_docs as $doc) {
			if ($doc['doc_type'] == 'segel') {
				$segel = $this->getDocument($doc['doc_id'], 'segel');
				$linked_docs[$doc['doc_type']] = new DokSegelResource($segel);
			} elseif ($doc['doc_type'] == 'riksabadan') {
				$riksabadan = $this->getDocument($doc['doc_id'], 'riksabadan');
				$linked_docs[$doc['doc_type']] = new DokRiksaBadanResource($riksabadan);
			} else {
				$linked_docs[$doc['doc_type']] = $doc['doc_id'];
			}
		}
		return $linked_docs;
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
	protected function validateData(Request $request)
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
	protected function prepareData(Request $request, $state='insert')
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
	public function store(Request $request)
	{
		$result = $this->storePenindakanDocument($request);
		return $result;
	}

	protected function stored($request)
	{
		// Save data LPTP
		$lptp_request = new Request($request->lptp);
		$lptp = app($this->lptp_controller)->store($lptp_request);
		$this->createRelation($this->doc_type, $this->doc->id, $this->lptp_type, $lptp->id);

		// Save data penindakan and create object relation
		$this->storePenindakan($request);
		$this->attachPenindakan($this->penindakan->id);

		// Create LAP relation
		if ($request->lap_id != null) {
			$this->attachLap($request->lap_id);
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
		$result = $this->updatePenindakanDocument($request, $id);
		return $result;
	}

	function updating($request) 
	{
		// Update relation with LAP when necessary
		$this->getPenindakan($this->doc->id);
		$existing_lap = $this->penindakan->lap;
		if ($existing_lap == null) {
			if ($request->lap_id != null) {
				$this->attachLap($request->lap_id);
			}
		} else {
			if ($request->lap_id == null) {
				$this->detachLap();
			} else if ($existing_lap->id != $request->lap_id) {
				$this->detachLap();
				$this->attachLap($request->lap_id);
			}
		}
	}

	protected function updated($request)
	{
		// Update LPTP
		$lptp_request = new Request($request->lptp);
		app($this->lptp_controller)->update($lptp_request, $request->lptp['id']);

		// Update penindakan
		$this->updatePenindakan($request);
		$this->getPenindakan($this->doc->id);
		if ($this->penindakan->object_type == 'orang') {
			$this->penindakan->update(['object_id' => $request->penindakan['saksi']['id']]);
		}
	}

	/**
	 * Terbitkan penomoran SBP
	 * 
	 * @param  int  $id
	 */
	public function publish($id)
	{
		// Get currrent date
		$this->getPenindakanDate($id);

		// Update LAP status
		$lap = $this->penindakan->lap;
		if ($lap != null) {
			$lap->update(['kode_status' => 207]);
		}

		// Publish SBP
		$this->doc->update(['thn_dok' => $this->year]);
		$this->publishDocument($this->doc_type, $id);
	
		// Publish each document
		$docs = $this->getPenindakanDocuments($this->penindakan->id);
		foreach ($docs as $doc) {
			$doc_model = $this->switchObject($doc['doc_type'], 'model');
			$doc_object = $doc_model::find($doc['doc_id']);
			$doc_object->update(['thn_dok' => $this->year]);
			$this->publishDocument($doc['doc_type'], $doc['doc_id']);
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
			$this->getPenindakan($id);

			// Upsert Segel
			if ($request->segel == true) {
				$this->createSegel($request);
			} else {
				$this->deleteLinkedDoc($this->penindakan, 'segel');
			};

			// Upsert Tegah
			if ($request->tegah == true) {
				$this->createTegah($request);
			} else {
				$this->deleteLinkedDoc($this->penindakan, 'tegah');
			};

			// Upsert Riksa
			if ($request->riksa == true) {
				$this->createRiksa($request);
			} else {
				$this->deleteLinkedDoc($this->penindakan, 'riksa');
			};

			// Upsert Riksa Badan
			if ($request->riksa_badan == true) {
				$this->createRiksaBadan($request);
			} else {
				$this->deleteLinkedDoc($this->penindakan, 'riksabadan');
			};

			// Commit transaction
			DB::commit();

			// Return linked doc
			return $this->linked($id);
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
	private function createSegel(Request $request)
	{
		$segel_array = [
			'jenis_segel' => $request->data_segel['jenis_segel'],
			'jumlah_segel' => $request->data_segel['jumlah_segel'],
			'satuan_segel' => $request->data_segel['satuan_segel'],
			'tempat_segel' => $request->data_segel['tempat_segel'],
		];

		$segel_request = new Request($segel_array);

		$existing_segel = $this->penindakan->segel;
		if ($existing_segel == null) {
			$segel = app(DokSegelController::class)->storeLinked($segel_request);
			$this->createRelation('penindakan', $this->penindakan->id, 'segel', $segel->id);
		} else {
			$segel = app(DokSegelController::class)->updateLinked($segel_request, $existing_segel->id);
		}
	}

	/**
	 * Create BA Tegah
	 * 
	 * @param Request $request
	 * @param Penindakan $penindakan_id
	 */
	private function createTegah(Request $request)
	{
		// Check existing document
		$existing_tegah = $this->penindakan->tegah;

		// Save if document not exists
		if ($existing_tegah == null) {
			$tegah = app(DokTegahController::class)->store($request);
			$this->createRelation('penindakan', $this->penindakan->id, 'tegah', $tegah->id);
		}
	}

	/**
	 * Create BA Periksa
	 * 
	 * @param Request $request
	 * @param Penindakan $penindakan
	 */
	private function createRiksa(Request $request)
	{
		// Check existing document
		$existing_riksa = $this->penindakan->riksa;

		// Save if document not exists
		if ($existing_riksa == null) {
			$riksa = app(DokRiksaController::class)->store($request, true);
			$this->createRelation('penindakan', $this->penindakan->id, 'riksa', $riksa->id);
		}
	}

	/**
	 * Create BA Periksa Badan
	 * 
	 * @param Request $request
	 * @param Penindakan $penindakan
	 */
	private function createRiksaBadan(Request $request)
	{
		$orang_id = Penindakan::find($this->penindakan->id)->object_id;
		$riksa_badan_array = [
			'orang' => ['id' => $orang_id],
			'asal' => $request->data_riksa_badan['asal'],
			'tujuan' => $request->data_riksa_badan['tujuan'],
			'pendamping' => $request->data_riksa_badan['pendamping'],
			'uraian_pemeriksaan' => $request->data_riksa_badan['uraian_pemeriksaan'],
			'hasil_pemeriksaan' => $request->data_riksa_badan['hasil_pemeriksaan'],
			'sarkut' => $request->data_riksa_badan['sarkut'],
			'dokumen' => $request->data_riksa_badan['dokumen'],
			'saksi' => $request->data_riksa_badan['saksi'],
		];
		$riksa_badan_array['dokumen']['tgl_dok'] = date('Y-m-d', strtotime($riksa_badan_array['dokumen']['tgl_dok']));

		// Create new request object
		$riksa_badan_request = new Request($riksa_badan_array);

		// Check existing document
		$existing_riksabadan = $this->penindakan->riksabadan;
		if ($existing_riksabadan == null) {
			$riksa_badan = app(DokRiksaBadanController::class)->storeLinked($riksa_badan_request);
			$this->createRelation('penindakan', $this->penindakan->id, 'riksabadan', $riksa_badan->id);
		} else {
			$riksa_badan = app(DokRiksaBadanController::class)->updateLinked($riksa_badan_request, $existing_riksabadan->id);
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
}
