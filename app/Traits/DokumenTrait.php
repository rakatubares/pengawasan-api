<?php

namespace App\Traits;

use App\Http\Controllers\RiksaController;
use App\Http\Controllers\SegelController;
use App\Http\Controllers\TegahController;
use App\Models\ObjectRelation;
use App\Models\Penindakan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\PseudoTypes\True_;

trait DokumenTrait
{
	use SwitcherTrait;

	private $doc;
	private $tahun;
	private $tanggal;
	public $unpublished_status = [100, 101];

	/**
	 * Get document by ID then save to global variable
	 * 
	 * @param Model $model
	 * @param int $doc_id
	 */
	private function getDocument($model, $doc_id)
	{
		$this->doc = $model::findOrFail($doc_id);
	}

	/**
	 * Check if document is unpublished
	 * 
	 * @param Model $model
	 * @param int $doc_id
	 * @return boolean
	 */
	public function checkUnpublished($model, $doc_id)
	{
		// Get document
		$this->getDocument($model, $doc_id);

		// Return TRUE if document is unpublished
		$kode_status = $this->doc->kode_status;
		$is_unpublished = (in_array($kode_status, $this->unpublished_status)) ? true : false;
		return $is_unpublished;
	}

	/**
	 * Get current date and year
	 */
	private function getCurrentDate()
	{
		$this->tanggal = date('Y-m-d') ;
		$this->tahun = date('Y') ;
	}

	/*
	 |--------------------------------------------------------------------------
	 | PUBLISH DOCUMENT
	 |--------------------------------------------------------------------------
	 */
	 
	/**
	 * Publish function
	 * 
	 * @param Model $model
	 * @param int $doc_id
	 * @param string $jenis_surat
	 * @return Response
	 */
	public function publishDocument($doc_type, $doc_id, $year)
	{
		// Get model and doc type
		$model = $this->getModel($doc_type);
		$jenis_surat = $this->getDocType($doc_type);

		// Check if document is unpublished
		$is_unpublished = $this->checkUnpublished($model, $doc_id);

		// Publish document if still unpulished
		if ($is_unpublished) {
			$this->tahun = $year;
			$number = $this->getNewDocNumber($model, $doc_id);
			$result = $this->updateDocNumberAndYear($number, $jenis_surat);
			$result = $this->tanggal;

			if ($doc_type == 'segel') {
				$model::where('id', $doc_id)
					->update(['nomor_segel' => DB::raw('no_dok_lengkap')]);
			}
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan.'], 422);
		}
		
		return $result;
	}

	/**
	 * Get new number
	 * 
	 * @param Model @model
	 * @return int
	 */
	private function getNewDocNumber($model)
	{
		// Ambil nomor terakhir berdasarkan skema, agenda, dan tahun
		$agenda_dok = $this->doc->agenda_dok;
		$latest_number = $model::select('no_dok')
			->where('agenda_dok', $agenda_dok)
			->where('thn_dok', $this->tahun)
			->orderByDesc('no_dok')
			->first();

		// Buat nomor baru
		try {
			$number = ($latest_number->no_dok) + 1;
		} catch (\Throwable $th) {
			$number = 1;
		}
		
		return $number;
	}

	/**
	 * Update penomoran dokumen
	 * 
	 * @param Model $model
	 * @param int $doc_id
	 * @param int $number
	 * @param string $jenis_surat
	 * @return Response
	 */
	private function updateDocNumberAndYear($number, $jenis_surat)
	{
		// Construct full document number
		$no_dok_lengkap = $jenis_surat 
			. '-' 
			. $number 
			. $this->doc->agenda_dok 
			. $this->tahun;

		// Set new values then update
		$this->doc->no_dok = $number;
		$this->doc->thn_dok = $this->tahun;
		$this->doc->no_dok_lengkap = $no_dok_lengkap;
		$this->doc->kode_status = 200;
		$update_result = $this->doc->save();

		return $update_result;
	}

	private function datePenindakan($model, $doc_id)
	{
		$doc = $model::find($doc_id);
		$penindakan = $doc->penindakan;
		$tanggal_penindakan = $penindakan->tanggal_penindakan;

		if ($tanggal_penindakan == null) {
			$this->getCurrentDate();
			$penindakan->tanggal_penindakan = $this->tanggal;
			$penindakan->save();
		} else {
			$this->tanggal = $tanggal_penindakan->format('Y-m-d');
			$this->tahun = $tanggal_penindakan->format('Y');
		}

		return $this->tahun;
	}

	/*
	 |--------------------------------------------------------------------------
	 | UPDATE DOCUMENT DETAIL STATUS
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Update status detail dokumen
	 * 
	 * @param Model $model
	 * @param Int $doc_id
	 * @param String $detail_type
	 * @param Int $detail_status
	 * @return Response
	 */
	public function updateStatusDetail($model, $doc_id, $detail_type, $detail_status)
	{
		// Check if document is unpublished
		$is_unpublished = $this->checkUnpublished($model, $doc_id);

		if ($is_unpublished) {
			// Construct detail column name
			$detail_column = 'detail_' . $detail_type;

			// Update detail status
			$result = $this->doc->update([$detail_column => $detail_status]);
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan, tidak dapat mengupdate dokumen.'], 422);
		}

		return $result;
	}

	/*
	 |--------------------------------------------------------------------------
	 | GET DOCUMENT DETAIL
	 |--------------------------------------------------------------------------
	 */
	
	 /**
	  * Get document detail
	  * 
	  * @param Model $model
	  * @param int $doc_id
	  * @return Response
	  */
	public function getDetail($model, $doc_id)
	{
		// Get document
		$this->getDocument($model, $doc_id);
		$jenis_objek = $this->doc->objek_penindakan;

		// Get detail based on object type
		switch ($jenis_objek) {
			case 'sarkut':
				$data_objek = $this->doc->sarkut;
				break;
			
			case 'barang':
				$data_objek = $this->doc->barang;
				$data_objek->itemBarang;
				break;

			case 'bangunan':
				$data_objek = $this->doc->bangunan;
				break;

			case 'badan':
				$data_objek = $this->doc->badan;
				break;
			
			default:
				$data_objek = null;
				break;
		}

		$objek = [
			'jenis' => $jenis_objek,
			'data' => $data_objek
		];

		return $objek;
	}

	/*
	 |--------------------------------------------------------------------------
	 | STORE DOKUMEN PENINDAKAN
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Validate data penindakan
	 * 
	 * @param Request $request
	 */
	public function validatePenindakan(Request $request)
	{
		$request->validate([
			'penindakan.sprint.id' => 'required|integer',
			'penindakan.saksi.id' => 'required|integer',
			'penindakan.petugas1.user_id' => 'required'
		]);
	}

	/**
	 * Prepare/transform data penindakan
	 * 
	 * @param Request $request
	 */
	private function prepareDataPenindakan(Request $request)
	{
		$data_penindakan = [
			'sprint_id' => $request->penindakan['sprint']['id'],
			'lokasi_penindakan' => $request->penindakan['lokasi_penindakan'],
			'saksi_id' => $request->penindakan['saksi']['id'],
			'petugas1_id' => $request->penindakan['petugas1']['user_id'],
			'petugas2_id' => $request->penindakan['petugas2']
				? $request->penindakan['petugas2']['user_id']
				: null
		];

		return $data_penindakan;
	}

	/**
	 * Create new data
	 * 
	 * @param String $doc_type
	 * @param Array $data_dokumen
	 * @param Array $data_penindakan
	 */
	public function storePenindakan($request, $doc_type, $doc_id)
	{
		$data_penindakan = $this->prepareDataPenindakan($request);
		$penindakan = Penindakan::create($data_penindakan);
		$this->createRelation('penindakan', $penindakan->id, $doc_type, $doc_id);
		return $penindakan;
	}

	/**
	 * Update data
	 * 
	 * @param String $doc_type
	 * @param Array $data_dokumen
	 * @param Array $data_penindakan
	 */
	public function updatePenindakan($request)
	{
		$data_penindakan = $this->prepareDataPenindakan($request);
		Penindakan::where('id', $request->penindakan['id'])->update($data_penindakan);
	}

	/**
	 * Create document relation
	 * 
	 * @param String $doc1_type
	 * @param Int $doc1_id
	 * @param String $doc2_type
	 * @param Int $doc2_id
	 */
	private function createRelation($object1_type, $object1_id, $object2_type, $object2_id)
	{
		ObjectRelation::create([
			'object1_type' => $object1_type,
			'object1_id' => $object1_id,
			'object2_type' => $object2_type,
			'object2_id' => $object2_id,
		]);
	}

	/*
	 |--------------------------------------------------------------------------
	 | CREATE LINKED DOCUMENTS
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Create segel
	 * 
	 * @param Request $request
	 * @param Int $penindakan_id
	 */
	public function createSegel(Request $request, $penindakan_id)
	{
		$segel_array = [
			'main' => [
				'data' => [
					'jenis_segel' => $request->data_segel['jenis'],
					'jumlah_segel' => $request->data_segel['jumlah'],
					'satuan_segel' => $request->data_segel['satuan'],
					'tempat_segel' => $request->data_segel['tempat'],
				]
			]
		];

		$segel_request = new Request($segel_array);

		$penindakan = Penindakan::find($penindakan_id);
		$existing_segel = $penindakan->segel;
		if ($existing_segel == null) {
			$segel = app(SegelController::class)->store($segel_request, true);
			$this->createRelation('penindakan', $penindakan_id, 'segel', $segel->id);
		} else {
			$segel = app(SegelController::class)->update($segel_request, $existing_segel->id, true);
		}
	}

	/**
	 * Create BA Tegah
	 * 
	 * @param Request $request
	 * @param Int $penindakan_id
	 */
	public function createTegah(Request $request, $penindakan_id)
	{
		// Check existing document
		$penindakan = Penindakan::find($penindakan_id);
		$existing_tegah = $penindakan->tegah;

		// Save if document not exists
		if ($existing_tegah == null) {
			$tegah = app(TegahController::class)->store($request);
			$this->createRelation('penindakan', $penindakan_id, 'tegah', $tegah->id);
		}
	}

	/**
	 * Create BA Periksa
	 * 
	 * @param Request $request
	 * @param Int $penindakan_id
	 */
	public function createRiksa(Request $request, $penindakan_id)
	{
		// Check existing document
		$penindakan = Penindakan::find($penindakan_id);
		$existing_riksa = $penindakan->riksa;

		// Save if document not exists
		if ($existing_riksa == null) {
			$riksa = app(RiksaController::class)->store($request, true);
			$this->createRelation('penindakan', $penindakan_id, 'riksa', $riksa->id);
		}
	}
}