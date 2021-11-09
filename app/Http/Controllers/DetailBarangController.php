<?php

namespace App\Http\Controllers;

use App\Http\Resources\DetailBarangWithSingleItemResource;
use Illuminate\Http\Request;

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
		$tgl_dok = $request->tgl_dok != null ? strtotime($request->tgl_dok) : $request->tgl_dok;
		$detail_data = [
			'jumlah_kemasan' => $request->jumlah_kemasan,
			'satuan_kemasan' => $request->satuan_kemasan,
			'jns_dok' => $request->jns_dok,
			'no_dok' => $request->no_dok,
			'tgl_dok' => $tgl_dok,
			'pemilik' => $request->pemilik
		];

		switch ($how) {
			case 'new':
				$result = $this->insertDetail($detail_data, $doc_type, $doc_id, 'barang');
				break;
			
			default:
				$result = $this->upsertDetail($detail_data, $doc_type, $doc_id, 'barang');
				break;
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
