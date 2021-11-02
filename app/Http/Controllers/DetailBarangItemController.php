<?php

namespace App\Http\Controllers;

use App\Http\Resources\DetailBarangItemResource;
use App\Traits\DokumenTrait;
use App\Traits\SwitcherTrait;
use Illuminate\Http\Request;

class DetailBarangItemController extends Controller
{
	use DokumenTrait;
	use SwitcherTrait;

    /**
     * Get valid penindakan barang id.
     *
     * @param  string  $doc_type
     * @param  int  $doc_id
	 * @return int  $detail_barang id
     */
	private function getDetailBarangId($doc_type, $doc_id)
	{
		$detail_barang = new DetailBarangController();
		$detail_barang_data = $detail_barang->show($doc_type, $doc_id);
		$detail_barang_id = $detail_barang_data->id;
		return $detail_barang_id;
	}

	/**
     * Display a listing of the resource.
     *
	 * @param  string  $doc_type
     * @param  int  $doc_id
     * @return \Illuminate\Http\Response
     */
    public function index($doc_type, $doc_id)
    {
		// Get header model
		$model = $this->getModel($doc_type);
		$header = $model::find($doc_id);

		// Show data detail barang
		if ($header) {
			try {
				// Get valid detail_barang id
				$detail_barang_id = $this->getDetailBarangId($doc_type, $doc_id);

				// Get list item barang
				$item_barang_list = $header->itemBarang()
					->where('detail_barangs.id', $detail_barang_id)
					->get();
				$result = DetailBarangItemResource::collection($item_barang_list);
			} catch (\Throwable $th) {
				$result = response()->json(['error' => 'Detail barang tidak ditemukan.'], 422);
			}
		} else {
			$result = response()->json(['error' => 'Dokumen tidak ditemukan.'], 422);
		}

		return $result;
    }

	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
	 * @param  string  $doc_type
     * @param  int  $doc_id
     * @return \Illuminate\Http\Response
     */
	public function store(Request $request, $doc_type, $doc_id)
	{
		// Get header model
		$model = $this->getModel($doc_type);

		// Check if document is not published yet
		$is_unpublished = $this->checkUnpublished($model, $doc_id);

		if ($is_unpublished) {
			// Get header document
			$header = $model::find($doc_id);

			// Insert data detail barang
			if ($header) {
				try {
					// Get valid detail_barang id
					$detail_barang_id = $this->getDetailBarangId($doc_type, $doc_id);

					// Insert detail barang
					$insert_result = $header->itemBarang()
						->create([
							'detail_barang_id' => $detail_barang_id,
							'uraian_barang' => $request->uraian_barang,
							'jumlah_barang' => $request->jumlah_barang,
							'satuan_barang' => $request->satuan_barang,
						]);
					$result = new DetailBarangItemResource($insert_result);
				} catch (\Throwable $th) {
					$result = response()->json(['error' => 'Detail barang tidak ditemukan.'], 422);
				}
			} else {
				$result = response()->json(['error' => 'Dokumen tidak ditemukan.'], 422);
			}
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan, tidak dapat menambah item barang.'], 422);
		}

		return $result;
	}

	/**
     * Display the specified resource.
     *
	 * @param  string  $doc_type
     * @param  int  $doc_id
     * @param  int  $item_id
     * @return \Illuminate\Http\Response
     */
	public function show($doc_type, $doc_id, $item_id)
	{
		// Get header model
		$model = $this->getModel($doc_type);
		$header = $model::find($doc_id);

		if ($header) {
			// Get data item barang
			$item_barang = $header->itemBarang()
				->where('detail_barang_items.id', $item_id)
				->first();

			if ($item_barang != null) {
				$result = new DetailBarangItemResource($item_barang);
			} else {
				$result = response()->json(['error' => 'Item barang tidak ditemukan.'], 422);
			}
		} else {
			$result = response()->json(['error' => 'Dokumen tidak ditemukan.'], 422);
		}
		
		return $result;
	}

	/**
     * Update the specified resource.
     *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  string  $doc_type
     * @param  int  $doc_id
     * @param  int  $item_id
     * @return \Illuminate\Http\Response
     */
	public function update(Request $request, $doc_type, $doc_id, $item_id)
	{
		// Get header model
		$model = $this->getModel($doc_type);

		// Check if document is not published yet
		$is_unpublished = $this->checkUnpublished($model, $doc_id);
		
		if ($is_unpublished) {
			// Get header document
			$header = $model::find($doc_id);

			if ($header) {
				// Update data item barang
				$update_result = $header->itemBarang()
					->where('detail_barang_items.id', $item_id)
					->update([
						'uraian_barang' => $request->uraian_barang,
						'jumlah_barang' => $request->jumlah_barang,
						'satuan_barang' => $request->satuan_barang,
					]);

				if ($update_result) {
					$result = "Update item barang berhasil";
				} else {
					$result = response()->json(['error' => 'Update item barang gagal.'], 422);
				}
			} else {
				$result = response()->json(['error' => 'Dokumen tidak ditemukan.'], 422);
			}
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan, tidak dapat mengubah item barang.'], 422);
		}
		
		return $result;
	}

	/**
     * Remove the specified resource from storage.
     *
	 * @param  string  $doc_type
     * @param  int  $doc_id
     * @param  int  $item_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($doc_type, $doc_id, $item_id)
    {
		// Get header model
		$model = $this->getModel($doc_type);

		// Check if document is not published yet
		$is_unpublished = $this->checkUnpublished($model, $doc_id);

		if ($is_unpublished) {
			// Get header document
			$header = $model::find($doc_id);

			$result = $header->itemBarang()
				->where('detail_barang_items.id', $item_id)
				->delete();
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan, tidak dapat menghapus item barang.'], 422);
		}
		
		return $result;
    }
}
