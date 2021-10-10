<?php

namespace App\Http\Controllers;

use App\Http\Resources\SbpPenindakanBarangResource;
use App\Models\SbpHeader;
use App\Traits\SbpTrait;
use Illuminate\Http\Request;

class SbpPenindakanBarangController extends Controller
{
	use SbpTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($sbp_id)
    {
		$penindakan_barang = SbpHeader::find($sbp_id)->penindakanBarang;
		$penindakan_barang_array = new SbpPenindakanBarangResource($penindakan_barang);
		return $penindakan_barang_array;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
	 * @param  int $sbp_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $sbp_id)
    {
		// Update kolom penindakan_barang di tabel sbp_header menjadi TRUE
		$update_result = $this->updateStatusPenindakan($sbp_id, 'barang', 1);

		// Insert/update data penindakan barang bila update header berhasil
		$tgl_dok = $request->tgl_dok != null ? strtotime($request->tgl_dok) : $request->tgl_dok;
		if ($update_result == 1) {
			$insert_result = SbpHeader::find($sbp_id)
				->penindakanBarang()
				->updateOrCreate(
					['sbp_id' => $sbp_id],
					[
						'jumlah_kemasan' => $request->jumlah_kemasan,
						'satuan_kemasan' => $request->satuan_kemasan,
						'jns_dok' => $request->jns_dok,
						'no_dok' => $request->no_dok,
						'tgl_dok' => $tgl_dok,
						'pemilik' => $request->pemilik
					]
				);

			$result_array = new SbpPenindakanBarangResource($insert_result);
			return $result_array;
		} else {
			return "Insert detail penindakan barang gagal";
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $sbp_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sbp_id)
    {
		// Update kolom penindakan_barang di tabel sbp_header menjadi FALSE
		$update_result = $this->updateStatusPenindakan($sbp_id, 'barang', 0);

		// Delete data penindakan barang
		if ($update_result == 1) {
			$delete_result = SbpHeader::find($sbp_id)
				->penindakanBarang()
				->delete();
			return $delete_result;
		} else {
			return "Gagal menghapus data penindakan barang";
		}
    }
}
