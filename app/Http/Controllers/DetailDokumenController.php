<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailDokumenController extends DetailController
{
	/**
	 * Store a newly created resource in storage or update if exists.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request, $doc_type, $doc_id, $how='upsert')
	{
		$tgl_dok = strtotime($request->tgl_dok);
		$detail_data = [
			'jns_dok' => $request->jns_dok,
			'no_dok' => $request->no_dok,
			'tgl_dok' => $tgl_dok,
		];

		switch ($how) {
			case 'new':
				$result = $this->insertDetail($detail_data, $doc_type, $doc_id, 'dokumen');
				break;
			
			default:
				$result = $this->upsertDetail($detail_data, $doc_type, $doc_id, 'dokumen');
				break;
		}

		return $result;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($doc_type, $doc_id, $how='one')
	{		
		switch ($how) {
			case 'all':
				$result = $this->showDetails($doc_type, $doc_id, 'dokumen');
				break;
			
			default:
				$result = $this->showDetail($doc_type, $doc_id, 'dokumen');
				break;
		}

		return $result;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($doc_type, $doc_id)
	{
		$result = $this->deleteDetail($doc_type, $doc_id, 'dokumen');
		return $result;
	}
}
