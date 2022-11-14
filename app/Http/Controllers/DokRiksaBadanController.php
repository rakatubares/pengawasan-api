<?php

namespace App\Http\Controllers;

use App\Traits\DetailTrait;
use Illuminate\Http\Request;

class DokRiksaBadanController extends DokPenindakanController
{
	use DetailTrait;

	public function __construct($doc_type='riksabadan')
	{
		parent::__construct($doc_type);
	}

	/*
	 |--------------------------------------------------------------------------
	 | Data modify functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Validate request
	 */
	protected function validateData(Request $request, $linked_doc=false)
	{
		if (!$linked_doc) {
			$request->validate([
				'orang.id' => 'required|integer',
			]);
		}
		
		$request->validate([
			'pendamping.id' => 'nullable|integer',
			'sarkut.pilot.id' => 'nullable|integer',
			'dokumen.tgl_dok' => 'nullable|date',
			'saksi.id' => 'nullable|integer',
		]);
	}

	/**
	 * Prepare data
	 */
	protected function prepareData(Request $request, $state='insert')
	{
		$no_dok_lengkap = $this->tipe_surat . '-     ' . $this->agenda_dok; 

		$data_riksa_badan = [
			'asal' => $request->asal,
			'tujuan' => $request->tujuan,
			'pendamping_id' => $request->pendamping['id'],
			'uraian_pemeriksaan' => $request->uraian_pemeriksaan,
			'hasil_pemeriksaan' => $request->hasil_pemeriksaan,
			'saksi_id' => $request->saksi['id'],
		];

		if ($state == 'insert') {
			$data_riksa_badan['agenda_dok'] = $this->agenda_dok;
			$data_riksa_badan['no_dok_lengkap'] = $no_dok_lengkap;
			$data_riksa_badan['nomor_segel'] = $no_dok_lengkap;
			$data_riksa_badan['kode_status'] = 100;
		}

		return $data_riksa_badan;
	}

	public function store(Request $request)
	{
		$result = $this->storePenindakanDocument($request);
		return $result;
	}

	protected function stored($request)
	{
		// Save data sarkut
		if (
			($request->sarkut['nama_sarkut'] != null) ||
			($request->sarkut['jenis_sarkut'] != null)
		) {
			$sarkut = $this->createSarkut($request->sarkut);
			$this->doc->update(['sarkut_id' => $sarkut->id]);
		}

		// Save data dokumen barang
		if ($request->dokumen['no_dok'] != null) {
			$this->createDocument($this->doc, $request->dokumen);
		}

		// Create penindakan
		$this->storePenindakan($request);
		$this->penindakanOrang($request->orang);
		$this->createRelation('penindakan', $this->penindakan->id, $this->doc_type, $this->doc->id);
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
		$result = $this->updatePenindakanDocument($request, $id);
		return $result;
	}

	protected function updated($request)
	{
		// Update sarkut
		if (
			($request->sarkut['nama_sarkut'] != null) ||
			($request->sarkut['jenis_sarkut'] != null)
		) {
			// Check existed sarkut
			$existed_sarkut_id = $this->doc->sarkut_id;
			if ($existed_sarkut_id != null) {
				$this->updateSarkut($request->sarkut, $existed_sarkut_id);
			} else {
				$sarkut = $this->createSarkut($request->sarkut);
				$this->doc->update(['sarkut_id' => $sarkut->id]);
			}
		} else {
			// Check existed sarkut
			$existed_sarkut_id = $this->doc->sarkut_id;
			if ($existed_sarkut_id != null) {
				$this->deleteSarkut($existed_sarkut_id);
				$this->doc->update(['sarkut_id' => null]);
			}
		}

		// Update dokumen barang
		if ($request->dokumen['no_dok'] != null) {
			// Check existed document
			$existed_dokumen = $this->doc->dokumen;
			if ($existed_dokumen != null) {
				$this->createDocument($request->dokumen);
			} else {
				$this->updateDocument($request->dokumen);
			}
		} else {
			// Check existed document
			$existed_dokumen = $this->doc->dokumen;
			if ($existed_dokumen != null) {
				$this->deleteDocument();
			}
		}

		$this->updatePenindakan($request);

		// Update orang
		if ($request->orang['id'] != $this->doc->penindakan->object_id) {
			$this->doc->penindakan()->update([
				'object_id' => $request->orang['id'],
				'saksi_id' => $request->orang['id'],
			]);
		}
	}

	protected function publishing($id)
	{
		$this->getPenindakanDate($id);
	}
}