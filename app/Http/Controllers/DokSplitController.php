<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokSplitTableResource;
use App\Models\DokLpf;
use App\Models\DokSplit;
use Illuminate\Http\Request;

class DokSplitController extends DokPenyidikanController
{
	public function __construct($doc_type='split')
	{
		parent::__construct($doc_type);
	}

	/**
	 * Display resource based on search query
	 * 
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function search(Request $request)
	{
		$src = $request->src;
		$sta = $request->sta;
		$exc = $request->exc;

		$search = '%' . $src . '%';
		$status = $sta != null ? $sta : [200];

		$search_result = DokSplit::where(function ($query) use ($search, $status) {
				$query->where('no_dok_lengkap', 'like', $search)
					->whereIn('kode_status', $status);
			})
			->when($exc != null, function ($query) use ($exc)
			{
				return $query->orWhere('id', $exc);
			})
			->orderBy('created_at', 'desc')
			->orderBy('id', 'desc')
			->take(5)
			->get();
		$search_list = DokSplitTableResource::collection($search_result);
		return $search_list;
	}

	protected function getPenyidikan($id)
	{
		$this->getDocument($id);
		$this->penyidikan = $this->doc->lpf->lpp->penyidikan;
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
			'dugaan_pelanggaran' => 'required',
			'petugas' => 'required',
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
		$data_split = [
			'dugaan_pelanggaran' => $request->dugaan_pelanggaran,
			'kode_jabatan' => $request->pemberi_perintah['jabatan']['kode'],
			'plh' => $request->pemberi_perintah['plh'],
			'pejabat_id' => $request->pemberi_perintah['user']['user_id'],
		];

		if ($state == 'insert') {
			$data_split['agenda_dok'] = $this->agenda_dok;
			$data_split['no_dok_lengkap'] = $no_dok_lengkap;
			$data_split['kode_status'] = 100;
		}

		return $data_split;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$lpf = DokLpf::find($request->id_lpf);
		if ($lpf->kode_status == 200) {
			$this->penyidikan = $lpf->lpp->penyidikan;
			$result = $this->storePenyidikanDocument($request);
			return $result;
		} else {
			$result = response()->json(['error' => `Dokumen LPF sudah ditindaklanjuti.`], 422);
			return $result;
		}
	}

	protected function stored($request)
	{
		// Save Petugas
		$this->savePetugas($request);

		// Save Tembusan
		$cc_list = array_filter($request->tembusan, 'strlen');
		if (sizeof($cc_list) > 0) {
			app(TembusanController::class)->setCc($this->model, $this->doc->id, $cc_list);
		}

		// Attach to LPF
		$this->attachLpf($request->id_lpf);
		$this->penyidikan->lpp->lpf->update(['kode_status' => 133]);
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
		// Check LPF availability
		$availability = true;
		$this->getDocument($id);
		$existing_lpf = $this->doc->lpf;
		if ($existing_lpf->id != $request->id_lpf) {
			$new_lpf = DokLpf::find($request->id_lpf);
			if ($new_lpf->kode_status != 200) {
				$availability = false;
			}
		}

		// Update SPLIT
		if ($availability == true) {
			$result = $this->updatePenyidikanDocument($request, $id);
			return $result;
		} else {
			$result = response()->json(['error' => `Dokumen LPF sudah ditindaklanjuti.`], 422);
			return $result;
		}
	}

	protected function updating($request)
	{
		$existing_lpf = $this->doc->lpf;
		if ($existing_lpf->id != $request->id_lpf) {
			// Detach from previous LPF
			$this->detachLpf();

			// Attach to new LPF and change status
			$this->attachLpf($request->id_lpf);
			DokLpf::find($request->id_lpf)->update(['kode_status' => 133]);
		}	
	}

	protected function updated($request)
	{
		// Update petugas
		$this->savePetugas($request);

		// Update tembusan
		$cc_list = array_filter($request->tembusan, 'strlen');
		app(TembusanController::class)->setCc($this->model, $this->doc->id, $cc_list);
	}

	protected function published()
	{
		$lpf = $this->doc->lpf;
		$lpf->update(['kode_status' => 233]);
	}

	private function savePetugas($request)
	{
		$list_petugas = array_map(function ($petugas)
		{
			return $petugas['user_id'];
		}, $request->petugas);
		$list_petugas = array_unique($list_petugas);
		$list_petugas = array_filter($list_petugas, 'strlen');
		$this->doc->petugas()->syncWithPivotValues($list_petugas, ['position' => 'petugas']);
	}

	/*
	 |--------------------------------------------------------------------------
	 | LPF functions
	 |--------------------------------------------------------------------------
	 */

	private function attachLpf($id_lpf)
	{
		$this->createRelation(
			'lpf',
			$id_lpf,
			'split',
			$this->doc->id
		);
	}

	public function detachLpf()
	{
		$this->doc->lpf->update(['kode_status' => 200]);
		$this->deleteRelation(
			'lpf',
			$this->doc->lpf->id,
			'split',
			$this->doc->id
		);
	}
}
