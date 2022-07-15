<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokNiResource;
use App\Http\Resources\DokNiTableResource;
use App\Models\ObjectRelation;
use App\Traits\DokumenTrait;
use App\Traits\SwitcherTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokNiController extends Controller
{
	use DokumenTrait;
	use SwitcherTrait;

	public function __construct()
	{
		$this->doc_type = 'ni';
		$this->lkai_type = 'lkai';
		$this->table_resource = DokNiTableResource::class;
		$this->prepareModel();
	}

	protected function prepareModel()
	{
		$this->tipe_surat = $this->switchObject($this->doc_type, 'tipe_dok');
		$this->agenda_dok = $this->switchObject($this->doc_type, 'agenda');
		$this->model = $this->switchObject($this->doc_type, 'model');
		$this->lkai_model = $this->switchObject($this->lkai_type, 'model');
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
		$all_ni = $this->model::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$ni_list = $this->table_resource::collection($all_ni);
		return $ni_list;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$ni = new DokNiResource($this->model::findOrFail($id), $this->doc_type);
		return $ni;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function display($id)
	{
		$ni = new DokNiResource($this->model::findOrFail($id), $this->doc_type, 'display');
		return $ni;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function form($id)
	{
		$ni = new DokNiResource($this->model::findOrFail($id), $this->doc_type, 'form');
		return $ni;
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
			'lkai_id' => 'integer',
			'sifat' => 'string',
			'klasifikasi' => 'string',
			'penerbit.plh' => 'boolean',
			'penerbit.user_id' => 'integer',
		]);
	}

	/**
	 * Prepare data from request to array
	 * 
	 * @param Request $request
	 * @param String $state
	 * @return Array
	 */
	protected function prepareData(Request $request, $state='insert')
	{
		$no_dok_lengkap = $this->tipe_surat . '-' . '      ' . $this->agenda_dok;

		$data_ni = [
			'sifat' => $request->sifat,
			'klasifikasi' => $request->klasifikasi,
			'tujuan' => $request->tujuan,
			'uraian' => $request->uraian,
			'kode_jabatan' => $request->penerbit['jabatan']['kode'],
			'plh_pejabat' => $request->penerbit['plh'],
			'pejabat_id' => $request->penerbit['user']['user_id'],
		];

		if ($state == 'insert') {
			$data_ni['agenda_dok'] = $this->agenda_dok;
			$data_ni['no_dok_lengkap'] = $no_dok_lengkap;
			$data_ni['kode_status'] = 100;
		}

		return $data_ni;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		// validate data
		$this->validateData($request);

		DB::beginTransaction();
		try {
			// Save data NHI
			$data_ni = $this->prepareData($request, 'insert');
			$ni = $this->model::create($data_ni);

			// Save CC
			$cc_list = array_filter($request->tembusan, 'strlen');
			if (sizeof($cc_list) > 0) {
				app(TembusanController::class)->setCc($this->model, $ni->id, $cc_list);
			}

			// Link with intelijen
			$lkai_id = $request->lkai_id;
			$this->createLinkLkai($lkai_id, $ni->id);
			
			// Commit store query
			DB::commit();

			// Return created data
			$ni_resource = new DokNiResource($this->model::find($ni->id), $this->doc_type, 'display');
			return $ni_resource;
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
		$is_unpublished = $this->checkUnpublished($this->model, $id);

		if ($is_unpublished) {
			DB::beginTransaction();

			try {
				// Validate data
				$this->validateData($request);
	
				// Update data
				$data_ni = $this->prepareData($request, 'update');
				$this->model::find($id)->update($data_ni);

				// Update CC
				$cc_list = array_filter($request->tembusan, 'strlen');
				app(TembusanController::class)->setCc($this->model, $id, $cc_list);

				// Check existing LKAI
				$intelijen = $this->model::find($id)->intelijen;
				$lkai = $this->lkai_type == 'lkain' ? $intelijen->lkain : $intelijen->lkai;
				$lkai_id = $request->lkai_id;

				if ($lkai_id != $lkai->id) {
					$this->rollbackLkai($id);
					$this->createLinkLkai($lkai_id, $id);
				}

				// Commit query
				DB::commit();
	
				// Return data
				$ni_resource = new DokNiResource($this->model::findOrFail($id), $this->doc_type, 'display');
				return $ni_resource;
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
	 * Link LKAI
	 */
	private function createLinkLkai($lkai_id, $ni_id)
	{
		$lkai = $this->lkai_model::find($lkai_id);
		$status_lkai = $this->doc_type == 'nin' ? 123 : 113;
		$lkai->update(['kode_status' => $status_lkai]);
		$intelijen = $lkai->intelijen;
		$this->createIntelRelation($intelijen->id, $ni_id);
	}

	/**
	 * Rollback existing LKAI
	 */
	private function rollbackLkai($ni_id)
	{
		$existing_intel = $this->model::find($ni_id)->intelijen; 
		$existing_lkai = $this->lkai_type == 'lkain' ? $existing_intel->lkain : $existing_intel->lkai;
		$existing_lkai->update(['kode_status' => 200]);
		$this->deleteIntelRelation($existing_intel->id, $ni_id);
	}

	/**
	 * Create new intel relation
	 */
	private function createIntelRelation($intelijen_id, $ni_id)
	{
		ObjectRelation::create([
			'object1_type' => 'intelijen',
			'object1_id' => $intelijen_id,
			'object2_type' => $this->doc_type,
			'object2_id' => $ni_id,
		]);
	}

	/**
	 * Delete relation
	 */
	private function deleteIntelRelation($intelijen_id, $ni_id)
	{
		ObjectRelation::where([
			'object1_type' => 'intelijen',
			'object1_id' => $intelijen_id,
			'object2_type' => $this->doc_type,
			'object2_id' => $ni_id,
		])->delete();
	}

	/**
	 * Publish document.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function publish($id)
	{
		DB::beginTransaction();
		try {
			// Publish NHI
			$this->getDocument($this->model, $id);
			$this->getCurrentDate();
			$number = $this->getNewDocNumber($this->model);
			$this->updateDocNumberAndYear($number, $this->tipe_surat, true);
			$this->updateDocDate();

			// Change LKAI status
			$lkai = $this->doc_type == 'nin' ? $this->doc->intelijen->lkain : $this->doc->intelijen->lkai;
			$status_lkai = $this->doc_type == 'nin' ? 223 : 213;
			if ($lkai != null) {
				$lkai->update(['kode_status' => $status_lkai]);
			}
			
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
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
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
