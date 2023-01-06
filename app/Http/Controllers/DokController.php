<?php

namespace App\Http\Controllers;

use App\Models\ObjectRelation;
use App\Traits\SwitcherTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokController extends Controller
{
	use SwitcherTrait;

	public $doc = null;
	public $doc_type = null;
	public $model = null;
	public $tipe_surat = null;
	public $agenda_dok = null;
	public $resource = null;
	public $table_resource = null;
	public $date = null;
	public $year = null;
	public $unpublished_status = [100, 101];

	public function __construct($doc_type)
	{
		$this->doc_type = $doc_type;
		$this->model = $this->switchObject($this->doc_type, 'model');
		$this->tipe_surat = $this->switchObject($this->doc_type, 'tipe_dok');
		$this->agenda_dok = $this->switchObject($this->doc_type, 'agenda');
		$this->resource = $this->switchObject($this->doc_type, 'resource');
		$this->table_resource = $this->switchObject($this->doc_type, 'table_resource');
	}

	/*
	 |--------------------------------------------------------------------------
	 | Document functions
	 |--------------------------------------------------------------------------
	 */
	
	/**
	 * Get specific document by ID
	 * 
	 * @param int $doc_id
	 */
	protected function getDocument($doc_id, $doc_type=null)
	{
		if ($doc_type==null) {
			$this->doc = $this->model::findOrFail($doc_id);
		} else {
			$model = $this->switchObject($doc_type, 'model');
			$doc = $model::findOrFail($doc_id);
			return $doc;
		}
	}

	/**
	 * Get current date and year
	 */
	protected function getCurrentDate()
	{
		$this->date = date('Y-m-d') ;
		$this->year = date('Y') ;
	}

	/**
	 * Get new number
	 * 
	 * @return int
	 */
	private function getNewDocNumber($doc, $model)
	{
		// Ambil nomor terakhir berdasarkan skema, agenda, dan tahun
		$agenda_dok = $doc->agenda_dok;
		$latest_number = $model::select('no_dok')
			->where('agenda_dok', $agenda_dok)
			->where('thn_dok', $this->year)
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
	 * Check if document is unpublished
	 * 
	 * @return boolean
	 */
	public function checkUnpublished($doc=null)
	{
		if ($doc==null) {$doc = $this->doc;}

		// Return TRUE if document is unpublished
		$kode_status = $doc->kode_status;
		$is_unpublished = (in_array($kode_status, $this->unpublished_status)) ? true : false;
		return $is_unpublished;
	}

	/*
	 |--------------------------------------------------------------------------
	 | DISPLAY functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Display a listing of the resource for datatable.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$all_docs = $this->model::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$docs_list = $this->table_resource::collection($all_docs);
		return $docs_list;
	}

	/**
	 * Display data for printout.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$doc = new $this->resource($this->model::findOrFail($id));
		return $doc;
	}

	/**
	 * Display data for detail page.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function display($id)
	{
		$doc = new $this->resource($this->model::findOrFail($id), 'display');
		return $doc;
	}


	/**
	 * List of related documents.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function docs($id)
	{
		return $this->getRelatedDocuments($id);
	}

	/**
	 * Display data for pdf.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function pdf($id)
	{
		$doc = new $this->resource($this->model::findOrFail($id), 'pdf');
		return $doc;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function form($id)
	{
		$doc = new $this->resource($this->model::findOrFail($id), 'form');
		return $doc;
	}

	/**
	 * Display document's object.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function objek($id)
	{
		$doc = new $this->resource($this->model::findOrFail($id), 'objek');
		return $doc;
	}

	/*
	 |--------------------------------------------------------------------------
	 | Data modify functions
	 |--------------------------------------------------------------------------
	 */
	
	/**
	 * Save data
	 * 
	 * @param  \Illuminate\Http\Request  $request
	 */
	protected function saveData(Request $request)
	{
		$this->validateData($request);
		$data = $this->prepareData($request, 'insert');
		$this->doc = $this->model::create($data);
	}

	/**
	 * Publish document.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function publish($id)
	{
		$this->getDocument($id);
		$is_unpublished = $this->checkUnpublished();
		if ($is_unpublished) {
			DB::beginTransaction();
			try {
				$this->publishing($id);
				$this->publishDocument();
				$this->published();
				DB::commit();
			} catch (\Throwable $th) {
				DB::rollBack();
				throw $th;
			}
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan.'], 422);
			return $result;
		}
	}

	/**
	 * Update document's date before being published
	 */
	protected function publishing($id)
	{
		$this->getCurrentDate();
		$this->updateDocDate();
		$this->updateDocYear();
	}

	/**
	 * Update document's number and status
	 */
	protected function publishDocument($doc_type=null, $doc_id=null)
	{
		// If document and model objects are not specified, use default objects
		if ($doc_type==null) {
			$model = $this->model;
			$doc = $this->doc;
			$tipe_surat = $this->tipe_surat;
		} else {
			$model = $this->switchObject($doc_type, 'model');
			$doc = $model::find($doc_id);
			$tipe_surat = $this->switchObject($doc_type, 'tipe_dok');
		}

		$number = $this->getNewDocNumber($doc, $model);
		$this->updateDocNumber($number, $doc, $tipe_surat);
		$doc->kode_status = 200;
		$doc->save();
	}

	/**
	 * Perform any actions required after document is published.
	 */
	protected function published()
	{
		// 
	}

	/**
	 * Update doc number
	 * 
	 * @param int $number
	 */
	protected function updateDocNumber($number, $doc, $tipe_surat)
	{
		// Construct full document number
		$no_dok_lengkap = $tipe_surat 
			. '-' 
			. $number 
			. $doc->agenda_dok 
			. $this->year;

		// Set new values then update
		$doc->no_dok = $number;
		$doc->no_dok_lengkap = $no_dok_lengkap;
	}

	/**
	 * Update doc date
	 */
	protected function updateDocDate()
	{
		$this->doc->tanggal_dokumen = $this->date;
	}

	protected function updateDocYear()
	{
		$this->doc->thn_dok = $this->year;
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
		$this->getDocument($id);
		$is_unpublished = $this->checkUnpublished();
		if ($is_unpublished) {
			DB::beginTransaction();
			try {
				$this->model::find($id)->delete();
				
				DB::commit();
			} catch (\Throwable $th) {
				DB::rollBack();
				throw $th;
			}
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan.'], 422);
			return $result;
		}
	}

	/*
	 |--------------------------------------------------------------------------
	 | Relation & status functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Update document's status
	 */
	protected function updateStatus($doc, $status)
	{
		$doc->update(['kode_status' => $status]);
	}
	
	/**
	 * Create document relation
	 * 
	 * @param String $doc1_type
	 * @param Int $doc1_id
	 * @param String $doc2_type
	 * @param Int $doc2_id
	 */
	protected function createRelation($object1_type, $object1_id, $object2_type, $object2_id)
	{
		ObjectRelation::create([
			'object1_type' => $object1_type,
			'object1_id' => $object1_id,
			'object2_type' => $object2_type,
			'object2_id' => $object2_id,
		]);
	}

	/**
	 * Delete document relation
	 * 
	 * @param String $doc1_type
	 * @param Int $doc1_id
	 * @param String $doc2_type
	 * @param Int $doc2_id
	 */
	protected function deleteRelation($object1_type, $object1_id, $object2_type, $object2_id)
	{
		ObjectRelation::where([
			'object1_type' => $object1_type,
			'object1_id' => $object1_id,
			'object2_type' => $object2_type,
			'object2_id' => $object2_id
		])->delete();
	}
}