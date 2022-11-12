<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokLpResource;
use App\Http\Resources\DokLpTableResource;
use App\Models\DokLp;
use App\Models\DokSbp;
use App\Models\ObjectRelation;
use App\Traits\DokumenTrait;
use App\Traits\SwitcherTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokLpController extends Controller
{
	use DokumenTrait;
	use SwitcherTrait;

	public function __construct()
	{
		$this->doc_type = 'lp';
		$this->lphp_type = 'lphp';
		$this->sbp_type = 'sbp';
		$this->prepareModel();
	}

	protected function prepareModel()
	{
		$this->tipe_surat = $this->switchObject($this->doc_type, 'tipe_dok');
		$this->agenda_dok = $this->switchObject($this->doc_type, 'agenda');
		$this->model = $this->switchObject($this->doc_type, 'model');
		$this->resource = $this->switchObject($this->doc_type, 'resource');
		$this->sbp_model = $this->switchObject($this->sbp_type, 'model');
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
		$all_lp = $this->model::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$lp_list = DokLpTableResource::collection($all_lp);
		return $lp_list;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$lphp = new $this->resource($this->model::findOrFail($id));
		return $lphp;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function display($id)
	{
		$lp = new $this->resource($this->model::findOrFail($id), 'display');
		return $lp;
	}

	/**
	 * Display data for input form
	 * 
	 * @param int $id
	 */
	public function form($id)
	{
		$lp = new $this->resource($this->model::find($id), 'form');
		return $lp;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function objek($id)
	{
		$lp = new $this->resource($this->model::findOrFail($id), 'objek');
		return $lp;
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
			'tanggal_dokumen' => 'required|date',
			'pejabat.jabatan.kode' => 'required',
			'pejabat.plh' => 'required|boolean',
			'pejabat.user.user_id' => 'required|integer',
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
		$no_dok_lengkap = $this->tipe_surat . '-     ' . $this->agenda_dok;
		$thn_dok = date('Y', strtotime($request->tanggal_dokumen));
		$tanggal_dokumen = date('Y-m-d', strtotime($request->tanggal_dokumen));

		$data_lp = [
			'thn_dok' => $thn_dok,
			'tanggal_dokumen' => $tanggal_dokumen,
			'pasal' => $request->pasal,
			'modus' => $request->modus,
			'kode_jabatan' => $request->pejabat['jabatan']['kode'],
			'plh' => $request->pejabat['plh'],
			'pejabat_id' => $request->pejabat['user']['user_id'],
		];

		if ($state == 'insert') {
			$data_lp['agenda_dok'] = $this->agenda_dok;
			$data_lp['no_dok_lengkap'] = $no_dok_lengkap;
			$data_lp['kode_status'] = 100;
		};

		return $data_lp;
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
			// Cek LP
			$sbp = $this->sbp_model::find($request->id_sbp);
			$lphp = $sbp->lptp->lphp;
			$lp = $lphp->lp;

			if ($lp == null) {
				// Save data LP
				$data_lp = $this->prepareData($request, 'insert');
				$lp = $this->model::create($data_lp);
				
				// Create relation
				$this->createRelation($this->lphp_type, $lphp->id, $this->doc_type, $lp->id);

				// Change SBP status
				$sbp->update(['kode_status' => 103]);

				// Commit store query
				DB::commit();

				// Return LP
				$lp_resource = new DokLpResource($this->model::findOrFail($lp->id), 'form');
				return $lp_resource;
			} else {
				$result = response()->json(['error' => 'SBP telah dibuat LP.'], 422);
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
		$is_unpublished = $this->checkUnpublished($this->model, $id);

		if ($is_unpublished) {
			// Validate data buka segel
			$this->validateData($request);

			DB::beginTransaction();
			try {
				// Check existing id_sbp
				$existing_lp = $this->model::find($id);
				$existing_sbp = $existing_lp->lphp->lptp->sbp;
				$existing_sbp_id = $existing_sbp->id;

				if ($existing_sbp_id != $request->id_sbp) {
					// Destroy existing relation
					$existing_sbp->update(['kode_status' => 202]);
					ObjectRelation::where([
						'object2_type' => $this->doc_type,
						'object2_id' => $id
					])->delete();

					// Check if SBP already has LP
					$sbp = $this->sbp_model::find($request->id_sbp);
					$lphp = $sbp->lptp->lphp;
					$lp = $lphp->lphp;

					if ($lp == null) {
						// Save data LPHP
						$data_lp = $this->prepareData($request);
						$this->model::find($id)->update($data_lp);
						
						// Create relation
						$this->createRelation($this->lphp_type, $lphp->id, $this->doc_type, $id);

						// Change SBP status
						$sbp->update(['kode_status' => 102]);

						// Commit store query
						DB::commit();

						// Return LPHP
						$lp_resource = new DokLpResource($this->model::findOrFail($id), 'form');
						return $lp_resource;
					} else {
						$result = response()->json(['error' => 'SBP telah dibuat LP.'], 422);
						return $result;
					}
				} else {
					// Save data LP
					$data_lp = $this->prepareData($request);
					$this->model::find($id)->update($data_lp);

					// Commit store query
					DB::commit();

					// Return LPHP
					$lphp_resource = new DokLpResource($this->model::findOrFail($id), 'form');
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

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function publish($id)
	{
		DB::beginTransaction();
		try {
			// Find doc
			$lp = $this->model::find($id);
			$sbp = $lp->lphp->lptp->sbp;
			
			// Publish doc and change SBP status
			$this->publishDocument($this->doc_type, $lp->id, $lp->thn_dok);
			$sbp->update(['kode_status' => 203]);

			// Commit query
			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}

	/*
	 |--------------------------------------------------------------------------
	 | Destroy function
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
