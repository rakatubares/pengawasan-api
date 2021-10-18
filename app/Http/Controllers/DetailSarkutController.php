<?php

namespace App\Http\Controllers;

use App\Http\Resources\DetailSarkutResource;
use App\Traits\DokumenTrait;
use App\Traits\ModelTrait;
use Illuminate\Http\Request;

class DetailSarkutController extends Controller
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

        // Update kolom detail_sarkut di tabel parent menjadi TRUE
		$update_result = $this->updateStatusDetail($model, $doc_id, 'sarkut', 1);

		// Upsert data detail sarkut
		if ($update_result) {
			$insert_result = $model::find($doc_id)
				->sarkut()
				->updateOrCreate(
					['sarkutable_id' => $doc_id],
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
			
			$result_array = new DetailSarkutResource($insert_result);
			return $result_array;
		} else {
			return "Insert detail sarana pengangkut gagal";
		}
		
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
		$sarkut = $model::find($doc_id)->sarkut()->get();
		return $sarkut;
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
		$update_result = $this->updateStatusDetail($model, $doc_id, 'sarkut', 0);

		// Delete detail sarkut
		if ($update_result) {
			$delete_result = $model::find($doc_id)
				->sarkut()
				->delete();
			return $delete_result;
		} else {
			return "Gagal menghapus data penindakan sarana pengangkut";
		}
		
    }
}
