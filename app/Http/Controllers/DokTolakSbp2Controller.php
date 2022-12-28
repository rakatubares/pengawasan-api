<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokTolakSbp2Resource;
use App\Models\DokTolakSbp1;
use App\Models\DokTolakSbp2;
use App\Models\ObjectRelation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokTolakSbp2Controller extends DokPenindakanController
{
	public function __construct($doc_type='tolak2')
	{
		parent::__construct($doc_type);
	}

	/*
	 |--------------------------------------------------------------------------
	 | DISPLAY functions
	 |--------------------------------------------------------------------------
	 */

	private function getSbp($doc_id)
	{
		$this->getDocument($doc_id);
		$sbp_type = $this->doc->tolak1->sbp_relation->object1_type;
		$this->sbp = $this->doc->tolak1->$sbp_type;
	}

	protected function getPenindakan($doc_id)
	{
		$this->getSbp($doc_id);
		$this->penindakan = $this->sbp->penindakan;
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
			'id_tolak1' => 'required|integer',
			'alasan' => 'required',
			'saksi.id' => 'required|integer',
			'petugas1.user_id' => 'required|integer',
			'petugas2.user_id' => 'nullable|integer',
		]);
	}

	private function prepareData(Request $request, $state='insert')
	{
		$no_dok_lengkap = $this->tipe_surat . '-     ' . $this->agenda_dok;
		
		$data = [
			'sprint_id' => $request->sprint['id'],
			'alasan' => $request->alasan,
			'saksi_id' => $request->saksi['id'],
			'petugas1_id' => $request->petugas1['user_id'],
			'petugas2_id' => $request->petugas2['user_id'],
		];

		if ($state == 'insert') {
			$data['agenda_dok'] = $this->agenda_dok;
			$data['no_dok_lengkap'] = $no_dok_lengkap;
			$data['kode_status'] = 100;
		};

		return $data;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		// Validate data contoh
		$this->validateData($request);

		DB::beginTransaction();
		try {
			// Cek BA Penolakan
			$tolak1 = DokTolakSbp1::find($request->id_tolak1);
			$tolak2 = $tolak1->tolak2;

			if ($tolak2 == null) {
				// Save data
				$data_tolak2 = $this->prepareData($request, 'insert');
				$tolak2 = DokTolakSbp2::create($data_tolak2);

				// Create relation
				$this->createRelation('tolak1', $tolak1->id, 'tolak2', $tolak2->id);
				$tolak1->update(['status_tolak' => 0]);

				// Commit store query
				DB::commit();

				// Return data
				$resource = new DokTolakSbp2Resource(DokTolakSbp2::findOrFail($tolak2->id), 'form');
				return $resource;
			} else {
				$result = response()->json(['error' => 'BA Penolakan SBP telah dibuat BA Penolakan.'], 422);
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

		if ($is_unpublished) {
			// Validate data
			$this->validateData($request);

			DB::beginTransaction();
			try {
				// Check existing id_tolak1
				$existing_tolak2 = DokTolakSbp2::find($id);
				$existing_tolak1 = $existing_tolak2->tolak1;
				$existing_tolak1_id = $existing_tolak1->id;

				if ($existing_tolak1_id != $request->id_tolak1) {
					// Destroy existing relation
					$existing_tolak1->update(['status_tolak' => null]);
					ObjectRelation::where([
						'object2_type' => 'tolak2',
						'object2_id' => $id
					])->delete();

					// Check if BA Penolakan SBP already has Penolakan
					$tolak1 = DokTolakSbp1::find($request->id_tolak1);
					$tolak2 = $tolak1->tolak2;

					if ($tolak2 == null) {
						// Save data
						$data_tolak2 = $this->prepareData($request);
						DokTolakSbp2::find($id)->update($data_tolak2);
						
						// Create relation
						$this->createRelation('tolak1', $tolak1->id, 'tolak2', $id);

						// Change BA Penolakan SBP status
						$tolak1->update(['status_tolak' => 0]);

						// Commit store query
						DB::commit();

						// Return data
						$tolak2_resource = new DokTolakSbp2Resource(DokTolakSbp2::findOrFail($id), 'form');
						return $tolak2_resource;
					} else {
						$result = response()->json(['error' => 'BA Penolakan SBP telah dibuat BA Penolakan.'], 422);
						return $result;
					}
				} else {
					// Save data 
					$data_tolak2 = $this->prepareData($request);
					DokTolakSbp2::find($id)->update($data_tolak2);

					// Commit store query
					DB::commit();

					// Return data
					$tolak2_resource = new DokTolakSbp2Resource(DokTolakSbp2::findOrFail($id), 'form');
					return $tolak2_resource;
				}
			} catch (\Throwable $th) {
				DB::rollBack();
				throw $th;
			}
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan, tidak dapat mengupdate dokumen.'], 422);
			return $result;
		}
	}

	protected function published()
	{
		// Find SBP
		$doc_id = $this->doc->id;
		$this->getSbp($doc_id);
		
		// Change SBP status
		$this->sbp->update(['status_tolak' => 1]);
	}
}
