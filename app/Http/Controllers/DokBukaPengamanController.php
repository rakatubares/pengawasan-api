<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokBukaPengamanController extends DokPenindakanController
{
	public function __construct($doc_type='bukapengaman')
	{
		parent::__construct($doc_type);
	}

	/*
	 |--------------------------------------------------------------------------
	 | DISPLAY functions
	 |--------------------------------------------------------------------------
	 */

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
	protected function validateData(Request $request)
	{
		$request->validate([
			'sprint.id' => 'required|integer',
			'jenis_pengaman' => 'required',
			'jumlah_pengaman' => 'required|integer',
			'nomor_pengaman' => 'required',
			'saksi.id' => 'required|integer',
			'petugas1.user_id' => 'required'
		]);
	}

	protected function prepareData(Request $request, $state='insert')
	{
		$no_dok_lengkap = $this->tipe_surat . '-     ' . $this->agenda_dok;
		$tanggal_pengaman = date('Y-m-d', strtotime($request->tanggal_pengaman));

		$data_buka_pengaman = [
			'sprint_id' => $request->sprint['id'],
			'nomor_pengaman' => $request->nomor_pengaman,
			'tanggal_pengaman' => $tanggal_pengaman,
			'jenis_pengaman' => $request->jenis_pengaman,
			'jumlah_pengaman' => $request->jumlah_pengaman,
			'satuan_pengaman' => $request->satuan_pengaman,
			'tempat_pengaman' => $request->tempat_pengaman,
			'dasar_pengamanan' => $request->dasar_pengamanan,
			'saksi_id' => $request->saksi['id'],
			'petugas1_id' => $request->petugas1['user_id'],
			'petugas2_id' => $request->petugas2['user_id'],
		];

		if ($state == 'insert') {
			$data_buka_pengaman['agenda_dok'] = $this->agenda_dok;
			$data_buka_pengaman['no_dok_lengkap'] = $no_dok_lengkap;
			$data_buka_pengaman['kode_status'] = 100;
		}

		return $data_buka_pengaman;
	}

	public function store(Request $request)
	{
		$result = $this->storePenindakanDocument($request);
		return $result;
	}

	protected function stored($request)
	{
		// Create object relation
		$pengaman_id = $request->pengaman['id'];
		if ($pengaman_id == null) {
			$this->createPenindakan($request, true);
		} else {
			$this->createPengamanRelation($pengaman_id);
		}
	}

	public function update(Request $request, $id)
	{
		$result = $this->updatePenindakanDocument($request, $id);
		return $result;
	}

	protected function updating($request)
	{
		// Get existing data
		$existing_pengaman = $this->doc->penindakan->pengaman;
		$pengaman_id = $request->pengaman['id'];

		// Change existing pengaman if new pengaman is different
		if ($existing_pengaman == null) {
			if ($pengaman_id != null) {

				// Remove relation from existing penindakan,
				// ten create relation to the new pengaman
				$this->deletePenindakan();
				$this->createPengamanRelation($pengaman_id);

			}
		} else {
			if ($pengaman_id == null) {

				// Remove relation from existing pengaman, 
				// then create new penindakan
				$this->deletePengamanRelation();
				$this->createPenindakan($request, true);
				
			} else if ($pengaman_id != $existing_pengaman->id) {

				// Remove relation from existing pengaman, 
				// then create relation to the new one
				$this->deletePengamanRelation();
				$this->createPengamanRelation($pengaman_id);
				
			}
		}
	}

	private function createPengamanRelation($pengaman_id)
	{
		$pengaman = $this->getDocument($pengaman_id, 'pengaman');
		$penindakan_id = $pengaman->penindakan->id;
		$this->attachPenindakan($penindakan_id);
		$this->updateStatus($pengaman, 104);
	}

	private function deletePengamanRelation()
	{
		$this->doc->penindakan->pengaman->update(['kode_status' => 200]);
		$this->detachPenindakan();
	}

	protected function published()
	{
		// update pengaman status if exists
		$pengaman = $this->doc->penindakan->pengaman;
		if ($pengaman != null) {
			$this->updateStatus($pengaman, 204);
		}
	}
}
