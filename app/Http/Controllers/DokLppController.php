<?php

namespace App\Http\Controllers;

use App\Http\Resources\DetailBarangItemWithImagesResource;
use App\Http\Resources\DetailBarangResource;
use App\Models\DetailBarangItem;
use App\Models\Lampiran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokLppController extends DokPenyidikanController
{
	public function __construct($doc_type='lpp')
	{
		parent::__construct($doc_type);
	}

	protected function getPenyidikan($id)
	{
		$this->getDocument($id);
		$this->penyidikan = $this->doc->penyidikan;
	}

	public function bhp($id)
	{
		$this->getPenyidikan($id);
		$bhp_resource = $this->getBhpData();
		
		return $bhp_resource;
	}

	public function insertBhp(Request $request, $id)
	{
		DB::beginTransaction();
		$caught = false;

		try {
			$this->getDocument($id);
			$data_barang = [
				'jumlah_kemasan' => $request->jumlah_kemasan,
				'kemasan_id' => $request->kemasan['id'],
				'pemilik_id' => $request->pemilik['id']
			];
			$bhp = $this->doc->penyidikan->bhp()->create($data_barang);

			if ($request->dokumen['no_dok'] != null) {
				$tgl_dok = $request->dokumen['tgl_dok'] != null ? strtotime($request->dokumen['tgl_dok']) : $request->dokumen['tgl_dok'];
				$data_dokumen = [
					'parent_type' => 'barang',
					'parent_id' => $bhp->id,
					'jns_dok' => $request->dokumen['jns_dok'],
					'no_dok' => $request->dokumen['no_dok'],
					'tgl_dok' => $tgl_dok,
				];
				$bhp->dokumen()->create($data_dokumen);
			}

			$this->doc->penyidikan->update(['bhp_id' => $bhp->id]);

			DB::commit();
		} catch (\Throwable $th) {
			$result = $th;
			DB::rollBack();
		}

		// Return doc detail if no exception detected
		if (!$caught) {
			$this->getDocument($id);
			$result = new DetailBarangResource($this->doc->penyidikan->bhp);
		}
		
		return $result;
	}

	public function updateBhp(Request $request, $id)
	{
		DB::beginTransaction();

		try {
			$this->getDocument($id);
			// Insert detail barang
			$data_barang = [
				'jumlah_kemasan' => $request->jumlah_kemasan,
				'kemasan_id' => $request->kemasan['id'],
				'pemilik_id' => $request->pemilik['id']
			];
			$this->doc->penyidikan->bhp()->update($data_barang);
	
			// Insert dokumen barang
			if ($request->dokumen['no_dok'] != null) {
				$tgl_dok = $request->dokumen['tgl_dok'] != null ? strtotime($request->dokumen['tgl_dok']) : $request->dokumen['tgl_dok'];
				$data_dokumen = [
					'jns_dok' => $request->dokumen['jns_dok'],
					'no_dok' => $request->dokumen['no_dok'],
					'tgl_dok' => $tgl_dok,
				];
				$this->doc->penyidikan->bhp->dokumen()->updateOrCreate($data_dokumen);
			}

			// Return doc detail
			$result = new DetailBarangResource($this->doc->penyidikan->bhp);

			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			$result = $th;
		}
		
		return $result;
	}

	public function insertBhpItem(Request $request, $id)
	{
		$this->getDocument($id);
		DB::beginTransaction();
		try {
			// Insert detail barang
			$item_barang = $this->doc->penyidikan->bhp->itemBarang()
				->create([
					'uraian_barang' => $request->uraian_barang,
					'jumlah_barang' => $request->jumlah_barang,
					'merk' => $request->merk,
					'kondisi' => $request->kondisi,
					'tipe' => $request->tipe,
					'spesifikasi_lain' => $request->spesifikasi_lain,
					'satuan_id' => $request->satuan['id'],
					'kategori_id' => $request->kategori['id'],
				]);

			// Save images
			if (sizeof($request->image_list) > 0) {
				foreach($request->image_list as $image) {
					$this->saveFile($image, $item_barang);
				}
			}

			DB::commit();
			$result = new DetailBarangItemWithImagesResource(DetailBarangItem::find($item_barang->id));
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}

		return $result;
	}

	public function getBhpItem($id, $item_id)
	{
		$this->getDocument($id);
		$item_barang = $this->doc->penyidikan->bhp->itemBarang()
			->where('detail_barang_items.id', $item_id)
			->first();
		
		if ($item_barang != null) {
			$result = new DetailBarangItemWithImagesResource($item_barang);
		} else {
			$result = response()->json(['error' => 'Item barang tidak ditemukan.'], 422);
		}

		return $result;
	}

	public function updateBhpItem(Request $request, $id, $item_id)
	{
		$this->getDocument($id);
		DB::beginTransaction();
		try {
			// Update data item barang
			$this->doc->penyidikan->bhp->itemBarang()
				->where('detail_barang_items.id', $item_id)
				->update([
					'uraian_barang' => $request->uraian_barang,
					'jumlah_barang' => $request->jumlah_barang,
					'merk' => $request->merk,
					'kondisi' => $request->kondisi,
					'tipe' => $request->tipe,
					'spesifikasi_lain' => $request->spesifikasi_lain,
					'satuan_id' => $request->satuan['id'],
					'kategori_id' => $request->kategori['id'],
				]);

			// Get existing images
			$item_barang = DetailBarangItem::find($item_id);
			$existing_images = $item_barang->images->all();

			// Delete image if not in request and save new image
			if (sizeof($existing_images) > 0) {
				$existing_ids = array_map(function($i) {return $i->id;}, $existing_images);
				$delete_ids = $existing_ids;
				
				// Check each image request
				foreach($request->image_list as $image) {
					if (array_key_exists('id', $image)) {
						if (($key = array_search($image['id'], $delete_ids)) !== false) {
							unset($delete_ids[$key]);
						}								
					} else {
						$this->saveFile($image, $item_barang);
					}
				}
				
				// Delete id
				foreach($delete_ids as $id) {
					Lampiran::find($id)->delete();
				}
			} else {
				foreach ($request->image_list as $image) {
					$this->saveFile($image, $item_barang);
				}
			}

			DB::commit();

			$result = new DetailBarangItemWithImagesResource(DetailBarangItem::find($item_id));
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
		
		return $result;
	}

	public function deleteBhpItem($doc_id, $item_id)
	{
		DetailBarangItem::find($item_id)->delete();
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
			'asal_perkara' => 'required',
			'waktu_pelanggaran' => 'date',
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
		$no_dok_lengkap = $this->tipe_surat . '-' . '      ' . $this->agenda_dok;

		$data_lpp = [
			'asal_perkara' => $request->asal_perkara,
			'jenis_penindakan' => $request->jenis_penindakan,
			'jenis_perkara' => $request->jenis_perkara,
			'status_pelanggaran' => $request->status_pelanggaran,
			'catatan' => $request->catatan,
			'petugas_id' => $request->petugas['user_id'],
			'kode_jabatan1' => $request->atasan1['jabatan']['kode'],
			'plh1' => $request->atasan1['plh'],
			'pejabat1_id' => $request->atasan1['user']['user_id'],
			'kode_jabatan2' => $request->atasan2['jabatan']['kode'],
			'plh2' => $request->atasan2['plh'],
			'pejabat2_id' => $request->atasan2['user']['user_id'],
			'kode_status' => $request->kode_status,
		];

		if ($state == 'insert') {
			$data_lpp['agenda_dok'] = $this->agenda_dok;
			$data_lpp['no_dok_lengkap'] = $no_dok_lengkap;
			$data_lpp['kode_status'] = 100;
		}

		return $data_lpp;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$lp = $this->getLp($request->lp_type, $request->id_lp);
		$is_available = $this->checkLp($lp);
		if ($is_available) {
			$this->penindakan = $lp->lphp->lptp->sbp->penindakan;
			$result = $this->storePenyidikanDocument($request);
			return $result;
		} else {
			$result = response()->json(['error' => `Dokumen LP sudah ditindaklanjuti.`], 422);
			return $result;
		}
	}

	protected function stored($request)
	{
		$this->storePenyidikan($request);
		$this->attachPenyidikan();
		$this->attachPenindakan();
		$object_penindakan = $this->penindakan->objectable();
		$lp = $this->getLpByPenindakan();
		$lp->update(['kode_status' => 131]);
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
		$this->getDocument($id);
		$is_unpublished = $this->checkUnpublished();
		if ($is_unpublished) {
			// Validate data
			$this->validateData($request);

			// Check LP
			$this->getPenyidikan($this->doc->id);
			$existing_lp = $this->getLpByPenindakan();
			$existing_lp_type = $existing_lp->lphp->lp_relation->object2_type;

			if (
				($request->lp_type != $existing_lp_type) ||
				($request->id_lp != $existing_lp->id)
			) {
				$request_lp = $this->getLp($request->lp_type, $request->id_lp);
				$lp_available = $this->checkLp($request_lp);
			} else {
				$lp_available = true;
			}

			// Update data
			if ($lp_available) {
				DB::beginTransaction();

				try {
					// Update LPP
					$data = $this->prepareData($request, 'update');
					$this->doc->update($data);

					// Update LP
					if (
						($request->lp_type != $existing_lp_type) ||
						($request->id_lp != $existing_lp->id)
					) {
						// Detach from previous penindakan
						$this->detachPenindakan();
						$existing_lp->update(['kode_status' => 200]);

						// Attach to new penindakan
						$request_penindakan_id = $request_lp->lphp->lptp->sbp->penindakan->id;
						$this->attachPenindakan($request_penindakan_id);
						$request_lp->update(['kode_status' => 131]);
					}

					// Update penyidikan
					$this->updatePenyidikan($request);

					// Commit query
					DB::commit();
		
					// Return data
					$resource = $this->form($id);
					return $resource;
				} catch (\Throwable $th) {
					DB::rollBack();
					throw $th;
				}
			} else {
				$result = response()->json(['error' => `Dokumen LP sudah ditindaklanjuti.`], 422);
				return $result;
			}
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan, tidak dapat mengupdate dokumen.'], 422);
			return $result;
		}
	}

	protected function published()
	{
		$lp = $this->getLpByPenindakan();
		$lp->update(['kode_status' => 231]);
	}

	private function getLp($lp_type, $id_lp)
	{
		$lp_model = $this->switchObject($lp_type, 'model');
		$lp = $lp_model::find($id_lp);
		return $lp;
	}

	private function getLpByPenindakan()
	{
		$penindakan = $this->doc->penyidikan->penindakan;
		$sbp_type = $penindakan->sbp_relation->object2_type;
		$lp = $penindakan->$sbp_type->lptp->lphp->lp;
		return $lp;
	}

	private function checkLp($lp)
	{
		if ($lp->kode_status == 200) {
			return true;
		} else {
			return false;
		}
	}
}
