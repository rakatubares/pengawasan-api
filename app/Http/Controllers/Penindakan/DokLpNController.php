<?php

namespace App\Http\Controllers\Penindakan;

use Illuminate\Http\Request;

class DokLpNController extends DokLpController
{
	protected $doc_type = 'lpn';

    // public function __construct()
	// {
	// 	parent::__construct('lpn');
	// 	$this->lphp_type = 'lphpn';
	// 	$this->sbp_type = 'sbpn';
	// }

	/**
	 * Validate request
	 * 
	 * @param  \Illuminate\Http\Request  $request
	 */
	// protected function validateData(Request $request)
	// {
	// 	$request->validate([
	// 		'tanggal_dokumen' => 'required|date',
	// 		'sprint.id' => 'required|integer',
	// 		'penyusun.jabatan.kode' => 'required',
	// 		'penyusun.plh' => 'required|boolean',
	// 		'penyusun.user.user_id' => 'required|integer',
	// 		'penerbit.jabatan.kode' => 'required',
	// 		'penerbit.plh' => 'required|boolean',
	// 		'penerbit.user.user_id' => 'required|integer',
	// 	]);
	// }

	/**
	 * Prepare data SBP from request to array
	 * 
	 * @param Request $request
	 * @param String $state
	 * @return Array
	 */
	protected function prepareData(Request $request, $state='insert')
	{
		$thn_dok = $request->tanggal_dokumen != null ? date('Y', strtotime($request->tanggal_dokumen)) : null;
		$tanggal_dokumen = $request->tanggal_dokumen != null ? date('Y-m-d', strtotime($request->tanggal_dokumen)) : null;
		$sprint_id = $request->sprint ? $request->sprint['id'] : null;

		$data_lphpn = [
			'thn_dok' => $thn_dok,
			'tanggal_dokumen' => $tanggal_dokumen,
			'sprint_id' => $sprint_id,
			'kesimpulan' => $request->kesimpulan,
		];

		return $data_lphpn;
	}
}
