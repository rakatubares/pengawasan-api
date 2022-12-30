<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokLpNController extends DokLpController
{
    public function __construct()
	{
		parent::__construct('lpn');
		$this->lphp_type = 'lphpn';
		$this->sbp_type = 'sbpn';
		$this->prepareModel();
	}

	/**
	 * Validate request
	 * 
	 * @param  \Illuminate\Http\Request  $request
	 */
	protected function validateData(Request $request)
	{
		$request->validate([
			'tanggal_dokumen' => 'required|date',
			'sprint.id' => 'required|integer',
			'penyusun.jabatan.kode' => 'required',
			'penyusun.plh' => 'required|boolean',
			'penyusun.user.user_id' => 'required|integer',
			'penerbit.jabatan.kode' => 'required',
			'penerbit.plh' => 'required|boolean',
			'penerbit.user.user_id' => 'required|integer',
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
			'sprint_id' => $request->sprint['id'],
			'kesimpulan' => $request->kesimpulan,
			'kode_jabatan_penyusun' => $request->penyusun['jabatan']['kode'],
			'plh_penyusun' => $request->penyusun['plh'],
			'penyusun_id' => $request->penyusun['user']['user_id'],
			'kode_jabatan_penerbit' => $request->penerbit['jabatan']['kode'],
			'plh_penerbit' => $request->penerbit['plh'],
			'penerbit_id' => $request->penerbit['user']['user_id'],
		];

		if ($state == 'insert') {
			$data_lp['agenda_dok'] = $this->agenda_dok;
			$data_lp['no_dok_lengkap'] = $no_dok_lengkap;
			$data_lp['kode_status'] = 100;
		};

		return $data_lp;
	}
}
