<?php

namespace App\Http\Controllers;

use App\Models\DokRiksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokRiksaController extends DokPenindakanController
{
	public function __construct($doc_type='riksa')
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
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request, $linked_doc=false)
	{
		// Validate data penindakan if not from linked doc
		if ($linked_doc == false) {
			$this->validatePenindakan($request); 
		}

		DB::beginTransaction();
		try {
			// Save data pemeriksaan
			$no_dok_lengkap = $this->tipe_surat . '-     ' . $this->agenda_dok;
			$this->doc = DokRiksa::create([
				'agenda_dok' => $this->agenda_dok,
				'no_dok_lengkap' => $no_dok_lengkap,
				'kode_status' => 100,
			]);

			// Save data penindakan and create object relation
			if ($linked_doc == false) {
				$this->storePenindakan($request);
				$this->getDocument($this->doc->id);
				$this->createRelation('penindakan', $this->penindakan->id, $this->doc_type, $this->doc->id);
			}

			// Commit store query
			DB::commit();

			// Return created document
			$riksa_resource = $this->form($this->doc->id);
			return $riksa_resource;
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
				// Update data penindakan
				$this->validatePenindakan($request); 
				$this->updatePenindakan($request);

				// Commit store query
				DB::commit();

				// Return updated SBP
				$riksa_resource = $this->form($this->doc->id);
				$result = $riksa_resource;
			} catch (\Throwable $th) {
				DB::rollBack();
				throw $th;
			}
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan, tidak dapat mengupdate dokumen.'], 422);
		}
		
		return $result;
	}

	protected function publishing($id)
	{
		$this->getPenindakanDate($id);
		$this->updateDocYear();
	}
}