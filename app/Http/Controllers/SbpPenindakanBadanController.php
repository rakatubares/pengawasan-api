<?php

namespace App\Http\Controllers;

use App\Http\Resources\SbpPenindakanBadanResource;
use App\Models\SbpHeader;
use App\Traits\SbpTrait;
use Illuminate\Http\Request;

class SbpPenindakanBadanController extends Controller
{
	use SbpTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($sbp_id)
    {
        $penindakan_badan = SbpHeader::find($sbp_id)->penindakanBadan;
		$penindakan_badan_array = new SbpPenindakanBadanResource($penindakan_badan);
		return $penindakan_badan_array;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $sbp_id)
    {
		// Data validation
		$request->validate([
			'nama' => 'required',
			'tgl_lahir' => 'date'
		]);

        // Update kolom penindakan_barang di tabel sbp_header menjadi TRUE
		$update_result = $this->updateStatusPenindakan($sbp_id, 'badan', 1);

		// Insert/udate data penindakan barang bila update header berhasil
		$tgl_lahir = strtotime($request->tgl_lahir);
		if ($update_result == 1) {
			$insert_result = SbpHeader::find($sbp_id)
				->penindakanBadan()
				->updateOrCreate(
					['sbp_id' => $sbp_id],
					[
						'nama' => $request->nama,
						'tgl_lahir' => $tgl_lahir,
						'warga_negara' => $request->warga_negara,
						'alamat' => $request->alamat,
						'jns_identitas' => $request->jns_identitas,
						'no_identitas' => $request->no_identitas,
					]
				);
			
			$result_array = new SbpPenindakanBadanResource($insert_result);
			return $result_array;
		} else {
			return "Insert detail penindakan badan gagal";
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
		$update_result = $this->updateStatusPenindakan($sbp_id, 'badan', 0);

		// Delete data penindakan barang
		if ($update_result == 1) {
			$delete_result = SbpHeader::find($sbp_id)
				->penindakanBadan()
				->delete();
			return $delete_result;
		} else {
			return "Gagal menghapus data penindakan badan";
		}
    }
}
