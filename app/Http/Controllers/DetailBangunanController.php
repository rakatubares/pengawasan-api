<?php

namespace App\Http\Controllers;

use App\Http\Resources\DetailBangunanResource;
use App\Traits\DokumenTrait;
use App\Traits\ModelTrait;
use Illuminate\Http\Request;

class DetailBangunanController extends Controller
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

        // Update kolom detail_bangunan di tabel parent menjadi TRUE
		$update_result = $this->updateStatusDetail($model, $doc_id, 'bangunan', 1);

		// Upsert data detail bangunan
		if ($update_result) {
			$insert_result = $model::find($doc_id)
				->bangunan()
				->updateOrCreate(
					[
						'bangunanable_type' => $model,
						'bangunanable_id' => $doc_id
					],
					[
						'alamat' => $request->alamat,
						'no_reg' => $request->no_reg,
						'pemilik' => $request->pemilik,
						'jns_identitas' => $request->jns_identitas,
						'no_identitas' => $request->no_identitas,
					]
				);
			
			$result = new DetailBangunanResource($insert_result);
		} else {
			$result = response()->json(['error' => 'Insert detail bangunan gagal.'], 422);
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
			$bangunan = $header->bangunan()->first();
			if ($bangunan != null) {
				$result = new DetailBangunanResource($bangunan);
			} else {
				$result = response()->json(['error' => 'Detail bangunan tidak ditemukan.'], 422);
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
		$update_result = $this->updateStatusDetail($model, $doc_id, 'bangunan', 0);

		// Delete detail sarkut
		if ($update_result) {
			$delete_result = $model::find($doc_id)
				->bangunan()
				->delete();
			return $delete_result;
		} else {
			return "Gagal menghapus data detail bangunan";
		}
    }
}
