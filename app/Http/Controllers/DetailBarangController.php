<?php

namespace App\Http\Controllers;

use App\Http\Resources\DetailBarangResource;
use App\Traits\DokumenTrait;
use App\Traits\ModelTrait;
use Illuminate\Http\Request;

class DetailBarangController extends Controller
{
	use DokumenTrait;
	use ModelTrait;

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
	 * @param  string $doc_type
	 * @param  string $doc_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $doc_type, $doc_id)
    {
        // Get model
		$model = $this->getModel($doc_type);

        // Update kolom detail_barang di tabel parent menjadi TRUE
		$update_result = $this->updateStatusDetail($model, $doc_id, 'barang', 1);

		// Upsert data detail barang
		$tgl_dok = $request->tgl_dok != null ? strtotime($request->tgl_dok) : $request->tgl_dok;
		if ($update_result) {
			$insert_result = $model::find($doc_id)
				->barang()
				->updateOrCreate(
					[
						'barangable_type' => $model,
						'barangable_id' => $doc_id
					],
					[
						'jumlah_kemasan' => $request->jumlah_kemasan,
						'satuan_kemasan' => $request->satuan_kemasan,
						'jns_dok' => $request->jns_dok,
						'no_dok' => $request->no_dok,
						'tgl_dok' => $tgl_dok,
						'pemilik' => $request->pemilik
					]
				);
			
			$result = new DetailBarangResource($insert_result);
		} else {
			$result = response()->json(['error' => 'Insert detail barang gagal.'], 422);
		}

		return $result;
    }

    /**
     * Display the specified resource.
     *
	 * @param  string  $doc_type
     * @param  int  $doc_id
     * @return \Illuminate\Http\Response
     */
    public function show($doc_type, $doc_id)
    {
        $model = $this->getModel($doc_type);
		$header = $model::find($doc_id);

		if ($header) {
			$barang = $header->barang()->first();
			if ($barang != null) {
				$result = new DetailBarangResource($barang);
			} else {
				$result = response()->json(['error' => 'Detail barang tidak ditemukan.'], 422);
			}
		} else {
			$result = response()->json(['error' => 'Dokumen tidak ditemukan.'], 422);
		}
		
		return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
	 * @param  string  $doc_type
     * @param  int  $doc_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($doc_type, $doc_id)
    {
        // Get model
		$model = $this->getModel($doc_type);

        // Update kolom detail_sarkut di tabel parent menjadi FALSE
		$update_result = $this->updateStatusDetail($model, $doc_id, 'barang', 0);

		// Delete detail barang
		if ($update_result) {
			$delete_result = $model::find($doc_id)
				->barang()
				->delete();
			return $delete_result;
		} else {
			return "Gagal menghapus data detail barang";
		}
    }
}
