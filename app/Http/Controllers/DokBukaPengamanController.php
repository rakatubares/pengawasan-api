<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokBukaPengamanResource;
use App\Http\Resources\DokBukaPengamanTableResource;
use App\Models\DokBukaPengaman;
use App\Models\DokPengaman;
use App\Models\ObjectRelation;
use App\Traits\DokumenTrait;
use App\Traits\SwitcherTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokBukaPengamanController extends Controller
{
	use DokumenTrait;
	use SwitcherTrait;

	public function __construct()
	{
		$this->doc_type = 'bukapengaman';
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
		$all_buka_pengaman = DokBukaPengaman::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$buka_pengaman_list = DokBukaPengamanTableResource::collection($all_buka_pengaman);
		return $buka_pengaman_list;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$segel = new DokBukaPengamanResource(DokBukaPengaman::findOrFail($id));
		return $segel;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function display($id)
	{
		$segel = new DokBukaPengamanResource(DokBukaPengaman::findOrFail($id), 'display');
		return $segel;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function form($id)
	{
		$segel = new DokBukaPengamanResource(DokBukaPengaman::findOrFail($id), 'form');
		return $segel;
	}

	/**
	 * Display object type
	 * 
	 * @param int $id
	 */
	public function objek($id)
	{
		$objek = new DokBukaPengamanResource(DokBukaPengaman::find($id), 'objek');
		return $objek;
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
			'jenis_pengaman' => 'required',
			'jumlah_pengaman' => 'required|integer',
			'nomor_pengaman' => 'required',
			'saksi.id' => 'required|integer',
			'petugas1.user_id' => 'required'
		]);
	}

	private function prepareData(Request $request, $state='insert')
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

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		// Validate data buka tanda pengaman
		$this->validateData($request);

		DB::beginTransaction();
		try {
			// Save data buka tanda pengaman
			$data_buka_pengaman = $this->prepareData($request, 'insert');
			$buka_pengaman = DokBukaPengaman::create($data_buka_pengaman);

			// Save data penindakan and create object relation
			$pengaman_id = $request->pengaman['id'];
			if ($pengaman_id == null) {
				$this->storePenindakan($request, 'bukapengaman', $buka_pengaman->id, true);
			} else {
				$pengaman = DokPengaman::find($pengaman_id);
				$penindakan_id = $pengaman->penindakan->id;
				$this->createRelation('penindakan', $penindakan_id, 'bukapengaman', $buka_pengaman->id);
				$pengaman->update(['kode_status' => 104]);
			}

			// Commit store query
			DB::commit();

			// Return created data
			$buka_pengaman_resource = new DokBukaPengamanResource(DokBukaPengaman::findOrFail($buka_pengaman->id), 'form');
			return $buka_pengaman_resource;
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
		$is_unpublished = $this->checkUnpublished(DokBukaPengaman::class, $id);

		// Update if not published
		if ($is_unpublished) {
			// Validate data buka tanda pengaman
			$this->validateData($request);

			DB::beginTransaction();
			try {
				// Get existing data
				$buka_pengaman = DokBukaPengaman::find($id);
				$existing_pengaman = $buka_pengaman->penindakan->pengaman;
				$pengaman_id = $request->pengaman['id'];

				// Change existing pengaman if new pengaman is different
				if ($existing_pengaman == null) {
					if ($pengaman_id != null) {

						// Remove existing relation between buka pengaman and penindakan
						$buka_pengaman->penindakan->delete();
						ObjectRelation::where([
							'object1_type' => 'penindakan',
							'object1_id' => $buka_pengaman->penindakan->id,
							'object2_type' => $this->doc_type,
							'object2_id' => $id
						])->delete();

						// Create relation to new penindakan
						$pengaman = DokPengaman::find($pengaman_id);
						$this->createRelation('penindakan', $pengaman->penindakan->id, $this->doc_type, $id);
						$pengaman->update(['kode_status' => 104]);

					}
				} else {
					if ($pengaman_id == null) {

						// Remove existing relation between buka pengaman and penindakan
						$existing_pengaman->update(['kode_status' => 200]);
						ObjectRelation::where([
							'object1_type' => 'penindakan',
							'object1_id' => $buka_pengaman->penindakan->id,
							'object2_type' => $this->doc_type,
							'object2_id' => $id
						])->delete();

						// Create new penindakan
						$this->storePenindakan($request, $this->doc_type, $buka_pengaman->id, true);

					} else if ($pengaman_id != $existing_pengaman->id) {

						// Remove existing relation between buka pengaman and penindakan
						$existing_pengaman->update(['kode_status' => 200]);
						ObjectRelation::where([
							'object1_type' => 'penindakan',
							'object1_id' => $buka_pengaman->penindakan->id,
							'object2_type' => $this->doc_type,
							'object2_id' => $id
						])->delete();

						// Create relation to new penindakan
						$pengaman = DokPengaman::find($pengaman_id);
						$penindakan_id = $pengaman->penindakan->id;
						$this->createRelation('penindakan', $penindakan_id, $this->doc_type, $buka_pengaman->id);
						$pengaman->update(['kode_status' => 104]);

					}
				}

				// Update BA Buka Tanda Pengaman
				$data_buka_pengaman = $this->prepareData($request, 'update');
				DokBukaPengaman::where('id', $id)->update($data_buka_pengaman);

				// Commit store query
				DB::commit();

				// Return updated data
				$buka_pengaman_resource = new DokBukaPengamanResource(DokBukaPengaman::findOrFail($id), 'form');
				$result = $buka_pengaman_resource;
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
			$this->getDocument(DokBukaPengaman::class, $id);
			$this->getCurrentDate();
			$number = $this->getNewDocNumber(DokBukaPengaman::class);
			$this->updateDocNumberAndYear($number, $this->tipe_surat, true);

			$pengaman = $this->doc->penindakan->pengaman;
			if ($pengaman != null) {
				$pengaman->update(['kode_status' => 204]);
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
			$is_unpublished = $this->checkUnpublished(DokBukaPengaman::class, $id);
			if ($is_unpublished) {
				DokBukaPengaman::find($id)->delete();
			}
			
			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}
}
