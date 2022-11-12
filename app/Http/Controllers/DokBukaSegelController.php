<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokBukaSegelResource;
use App\Http\Resources\DokBukaSegelTableResource;
use App\Models\DokBukaSegel;
use App\Models\DokSegel;
use App\Models\ObjectRelation;
use App\Traits\DokumenTrait;
use App\Traits\SwitcherTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokBukaSegelController extends Controller
{
	use DokumenTrait;
	use SwitcherTrait;

	public function __construct()
	{
		$this->doc_type = 'bukasegel';
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
		$all_buka_segel = DokBukaSegel::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$buka_segel_list = DokBukaSegelTableResource::collection($all_buka_segel);
		return $buka_segel_list;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$buka_segel = new DokBukaSegelResource(DokBukaSegel::findOrFail($id));
		return $buka_segel;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function display($id)
	{
		$buka_segel = new DokBukaSegelResource(DokBukaSegel::findOrFail($id), 'display');
		return $buka_segel;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function form($id)
	{
		$buka_segel = new DokBukaSegelResource(DokBukaSegel::findOrFail($id), 'form');
		return $buka_segel;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function objek($id)
	{
		$buka_segel = new DokBukaSegelResource(DokBukaSegel::findOrFail($id), 'objek');
		return $buka_segel;
	}

	/*
	 |--------------------------------------------------------------------------
	 | Data modify functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Validate request
	 */
	private function validateBukaSegel(Request $request)
	{
		$request->validate([
			'sprint.id' => 'required|integer',
			'segel.id' => 'nullable|integer',
			'jenis_segel' => 'required',
			'jumlah_segel' => 'required|integer',
			'nomor_segel' => 'required',
			'saksi.id' => 'required|integer',
			'petugas1.user_id' => 'required'
		]);
	}

	private function prepareData(Request $request, $state='insert')
	{
		$no_dok_lengkap = $this->tipe_surat . '-     ' . $this->agenda_dok;
		$tanggal_segel = date('Y-m-d', strtotime($request->tanggal_segel));

		$data_buka_segel = [
			'sprint_id' => $request->sprint['id'],
			'nomor_segel' => $request->nomor_segel,
			'tanggal_segel' => $tanggal_segel,
			'jenis_segel' => $request->jenis_segel,
			'jumlah_segel' => $request->jumlah_segel,
			'satuan_segel' => $request->satuan_segel,
			'tempat_segel' => $request->tempat_segel,
			'saksi_id' => $request->saksi['id'],
			'petugas1_id' => $request->petugas1['user_id'],
			'petugas2_id' => $request->petugas2['user_id'],
		];

		if ($state == 'insert') {
			$data_buka_segel['agenda_dok'] = $this->agenda_dok;
			$data_buka_segel['no_dok_lengkap'] = $no_dok_lengkap;
			$data_buka_segel['kode_status'] = 100;
		}

		return $data_buka_segel;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{ 
		// Validate data
		$this->validateBukaSegel($request);

		DB::beginTransaction();
		try {
			// Save data
			$data_buka_segel = $this->prepareData($request, 'insert');
			$buka_segel = DokBukaSegel::create($data_buka_segel);

			// Save data and create object relation
			$segel_id = $request->segel['id'];
			if ($segel_id == null) {
				$this->storePenindakan($request, 'bukasegel', $buka_segel->id, true);
			} else {
				$segel = DokSegel::find($segel_id);
				$penindakan_id = $segel->penindakan->id;
				$this->createRelation('penindakan', $penindakan_id, 'bukasegel', $buka_segel->id);
				$segel->update(['kode_status' => 101]);
			}

			// Commit store query
			DB::commit();

			// Return created data
			$buka_segel_resource = new DokBukaSegelResource(DokBukaSegel::findOrFail($buka_segel->id), 'form');
			return $buka_segel_resource;
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
	public function update(Request $request, $id, $linked_doc=false)
	{
		// Check if document is not published yet
		$is_unpublished = $this->checkUnpublished(DokBukaSegel::class, $id);

		// Update if not published
		if ($is_unpublished) {
			// Validate data
			$this->validateBukaSegel($request);

			DB::beginTransaction();
			try {
				// Get existing data
				$buka_segel = DokBukaSegel::find($id);
				$existing_segel = $buka_segel->penindakan->segel;
				$segel_id = $request->segel['id'];
				
				// Change existing segel if new segel is different
				if ($existing_segel == null) {
					if ($segel_id != null) {

						// Remove existing relation between buka segel and penindakan
						$buka_segel->penindakan->delete();
						ObjectRelation::where([
							'object1_type' => 'penindakan',
							'object1_id' => $buka_segel->penindakan->id,
							'object2_type' => $this->doc_type,
							'object2_id' => $id
						])->delete();

						// Create relation to new penindakan
						$segel = DokSegel::find($segel_id);
						$this->createRelation('penindakan', $segel->penindakan->id, 'bukasegel', $id);
						$segel->update(['kode_status' => 101]);

					}
				} else {
					if ($segel_id == null) {

						// Remove existing relation between buka segel and penindakan
						$existing_segel->update(['kode_status' => 200]);
						ObjectRelation::where([
							'object1_type' => 'penindakan',
							'object1_id' => $buka_segel->penindakan->id,
							'object2_type' => $this->doc_type,
							'object2_id' => $id
						])->delete();

						// Create new penindakan
						$this->storePenindakan($request, 'bukasegel', $buka_segel->id, true);

					} else if ($segel_id != $existing_segel->id) {

						// Remove existing relation between buka segel and penindakan
						$existing_segel->update(['kode_status' => 200]);
						ObjectRelation::where([
							'object1_type' => 'penindakan',
							'object1_id' => $buka_segel->penindakan->id,
							'object2_type' => $this->doc_type,
							'object2_id' => $id
						])->delete();

						// Create relation to new penindakan
						$segel = DokSegel::find($segel_id);
						$penindakan_id = $segel->penindakan->id;
						$this->createRelation('penindakan', $penindakan_id, 'bukasegel', $buka_segel->id);
						$segel->update(['kode_status' => 101]);

					}
				}

				// Update data
				$data_buka_segel = $this->prepareData($request, 'update');
				DokBukaSegel::where('id', $id)->update($data_buka_segel);

				// Commit store query
				DB::commit();

				// Return updated data
				$buka_segel_resource = new DokBukaSegelResource(DokBukaSegel::findOrFail($id), 'form');
				$result = $buka_segel_resource;
			} catch (\Throwable $th) {
				DB::rollBack();
				throw $th;
			}
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan, tidak dapat mengupdate dokumen.'], 422);
		}
		
		return $result;
	}

	/**
	 * Terbitkan penomoran dokumen
	 * 
	 * @param  int  $id
	 */
	public function publish($id)
	{
		DB::beginTransaction();
		try {
			$this->getDocument(DokBukaSegel::class, $id);
			$this->getCurrentDate();
			$number = $this->getNewDocNumber(DokBukaSegel::class);
			$this->updateDocNumberAndYear($number, $this->tipe_surat, true);

			$segel = $this->doc->penindakan->segel;
			if ($segel != null) {
				$segel->update(['kode_status' => 201]);
			}
			
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
			$is_unpublished = $this->checkUnpublished(DokBukaSegel::class, $id);
			if ($is_unpublished) {
				DokBukaSegel::find($id)->delete();
			}
			
			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}

	
}
