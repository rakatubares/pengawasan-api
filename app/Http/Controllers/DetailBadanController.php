<?php

namespace App\Http\Controllers;

use App\Http\Resources\DetailBadanResource;
use App\Traits\DokumenTrait;
use App\Traits\ModelTrait;
use Illuminate\Http\Request;

class DetailBadanController extends Controller
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

        // Update kolom detail_badan di tabel parent menjadi TRUE
		$update_result = $this->updateStatusDetail($model, $doc_id, 'badan', 1);

		// Upsert data detail badan
		$tgl_lahir = strtotime($request->tgl_lahir);
		if ($update_result) {
			$insert_result = $model::find($doc_id)
				->badan()
				->updateOrCreate(
					[
						'badanable_type' => $model,
						'badanable_id' => $doc_id
					],
					[
						'nama' => $request->nama,
						'tgl_lahir' => $tgl_lahir,
						'warga_negara' => $request->warga_negara,
						'alamat' => $request->alamat,
						'jns_identitas' => $request->jns_identitas,
						'no_identitas' => $request->no_identitas,
					]
				);
			
			$result = new DetailBadanResource($insert_result);
		} else {
			$result = response()->json(['error' => 'Insert detail badan gagal.'], 422);
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
			$badan = $header->badan()->first();
			if ($badan != null) {
				$result = new DetailBadanResource($badan);
			} else {
				$result = response()->json(['error' => 'Detail badan tidak ditemukan.'], 422);
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

        // Update kolom detail_badan di tabel parent menjadi FALSE
		$update_result = $this->updateStatusDetail($model, $doc_id, 'badan', 0);

		// Delete detail badan
		if ($update_result) {
			$delete_result = $model::find($doc_id)
				->badan()
				->delete();
			return $delete_result;
		} else {
			return "Gagal menghapus data detail badan";
		}
    }
}
