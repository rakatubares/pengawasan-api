<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokTitipResource;
use App\Models\DokSegel;
use App\Models\DokTitip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokTitipController extends DokPenindakanController
{
	public function __construct($doc_type='titip')
	{
		parent::__construct($doc_type);
	}

	/*
	 |--------------------------------------------------------------------------
	 | DISPLAY functions
	 |--------------------------------------------------------------------------
	 */

	protected function getPenindakan($doc_id)
	{
		$this->getDocument($doc_id);
		$this->penindakan = $this->doc->segel->penindakan;
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
	 */
	private function validateData(Request $request)
	{
		$request->validate([
			'sprint.id' => 'required|integer',
			'segel.id' => 'required|integer',
			'lokasi_titip' => 'required',
			'penerima.id' => 'required|integer',
			'saksi.id' => 'nullable|integer',
			'petugas1.user_id' => 'required|integer',
			'petugas2.user_id' => 'nullable|integer',
		]);
	}

	/**
	 * Prepare data titip
	 */
	private function prepareData(Request $request, $state='insert')
	{
		$no_dok_lengkap = $this->tipe_surat . '-     ' . $this->agenda_dok;

		$data_titip = [
			'sprint_id' => $request->sprint['id'],
			'lokasi_titip' => $request->lokasi_titip,
			'penerima_id' => $request->penerima['id'],
			'saksi_id' => $request->saksi['id'],
			'petugas1_id' => $request->petugas1['user_id'],
			'petugas2_id' => $request->petugas2['user_id'],
		];

		if ($state == 'insert') {
			$data_titip['agenda_dok'] = $this->agenda_dok;
			$data_titip['no_dok_lengkap'] = $no_dok_lengkap;
			$data_titip['kode_status'] = 100;
		};

		return $data_titip;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		// Validate data titip
		$this->validateData($request);

		DB::beginTransaction();
		try {
			// Cek titip
			$segel = DokSegel::find($request->segel['id']);
			$titip = $segel->titip;

			if ($titip == null) {
				// Save data titip
				$data_titip = $this->prepareData($request, 'insert');
				$titip = DokTitip::create($data_titip);

				// Create relation
				$this->createRelation('segel', $segel->id, 'titip', $titip->id);

				// Change BA Titip status
				$segel->update(['kode_status' => 105]);

				// Commit store query
				DB::commit();

				// Return BA Titip
				$titip_resource = new DokTitipResource(DokTitip::findOrFail($titip->id), 'form');
				return $titip_resource;
			} else {
				$result = response()->json(['error' => 'BA Segel telah dibuat BA Penitipan.'], 422);
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

		// Update if not published
		if ($is_unpublished) {
			DB::beginTransaction();

			try {
				// Validate data segel
				$this->validateData($request);

				// Update BA Titip
				$data_titip = $this->prepareData($request, 'update');
				DokTitip::where('id', $id)->update($data_titip);

				// Commit store query
				DB::commit();

				// Return updated BA Titip
				$titip_resource = new DokTitipResource(DokTitip::findOrFail($id), 'form');
				$result = $titip_resource;
			} catch (\Throwable $th) {
				DB::rollBack();
				throw $th;
			}
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan, tidak dapat mengupdate dokumen.'], 422);
		}

		return $result;
	}

	protected function published()
	{
		$segel = $this->doc->segel;
		if ($segel != null) {
			$segel->update(['kode_status' => 205]);
		}
	}
}
