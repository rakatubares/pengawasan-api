<?php

namespace App\Http\Controllers;

use App\Http\Resources\SbpPenindakanBangunanResource;
use App\Models\SbpHeader;
use App\Traits\SbpTrait;
use Illuminate\Http\Request;

class SbpPenindakanBangunanController extends Controller
{
	use SbpTrait;
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($sbp_id)
    {
        $penindakan_bangunan = SbpHeader::find($sbp_id)->penindakanBangunan;
		$penindakan_bangunan_array = new SbpPenindakanBangunanResource($penindakan_bangunan);
		return $penindakan_bangunan_array;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $sbp_id)
    {
        // Update kolom penindakan_barang di tabel sbp_header menjadi TRUE
		$update_result = $this->updateStatusPenindakan($sbp_id, 'bangunan', 1);

		// Insert/udate data penindakan barang bila update header berhasil
		if ($update_result == 1) {
			$insert_result = SbpHeader::find($sbp_id)
				->penindakanBangunan()
				->updateOrCreate(
					['sbp_id' => $sbp_id],
					[
						'alamat' => $request->alamat,
						'no_reg' => $request->no_reg,
						'pemilik' => $request->pemilik,
						'jns_identitas' => $request->jns_identitas,
						'no_identitas' => $request->no_identitas,
					]
				);
			$result_array = new SbpPenindakanBangunanResource($insert_result);
			return $result_array;
		} else {
			return "Insert detail penindakan bangunan gagal";
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sbp_id)
    {
        // Update kolom penindakan_barang di tabel sbp_header menjadi FALSE
		$update_result = $this->updateStatusPenindakan($sbp_id, 'bangunan', 0);

		// Delete data penindakan barang
		if ($update_result == 1) {
			$delete_result = SbpHeader::find($sbp_id)
				->penindakanBangunan()
				->delete();
			return $delete_result;
		} else {
			return "Gagal menghapus data penindakan bangunan";
		}
    }
}
