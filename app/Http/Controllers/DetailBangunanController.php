<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailBangunanController extends DetailController
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
		$detail_data = [
			'alamat' => $request->alamat,
			'no_reg' => $request->no_reg,
			'pemilik' => $request->pemilik,
			'jns_identitas' => $request->jns_identitas,
			'no_identitas' => $request->no_identitas,
		];

		$result = $this->upsertDetail($detail_data, $doc_type, $doc_id, 'bangunan');
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
		$result = $this->showDetail($doc_type, $doc_id, 'bangunan');
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
		$result = $this->deleteDetail($doc_type, $doc_id, 'bangunan');
		return $result;
    }
}
