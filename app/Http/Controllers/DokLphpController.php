<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokLphpResource;
use App\Http\Resources\DokLphpTableResource;
use App\Models\DokLphp;
use App\Models\DokSbp;
use App\Models\ObjectRelation;
use App\Models\Sbp;
use App\Traits\DokumenTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokLphpController extends Controller
{
	use DokumenTrait;

	private $tipe_dok = 'LPHP';
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
		$all_lphp = DokLphp::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$lphp_list = DokLphpTableResource::collection($all_lphp);
		return $lphp_list;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$lphp = new DokLphpResource(DokLphp::findOrFail($id));
		return $lphp;
	}

	/**
	 * Display object type
	 * 
	 * @param int $id
	 */
	public function display($id)
	{
		$lphp = new DokLphpResource(DokLphp::find($id), 'display');
		return $lphp;
	}

	/**
	 * Display data for input form
	 * 
	 * @param int $id
	 */
	public function form($id)
	{
		$lphp = new DokLphpResource(DokLphp::find($id), 'form');
		return $lphp;
	}

	/**
	 * Display document's object
	 * 
	 * @param int $id
	 */
	public function objek($id)
	{
		$lphp = new DokLphpResource(DokLphp::find($id), 'objek');
		return $lphp;
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
		$no_dok_lengkap = $this->tipe_dok . '-     ' . $this->agenda_dok;
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
			$sbp = DokSbp::find($request->id_sbp);
			$lptp = $sbp->lptp;
			$lphp = $lptp->lphp;

			if ($lphp == null) {
				// Save data LPHP
				$data_lphp = $this->prepareData($request, 'insert');
				$lphp = DokLphp::create($data_lphp);
				
				// Create relation
				$this->createRelation('lptp', $lptp->id, 'lphp', $lphp->id);

				// Change SBP status
				$sbp->update(['kode_status' => 102]);

				// Commit store query
				DB::commit();

				// Return LPHP
				$lphp_resource = new DokLphpResource(DokLphp::findOrFail($lphp->id), 'form');
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
		$is_unpublished = $this->checkUnpublished(DokLphp::class, $id);

		if ($is_unpublished) {
			// Validate data buka segel
			$this->validateData($request);

			DB::beginTransaction();
			try {
				// Check existing id_sbp
				$existing_lphp = DokLphp::find($id);
				$existing_sbp = $existing_lphp->lptp->sbp;
				$existing_sbp_id = $existing_sbp->id;

				if ($existing_sbp_id != $request->id_sbp) {
					// Destroy existing relation
					$existing_sbp->update(['kode_status' => 200]);
					ObjectRelation::where([
						'object2_type' => 'lphp',
						'object2_id' => $id
					])->delete();

					// Create new relation
					$sbp = DokSbp::find($request->id_sbp);
					$lptp = $sbp->lptp;
					$lphp = $lptp->lphp;

					if ($lphp == null) {
						// Save data LPHP
						$data_lphp = $this->prepareData($request);
						DokLphp::find($id)->update($data_lphp);
						
						// Create relation
						$this->createRelation('lptp', $lptp->id, 'lphp', $id);

						// Change SBP status
						$sbp->update(['kode_status' => 102]);

						// Commit store query
						DB::commit();

						// Return LPHP
						$lphp_resource = new DokLphpResource(DokLphp::findOrFail($id), 'form');
						return $lphp_resource;
					} else {
						$result = response()->json(['error' => 'SBP telah dibuat LPHP.'], 422);
						return $result;
					}
				} else {
					// Save data LPHP
					$data_lphp = $this->prepareData($request);
					DokLphp::find($id)->update($data_lphp);

					// Commit store query
					DB::commit();

					// Return LPHP
					$lphp_resource = new DokLphpResource(DokLphp::findOrFail($id), 'form');
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
			// Find LPHP
			$lphp = DokLphp::find($id);
			$sbp = $lphp->lptp->sbp;
			
			// Publish LPHP and chang SBP status
			$this->publishDocument('lphp', $lphp->id, $lphp->thn_dok);
			$sbp->update(['kode_status' => 202]);

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
	 */
	public function destroy($id)
	{
		DB::beginTransaction();
		try {
			$is_unpublished = $this->checkUnpublished(DokLphp::class, $id);
			if ($is_unpublished) {
				DokLphp::find($id)->delete();
			}

			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}
}
