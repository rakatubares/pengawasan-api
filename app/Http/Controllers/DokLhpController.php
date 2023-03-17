<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokLhpTableResource;
use App\Models\DokLhp;
use App\Models\DokSplit;
use Illuminate\Http\Request;

class DokLhpController extends DokPenyidikanController
{
	public function __construct($doc_type='lhp')
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

		$search_result = DokLhp::where(function ($query) use ($search, $status) {
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
		$search_list = DokLhpTableResource::collection($search_result);
		return $search_list;
	}

	protected function getPenyidikan($id)
	{
		$this->getDocument($id);
		$this->penyidikan = $this->doc->split->lpf->lpp->penyidikan;
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
			'id_split' => 'integer|required',
			'peneliti.user_id' => 'integer|required',
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
		$data_lhp = [
			'kesimpulan' => $request->kesimpulan,
			'alternatif_penyelesaian' => $request->alternatif_penyelesaian,
			'informasi_lain' => $request->informasi_lain,
			'catatan' => $request->catatan,
			'peneliti_id' => $request->peneliti['user_id'],
			'kode_jabatan1' => $request->atasan1['jabatan']['kode'],
			'plh1' => $request->atasan1['plh'],
			'pejabat1_id' => $request->atasan1['user']['user_id'],
			'kode_jabatan2' => $request->atasan2['jabatan']['kode'],
			'plh2' => $request->atasan2['plh'],
			'pejabat2_id' => $request->atasan2['user']['user_id'],
		];

		if ($state == 'insert') {
			$data_lhp['agenda_dok'] = $this->agenda_dok;
			$data_lhp['no_dok_lengkap'] = $no_dok_lengkap;
			$data_lhp['kode_status'] = 100;
		}

		return $data_lhp;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$split = DokSplit::find($request->id_split);
		if ($split->kode_status == 200) {
			$this->penyidikan = $split->lpf->lpp->penyidikan;
			$result = $this->storePenyidikanDocument($request);
			return $result;
		} else {
			$result = response()->json(['error' => `Dokumen LHP sudah ditindaklanjuti.`], 422);
			return $result;
		}
	}

	protected function stored($request)
	{
		// Save Petugas
		$this->saveSaksi($request);

		// Attach to SPLIT
		$this->attachSplit($request->id_split);
		$this->penyidikan->lpp->lpf->split->update(['kode_status' => 134]);
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
		// Check SPLIT availability
		$availability = true;
		$this->getDocument($id);
		$existing_split = $this->doc->split;
		if ($existing_split->id != $request->id_split) {
			$new_split = DokSplit::find($request->id_split);
			if ($new_split->kode_status != 200) {
				$availability = false;
			}
		}

		// Update LHP
		if ($availability == true) {
			$result = $this->updatePenyidikanDocument($request, $id);
			return $result;
		} else {
			$result = response()->json(['error' => `Dokumen SPLIT sudah ditindaklanjuti.`], 422);
			return $result;
		}
	}

	protected function updating($request)
	{
		$existing_split = $this->doc->split;
		if ($existing_split->id != $request->id_split) {
			// Detach from previous SPLIT
			$this->detachSplit();

			// Attach to new SPLIT and change status
			$this->attachSplit($request->id_split);
			DokSplit::find($request->id_lpf)->update(['kode_status' => 134]);
		}	
	}

	protected function updated($request)
	{
		// Update saksi
		$this->saveSaksi($request);
	}

	protected function published()
	{
		$lpf = $this->doc->split;
		$lpf->update(['kode_status' => 234]);
	}

	private function saveSaksi($request)
	{
		$list_saksi = array_map(function ($saksi)
		{
			return $saksi['id'];
		}, $request->saksi);
		$list_saksi = array_unique($list_saksi);
		$list_saksi = array_filter($list_saksi, 'strlen');
		$this->doc->saksi()->syncWithPivotValues($list_saksi, ['position' => 'saksi']);
	}

	/*
	 |--------------------------------------------------------------------------
	 | SPLIT functions
	 |--------------------------------------------------------------------------
	 */
	
	private function attachSplit($id_split)
	{
		$this->createRelation(
			'split',
			$id_split,
			'lhp',
			$this->doc->id
		);
	}

	public function detachSplit()
	{
		$this->doc->split->update(['kode_status' => 200]);
		$this->deleteRelation(
			'split',
			$this->doc->split->id,
			'lhp',
			$this->doc->id
		);
	}
}
