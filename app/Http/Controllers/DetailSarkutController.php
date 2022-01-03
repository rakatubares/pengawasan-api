<?php

namespace App\Http\Controllers;

use App\Http\Resources\SbpResource;
use App\Models\Sbp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailSarkutController extends DetailController
{
	private function validateData(Request $request)
	{
		$request->validate([
			'nama_sarkut' => 'required',
			'jenis_sarkut' => 'required',
			'pilot.id' => 'required|integer'
		]);
	}

	private function prepareData(Request $request)
	{
		$data_sarkut = [
			'nama_sarkut' => $request->nama_sarkut,
			'jenis_sarkut' => $request->jenis_sarkut,
			'no_flight_trayek' => $request->no_flight_trayek,
			'jumlah_kapasitas' => $request->jumlah_kapasitas,
			'satuan_kapasitas' => $request->satuan_kapasitas,
			'pilot_id' => $request->pilot['id'],
			'bendera' => $request->bendera,
			'no_reg_polisi' => $request->no_reg_polisi,
		];

		return $data_sarkut;
	}

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
		$this->validateData($request);

		DB::beginTransaction();
		try {
			// Insert detail sarkut
			$data_sarkut = $this->prepareData($request);
			$this->insertDetail($doc_type, $doc_id, 'sarkut', $data_sarkut);

			// Return doc detail
			$model = $this->switchObject($doc_type, 'model');
			$resource = $this->switchObject($doc_type, 'resource');
			$result = new $resource($model::find($doc_id), 'objek');

			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			$result = $th;
		}
		
		return $result;
	}

	public function update(Request $request, $doc_type, $doc_id, $sarkut_id)
	{
		$this->validateData($request);

		DB::beginTransaction();
		try {
			// Insert detail sarkut
			$data_sarkut = $this->prepareData($request);
			$this->updateDetail('sarkut', $data_sarkut, $sarkut_id);

			// Return doc detail
			$model = $this->switchObject($doc_type, 'model');
			$resource = $this->switchObject($doc_type, 'resource');
			$result = new $resource($model::find($doc_id), 'objek');

			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			$result = $th;
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
