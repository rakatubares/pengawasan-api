<?php

namespace App\Http\Controllers;

use App\Http\Resources\SbpPenindakanSarkutResource;
use App\Models\SbpHeader;
use App\Traits\SbpTrait;
use Illuminate\Http\Request;

class SbpPenindakanSarkutController extends Controller
{
	use SbpTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($sbp_id)
    {
        $penindakan_sarkut = SbpHeader::find($sbp_id)->penindakanSarkut;
		$penindakan_sarkut_array = new SbpPenindakanSarkutResource($penindakan_sarkut);
		return $penindakan_sarkut_array;
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
		$update_result = $this->updateStatusPenindakan($sbp_id, 'sarkut', 1);

		// Insert/udate data penindakan barang bila update header berhasil
		if ($update_result == 1) {
			$insert_result = SbpHeader::find($sbp_id)
				->penindakanSarkut()
				->updateOrCreate(
					['sbp_id' => $sbp_id],
					[
						'nama_sarkut' => $request->nama_sarkut,
						'jenis_sarkut' => $request->jenis_sarkut,
						'no_flight_trayek' => $request->no_flight_trayek,
						'kapasitas' => $request->kapasitas,
						'satuan_kapasitas' => $request->satuan_kapasitas,
						'nama_pilot_pengemudi' => $request->nama_pilot_pengemudi,
						'bendera' => $request->bendera,
						'no_reg_polisi' => $request->no_reg_polisi,
					]
				);

			$result_array = new SbpPenindakanSarkutResource($insert_result);
			return $result_array;
		} else {
			return "Insert detail sarana pengangkut gagal";
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
		$update_result = $this->updateStatusPenindakan($sbp_id, 'sarkut', 0);

		// Delete data penindakan barang
		if ($update_result == 1) {
			$delete_result = SbpHeader::find($sbp_id)
				->penindakanSarkut()
				->delete();
			return $delete_result;
		} else {
			return "Gagal menghapus data penindakan sarana pengangkut";
		}
    }
}
