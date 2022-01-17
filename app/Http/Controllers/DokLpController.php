<?php

namespace App\Http\Controllers;

use App\Models\DokLp;
use App\Models\Sbp;
use App\Traits\DokumenTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokLpController extends Controller
{
	use DokumenTrait;

	private $tipe_dok = 'LP';
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
	private function prepareData(Request $request, $state='insert')
	{
		$no_dok_lengkap = $this->tipe_dok . '-     ' . $this->agenda_dok;
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
	public function store(Request $request, $sbp_id)
	{
		// Validate data
		$this->validateData($request);

		DB::beginTransaction();
		try {
			// Cek LP
			$sbp = Sbp::find($sbp_id);
			$lphp = $sbp->lptp->lphp;
			$lp = $lphp->lp;

			if ($lp == null) {
				// Save data LP
				$data_lp = $this->prepareData($request, 'insert');
				$lp = DokLp::create($data_lp);
				
				// Create relation
				$this->createRelation('lphp', $lphp->id, 'lp', $lp->id);

				// Change SBP status
				$sbp->update(['kode_status' => 103]);
			} else {
				// Update LP
				$data_lp = $this->prepareData($request, 'update');
				$lp->update($data_lp);
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
			$lp = $sbp->lptp->lphp->lp;
			
			// Publish LPHP and chang SBP status
			$this->publishDocument('lp', $lp->id, $lp->thn_dok);
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
			$is_unpublished = $this->checkUnpublished(DokLp::class, $id);
			if ($is_unpublished) {
				DokLp::find($id)->delete();
			}

			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}
}
