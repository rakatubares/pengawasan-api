<?php

namespace App\Http\Controllers;

use App\Http\Resources\DetailBarangWithSingleItemResource;
use App\Models\DetailBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailBarangController extends DetailController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
	 * @param  string $doc_type
	 * @param  string $doc_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $doc_type, $doc_id, $how='upsert')
    {
		DB::beginTransaction();

		try {
			$data_barang = [
				'jumlah_kemasan' => $request->jumlah_kemasan,
				'satuan_kemasan' => $request->satuan_kemasan,
				'pemilik_id' => $request->pemilik['id']
			];
	
			$tgl_dok = $request->dokumen['tgl_dok'] != null ? strtotime($request->dokumen['tgl_dok']) : $request->dokumen['tgl_dok'];
			$data_dokumen = [
				'jns_dok' => $request->dokumen['jns_dok'],
				'no_dok' => $request->dokumen['no_dok'],
				'tgl_dok' => $tgl_dok,
			];
	
			switch ($how) {
				case 'new':
					$result = $this->insertDetail($data_barang, $doc_type, $doc_id, 'barang');
					break;
				
				default:
					$result = $this->upsertDetail($data_barang, $doc_type, $doc_id, 'barang');
					break;
			}
	
			$result = $this->upsertDokumen($data_dokumen, $result->id);

			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			$result = $th;
		}
		
		return $result;
    }

	private function upsertDokumen($data_dokumen, $barang_id)
	{
		$insert_result = DetailBarang::find($barang_id)
			->dokumen()
			->updateOrCreate(
				[
					'parent_type' => DetailBarang::class,
					'parent_id' => $barang_id
				],
				$data_dokumen
			);

		return $insert_result;
	}

    /**
     * Display the specified resource.
     *
	 * @param  string  $doc_type
     * @param  int  $doc_id
     * @return \Illuminate\Http\Response
     */
    public function show($doc_type, $doc_id, $how='one')
    {
		switch ($how) {
			case 'all':
				$result = $this->showDetails($doc_type, $doc_id, 'barang');
				break;

			case 'allitems':
				$result = $this->showAllItems($doc_type, $doc_id);
				break;
			
			default:
				$result = $this->showDetail($doc_type, $doc_id, 'barang');
				break;
		}
		
		return $result;
    }

	/**
     * Display all resources with items.
     *
     * @param  string  $doc_type
     * @param  int  $doc_id
     * @return \Illuminate\Http\Response
     */
    public function showAllItems($doc_type, $doc_id)
    {
		// Get model
		$model = $this->getModel($doc_type);

		// Get header
		$header = $model::find($doc_id);

		// Get detail data if header is found
		if ($header) {
			$barang = $header->barang()->get();
			$result = DetailBarangWithSingleItemResource::collection($barang);
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
		$result = $this->deleteDetail($doc_type, $doc_id, 'barang');
		return $result;
    }
}
