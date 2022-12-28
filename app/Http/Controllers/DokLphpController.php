<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokLphpResource;
use App\Models\ObjectRelation;
use App\Traits\SwitcherTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokLphpController extends DokPenindakanController
{
	use SwitcherTrait;

	public function __construct($doc_type='lphp')
	{
		parent::__construct($doc_type);
		$this->lptp_type = 'lptp';
		$this->sbp_type = 'sbp';
		$this->prepareModel();
	}

	protected function prepareModel()
	{
		$this->sbp_model = $this->switchObject($this->sbp_type, 'model');
	}

	/*
	 |--------------------------------------------------------------------------
	 | DISPLAY functions
	 |--------------------------------------------------------------------------
	 */

	protected function getPenindakan($doc_id)
	{
		$this->getDocument($doc_id);
		$this->penindakan = $this->doc->lptp->sbp->penindakan;
	}

	public function docs($id)
	{
		return $this->getRelatedDocuments($id);
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
	private function validateData(Request $request)
	{
		$request->validate([
			'id_sbp' => 'required|integer',
			'tanggal_dokumen' => 'required|date',
			'penyusun.jabatan.kode' => 'required',
			'penyusun.plh' => 'required|boolean',
			'penyusun.user.user_id' => 'required|integer',
			'atasan.jabatan.kode' => 'required',
			'atasan.plh' => 'required|boolean',
			'atasan.user.user_id' => 'required|integer',
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
		$no_dok_lengkap = $this->tipe_surat . '-     ' . $this->agenda_dok;
		$thn_dok = date('Y', strtotime($request->tanggal_dokumen));
		$tanggal_dokumen = date('Y-m-d', strtotime($request->tanggal_dokumen));

		$data_lphp = [
			'thn_dok' => $thn_dok,
			'tanggal_dokumen' => $tanggal_dokumen,
			'analisa' => $request->analisa,
			'catatan' => $request->catatan,
			'kode_jabatan_penyusun' => $request->penyusun['jabatan']['kode'],
			'plh_penyusun' => $request->penyusun['plh'],
			'penyusun_id' => $request->penyusun['user']['user_id'],
			'kode_jabatan_atasan' => $request->atasan['jabatan']['kode'],
			'plh_atasan' => $request->atasan['plh'],
			'atasan_id' => $request->atasan['user']['user_id'],
		];

		if ($state == 'insert') {
			$data_lphp['agenda_dok'] = $this->agenda_dok;
			$data_lphp['no_dok_lengkap'] = $no_dok_lengkap;
			$data_lphp['kode_status'] = 100;
		};

		return $data_lphp;
	}
	
	 /**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		// Validate data
		$this->validateData($request);

		DB::beginTransaction();
		try {
			// Cek LPHP
			$sbp = $this->sbp_model::find($request->id_sbp);
			$lptp = $sbp->lptp;
			$lphp = $lptp->lphp;

			if ($lphp == null) {
				// Save data LPHP
				$data_lphp = $this->prepareData($request, 'insert');
				$lphp = $this->model::create($data_lphp);
				
				// Create relation
				$this->createRelation($this->lptp_type, $lptp->id, $this->doc_type, $lphp->id);

				// Change SBP status
				$sbp->update(['kode_status' => 102]);

				// Commit store query
				DB::commit();

				// Return LPHP
				$lphp_resource = new DokLphpResource($this->model::findOrFail($lphp->id), 'form');
				return $lphp_resource;
			} else {
				$result = response()->json(['error' => 'SBP telah dibuat LPHP.'], 422);
				return $result;
			}
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
		$this->getDocument($id);
		$is_unpublished = $this->checkUnpublished();

		if ($is_unpublished) {
			// Validate data buka segel
			$this->validateData($request);

			DB::beginTransaction();
			try {
				// Check existing id_sbp
				$existing_lphp = $this->model::find($id);
				$existing_sbp = $existing_lphp->lptp->sbp;
				$existing_sbp_id = $existing_sbp->id;

				if ($existing_sbp_id != $request->id_sbp) {
					// Destroy existing relation
					$existing_sbp->update(['kode_status' => 200]);
					ObjectRelation::where([
						'object2_type' => $this->doc_type,
						'object2_id' => $id
					])->delete();

					// Create new relation
					$sbp = $this->sbp_model::find($request->id_sbp);
					$lptp = $sbp->lptp;
					$lphp = $lptp->lphp;

					if ($lphp == null) {
						// Save data LPHP
						$data_lphp = $this->prepareData($request);
						$this->model::find($id)->update($data_lphp);
						
						// Create relation
						$this->createRelation($this->lptp_type, $lptp->id, $this->doc_type, $id);

						// Change SBP status
						$sbp->update(['kode_status' => 102]);

						// Commit store query
						DB::commit();

						// Return LPHP
						$lphp_resource = new DokLphpResource($this->model::findOrFail($id), 'form');
						return $lphp_resource;
					} else {
						$result = response()->json(['error' => 'SBP telah dibuat LPHP.'], 422);
						return $result;
					}
				} else {
					// Save data LPHP
					$data_lphp = $this->prepareData($request);
					$this->model::find($id)->update($data_lphp);

					// Commit store query
					DB::commit();

					// Return LPHP
					$lphp_resource = new DokLphpResource($this->model::findOrFail($id), 'form');
					return $lphp_resource;
				}
			} catch (\Throwable $th) {
				DB::rollBack();
				throw $th;
			}
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan, tidak dapat mengupdate dokumen.'], 422);
			return $result;
		}
	}

	protected function publishing($id)
	{
		$this->getDocument($id);
		$this->year = $this->doc->thn_dok;
	}
	
	protected function published()
	{
		$sbp = $this->doc->lptp->sbp;
		$sbp->update(['kode_status' => 202]);
	}
}
