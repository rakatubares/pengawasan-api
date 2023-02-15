<?php

namespace App\Http\Controllers;

use App\Models\DokLpp;
use Illuminate\Http\Request;

class DokLpfController extends DokPenyidikanController
{
	public function __construct($doc_type='lpf')
	{
		parent::__construct($doc_type);
	}

	protected function getPenyidikan($id)
	{
		$this->getDocument($id);
		$this->penyidikan = $this->doc->lpp->penyidikan;
	}

	public function bhp($id)
	{
		$this->getPenyidikan($id);
		$bhp_resource = $this->getBhpData();
		
		return $bhp_resource;
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
			'kesimpulan' => 'required',
			'usulan' => 'required',
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
		$no_dok_lengkap = $this->tipe_surat . '-      ' . $this->agenda_dok;
		$jenis_tanggal = [
			'tanggal_bap_saksi', 
			'tanggal_bap_tersangka',
			'tanggal_resume_perkara',
			'tanggal_dokumen_lain',
		];
		foreach ($jenis_tanggal as $tanggal) {
			if ($request->$tanggal != null) {
				$request->$tanggal = date('Y-m-d', strtotime($request->$tanggal));
			}
		}

		$data_lpf = [
			'saksi_id' => $request->saksi['id'],
			'tanggal_bap_saksi' => $request->tanggal_bap_saksi,
			'tersangka_id' => $request->tersangka['id'],
			'tanggal_bap_tersangka' => $request->tanggal_bap_tersangka,
			'resume_perkara' => $request->resume_perkara,
			'tanggal_resume_perkara' => $request->tanggal_resume_perkara,
			'jenis_dokumen_lain' => $request->jenis_dokumen_lain,
			'nomor_dokumen_lain' => $request->nomor_dokumen_lain,
			'tanggal_dokumen_lain' => $request->tanggal_dokumen_lain,
			'kesimpulan' => $request->kesimpulan,
			'usulan' => $request->usulan,
			'catatan' => $request->catatan,
			'peneliti_id' => $request->peneliti['user_id'],
			'kode_jabatan1' => $request->atasan1['jabatan']['kode'],
			'plh1' => $request->atasan1['plh'],
			'pejabat1_id' => $request->atasan1['user']['user_id'],
			'kode_jabatan2' => $request->atasan2['jabatan']['kode'],
			'plh2' => $request->atasan2['plh'],
			'pejabat2_id' => $request->atasan2['user']['user_id'],
			'kode_status' => $request->kode_status,
		];

		if ($state == 'insert') {
			$data_lpf['agenda_dok'] = $this->agenda_dok;
			$data_lpf['no_dok_lengkap'] = $no_dok_lengkap;
			$data_lpf['kode_status'] = 100;
		}

		return $data_lpf;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$lpp = DokLpp::find($request->id_lpp);
		if ($lpp->kode_status == 200) {
			$this->penyidikan = $lpp->penyidikan;
			$result = $this->storePenyidikanDocument($request);
			return $result;
		} else {
			$result = response()->json(['error' => `Dokumen LPP sudah ditindaklanjuti.`], 422);
			return $result;
		}
	}

	protected function stored($request)
	{
		$this->attachLpp($request->id_lpp);
		$this->penyidikan->lpp->update(['kode_status' => 132]);
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
		// Check LPP availability
		$availability = true;
		$this->getDocument($id);
		$existing_lpp = $this->doc->lpp;
		if ($existing_lpp->id != $request->id_lpp) {
			$new_lpp = DokLpp::find($request->id_lpp);
			if ($new_lpp->kode_status != 200) {
				$availability = false;
			}
		}

		// Update LPF
		if ($availability == true) {
			$result = $this->updatePenyidikanDocument($request, $id);
			return $result;
		} else {
			$result = response()->json(['error' => `Dokumen LPP sudah ditindaklanjuti.`], 422);
			return $result;
		}
	}

	protected function updating($request)
	{
		$existing_lpp = $this->doc->lpp;
		if ($existing_lpp->id != $request->id_lpp) {
			// Detach from previous LPP
			$this->detachLpp();

			// Attach to new LPP and change status
			$this->attachLpp($request->id_lpp);
			DokLpp::find($request->id_lpp)->update(['kode_status' => 132]);
		}	
	}

	protected function published()
	{
		$lpp = $this->doc->lpp;
		$lpp->update(['kode_status' => 232]);
	}

	/*
	 |--------------------------------------------------------------------------
	 | LPP functions
	 |--------------------------------------------------------------------------
	 */
	
	private function attachLpp($id_lpp)
	{
		$this->createRelation(
			'lpp',
			$id_lpp,
			'lpf',
			$this->doc->id
		);
	}

	public function detachLpp()
	{
		$this->doc->lpp->update(['kode_status' => 200]);
		$this->deleteRelation(
			'lpp',
			$this->doc->lpp->id,
			'lpf',
			$this->doc->id
		);
	}
}
