<?php

namespace App\Http\Controllers;

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
    public function store(Request $request, $doc_type, $doc_id)
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

		$result = $this->upsertDetail($detail_data, $doc_type, $doc_id, 'barang');
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
		$result = $this->showDetail($doc_type, $doc_id, 'barang');
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
