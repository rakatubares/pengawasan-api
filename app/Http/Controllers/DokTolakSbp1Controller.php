<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokTolakSbp1Resource;
use App\Http\Resources\DokTolakSbp1TableResource;
use App\Models\DokTolakSbp1;
use App\Models\ObjectRelation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokTolakSbp1Controller extends DokPenindakanController
{
	public function __construct($doc_type='tolak1')
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
		$sbp_type = $this->doc->sbp_relation->object1_type;
		$this->sbp = $this->doc->$sbp_type;
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

	/**
	 * Display resource based on search query
	 * 
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function search(Request $request)
	{
		$src = $request->src;
		$flt = $request->flt;
		$exc = $request->exc;
		$search = '%' . $src . '%';

		$search_result = DokTolakSbp1::where(function ($query) use ($search, $flt) 
			{
				$query->where('no_dok_lengkap', 'like', $search)
					->when($flt != null, function ($query) use ($flt)
					{
						foreach ($flt as $column => $value) {
							if (is_array($value)) {
								$query->whereIn($column, $value);
							} else if ($value == null) {
								$query->where($column, $value);
							} else {
								$search_value = '%' . $value . '%';
								$query->where($column, 'like', $search_value);
							}
						}
						return $query;
					});
			})
			->when($exc != null, function ($query) use ($exc)
			{
				return $query->orWhere('id', $exc);
			})
			->orderBy('created_at', 'desc')
			->orderBy('id', 'desc')
			->take(5)
			->get();
		$search_list = DokTolakSbp1TableResource::collection($search_result);
		return $search_list;
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
			'sbp_type' => 'required',
			'id_sbp' => 'required|integer',
			'alasan' => 'required',
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
			$sbp_type = $request->sbp_type;
			$sbp_model = $this->switchObject($sbp_type, 'model');
			$sbp = $sbp_model::find($request->id_sbp);
			$tolak1 = $sbp->tolak1;

			if ($tolak1 == null) {
				// Save data
				$data_tolak1 = $this->prepareData($request, 'insert');
				$tolak1 = DokTolakSbp1::create($data_tolak1);

				// Create relation
				$this->createRelation($sbp_type, $sbp->id, $this->doc_type, $tolak1->id);
				$sbp->update(['status_tolak' => 0]);

				// Commit store query
				DB::commit();

				// Return data
				$resource = new DokTolakSbp1Resource(DokTolakSbp1::findOrFail($tolak1->id), 'form');
				return $resource;
			} else {
				$result = response()->json(['error' => 'SBP telah dibuat BA Penolakan.'], 422);
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
				// Check existing id_sbp
				$existing_tolak1 = DokTolakSbp1::find($id);
				$existing_sbp_type = $existing_tolak1->sbp_relation->object1_type;
				$existing_sbp = $existing_tolak1[$existing_sbp_type];
				$existing_sbp_id = $existing_sbp->id;
				$sbp_model = $this->switchObject($request->sbp_type, 'model');

				if ($existing_sbp_type == $request->sbp_type) {
					if ($existing_sbp_id != $request->id_sbp) {
						$this->changeRelation($existing_sbp, $id, $sbp_model, $request);
					} else {
						// Save data 
						$data_tolak1 = $this->prepareData($request);
						DokTolakSbp1::find($id)->update($data_tolak1);

						// Commit store query
						DB::commit();

						// Return data
						$tolak1_resource = new DokTolakSbp1Resource(DokTolakSbp1::findOrFail($id), 'form');
						return $tolak1_resource;
					}
				} else {
					$this->changeRelation($existing_sbp, $id, $sbp_model, $request);
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

	private function changeRelation($existing_sbp, $tolak1_id, $sbp_model, $request)
	{
		$existing_sbp->update(['status_tolak' => null]);
		ObjectRelation::where([
			'object2_type' => $this->doc_type,
			'object2_id' => $tolak1_id
		])->delete();

		// Check if SBP already has Penolakan
		$sbp = $sbp_model::find($request->id_sbp);
		$tolak1 = $sbp->tolak1;

		if ($tolak1 == null) {
			// Save data
			$data_tolak1 = $this->prepareData($request);
			DokTolakSbp1::find($tolak1_id)->update($data_tolak1);
			
			// Create relation
			$this->createRelation($request->sbp_type, $sbp->id, $this->doc_type, $tolak1_id);

			// Change SBP status
			$sbp->update(['status_tolak' => 0]);

			// Commit store query
			DB::commit();

			// Return data
			$tolak1_resource = new DokTolakSbp1Resource(DokTolakSbp1::findOrFail($tolak1_id), 'form');
			return $tolak1_resource;
		} else {
			$result = response()->json(['error' => 'SBP telah dibuat BA Penolakan.'], 422);
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
