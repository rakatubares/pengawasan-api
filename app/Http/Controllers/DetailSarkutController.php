<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailSarkutController extends DetailController
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
		$detail_data = [
			'nama_sarkut' => $request->nama_sarkut,
			'jenis_sarkut' => $request->jenis_sarkut,
			'no_flight_trayek' => $request->no_flight_trayek,
			'kapasitas' => $request->kapasitas,
			'satuan_kapasitas' => $request->satuan_kapasitas,
			'nama_pilot_pengemudi' => $request->nama_pilot_pengemudi,
			'bendera' => $request->bendera,
			'no_reg_polisi' => $request->no_reg_polisi,
		];
		
		switch ($how) {
			case 'new':
				$result = $this->insertDetail($detail_data, $doc_type, $doc_id, 'sarkut');
				break;
			
			default:
				$result = $this->upsertDetail($detail_data, $doc_type, $doc_id, 'sarkut');
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
				$result = $this->showDetails($doc_type, $doc_id, 'sarkut');
				break;
			
			default:
				$result = $this->showDetail($doc_type, $doc_id, 'sarkut');
				break;
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
		$result = $this->deleteDetail($doc_type, $doc_id, 'sarkut');
		return $result;
	}
}
