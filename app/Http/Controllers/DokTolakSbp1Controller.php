<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokTolakSbp1Resource;
use App\Http\Resources\DokTolakSbp1TableResource;
use App\Models\DokSbp;
use App\Models\DokTolakSbp1;
use App\Models\ObjectRelation;
use App\Traits\DokumenTrait;
use App\Traits\SwitcherTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokTolakSbp1Controller extends Controller
{
	use DokumenTrait;
	use SwitcherTrait;

	public function __construct()
	{
		$this->doc_type = 'tolak1';
		$this->tipe_surat = $this->switchObject($this->doc_type, 'tipe_dok');
		$this->agenda_dok = $this->switchObject($this->doc_type, 'agenda');
	}

	/*
	 |--------------------------------------------------------------------------
	 | DISPLAY functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$all_doc = DokTolakSbp1::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$doc_list = DokTolakSbp1TableResource::collection($all_doc);
		return $doc_list;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$tolak1 = new DokTolakSbp1Resource(DokTolakSbp1::findOrFail($id));
		return $tolak1;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function display($id)
	{
		$tolak1 = new DokTolakSbp1Resource(DokTolakSbp1::findOrFail($id), 'display');
		return $tolak1;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function form($id)
	{
		$tolak1 = new DokTolakSbp1Resource(DokTolakSbp1::findOrFail($id), 'form');
		return $tolak1;
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
			$sbp = DokSbp::find($request->id_sbp);
			$tolak1 = $sbp->tolak1;

			if ($tolak1 == null) {
				// Save data
				$data_tolak1 = $this->prepareData($request, 'insert');
				$tolak1 = DokTolakSbp1::create($data_tolak1);

				// Create relation
				$this->createRelation('sbp', $sbp->id, 'tolak1', $tolak1->id);
				$sbp->update(['status_tolak' => 10]);

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
		$is_unpublished = $this->checkUnpublished(DokTolakSbp1::class, $id);

		if ($is_unpublished) {
			// Validate data
			$this->validateData($request);

			DB::beginTransaction();
			try {
				// Check existing id_sbp
				$existing_tolak1 = DokTolakSbp1::find($id);
				$existing_sbp = $existing_tolak1->sbp;
				$existing_sbp_id = $existing_sbp->id;

				if ($existing_sbp_id != $request->id_sbp) {
					// Destroy existing relation
					$existing_sbp->update(['status_tolak' => null]);
					ObjectRelation::where([
						'object2_type' => 'tolak1',
						'object2_id' => $id
					])->delete();

					// Check if SBP already has Penolakan
					$sbp = DokSbp::find($request->id_sbp);
					$tolak1 = $sbp->tolak1;

					if ($tolak1 == null) {
						// Save data
						$data_tolak1 = $this->prepareData($request);
						DokTolakSbp1::find($id)->update($data_tolak1);
						
						// Create relation
						$this->createRelation('sbp', $sbp->id, 'tolak1', $id);

						// Change SBP status
						$sbp->update(['status_tolak' => 10]);

						// Commit store query
						DB::commit();

						// Return data
						$tolak1_resource = new DokTolakSbp1Resource(DokTolakSbp1::findOrFail($id), 'form');
						return $tolak1_resource;
					} else {
						$result = response()->json(['error' => 'SBP telah dibuat BA Penolakan.'], 422);
						return $result;
					}
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
			} catch (\Throwable $th) {
				DB::rollBack();
				throw $th;
			}
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan, tidak dapat mengupdate dokumen.'], 422);
			return $result;
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function publish($id)
	{
		DB::beginTransaction();
		try {
			// Update doc
			$this->getDocument(DokTolakSbp1::class, $id);
			$this->getCurrentDate();
			$number = $this->getNewDocNumber(DokTolakSbp1::class);
			$this->updateDocNumberAndYear($number, $this->tipe_surat, true);

			// Find SBP
			$tolak1 = DokTolakSbp1::find($id);
			$sbp = $tolak1->sbp;
			
			// Change SBP status
			$sbp->update(['status_tolak' => 11]);

			// Commit query
			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}

	/*
	 |--------------------------------------------------------------------------
	 | Destroy function
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		DB::beginTransaction();
		try {
			$is_unpublished = $this->checkUnpublished(DokTolakSbp1::class, $id);
			if ($is_unpublished) {
				DokTolakSbp1::find($id)->delete();
			}

			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}
}
