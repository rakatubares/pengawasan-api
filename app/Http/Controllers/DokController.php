<?php

namespace App\Http\Controllers;

use App\Traits\SwitcherTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokController extends Controller
{
	use SwitcherTrait;

	public function __construct($doc_type)
	{
		$this->doc_type = $doc_type;
		$this->model = $this->switchObject($this->doc_type, 'model');
		$this->tipe_surat = $this->switchObject($this->doc_type, 'tipe_dok');
		$this->agenda_dok = $this->switchObject($this->doc_type, 'agenda');
		$this->resource = $this->switchObject($this->doc_type, 'resource');
		$this->table_resource = $this->switchObject($this->doc_type, 'table_resource');
		$this->unpublished_status = [100, 101];
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
	protected function getDocument($doc_id)
	{
		$this->doc = $this->model::findOrFail($doc_id);
	}

	/**
	 * Get current date and year
	 */
	private function getCurrentDate()
	{
		$this->tanggal = date('Y-m-d') ;
		$this->tahun = date('Y') ;
	}

	/**
	 * Get new number
	 * 
	 * @return int
	 */
	private function getNewDocNumber()
	{
		// Ambil nomor terakhir berdasarkan skema, agenda, dan tahun
		$agenda_dok = $this->doc->agenda_dok;
		$latest_number = $this->model::select('no_dok')
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
	 * Check if document is unpublished
	 * 
	 * @return boolean
	 */
	public function checkUnpublished()
	{
		// Return TRUE if document is unpublished
		$kode_status = $this->doc->kode_status;
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
	public function publish($id, $withAddition=false)
	{
		DB::beginTransaction();
		try {
			// Generate document's number and date
			$this->getDocument($id);
			$this->getCurrentDate();
			$number = $this->getNewDocNumber($this->model);

			// Update data
			// $this->updateDocNumberAndYear($number, $this->tipe_surat, true);
			$this->updateDocNumber($number);
			$this->updateDocDate();
			$this->doc->kode_status = 200;
			$this->doc->save();

			// Additional procedures
			if ($withAddition) {
				$this->publishAddition();
			}
			
			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}

	/**
	 * Update doc number
	 * 
	 * @param int $number
	 */
	private function updateDocNumber($number)
	{
		// Construct full document number
		$no_dok_lengkap = $this->tipe_surat 
			. '-' 
			. $number 
			. $this->doc->agenda_dok 
			. $this->tahun;

		// Set new values then update
		$this->doc->no_dok = $number;
		$this->doc->no_dok_lengkap = $no_dok_lengkap;
	}

	/**
	 * Update doc date
	 */
	private function updateDocDate()
	{
		$this->doc->tanggal_dokumen = $this->tanggal;
		$this->doc->thn_dok = $this->tahun;
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
			$this->getDocument($id);
			$is_unpublished = $this->checkUnpublished();
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