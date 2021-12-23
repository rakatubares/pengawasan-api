<?php

namespace App\Http\Controllers;

use App\Models\DokLphp;
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
	public function store(Request $request, $sbp_id)
	{
		// Validate data
		$this->validateData($request);

		DB::beginTransaction();
		try {
			// Cek LPHP
			$sbp = Sbp::find($sbp_id);
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
			} else {
				// Update LPHP
				$data_lphp = $this->prepareData($request, 'update');
				$lphp->update($data_lphp);
			}

			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function publish($sbp_id)
	{
		DB::beginTransaction();
		try {
			// Find LPHP
			$sbp = SBP::find($sbp_id);
			$lphp = $sbp->lptp->lphp;
			
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
