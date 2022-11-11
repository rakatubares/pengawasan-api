<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailDokumenController extends DetailController
{
	private function validateData(Request $request)
	{
		$request->validate([
			'jns_dok' => 'required',
			'no_dok' => 'required',
			'tgl_dok' => 'required|date_format:d-m-Y',
		]);
	}

	private function prepareData(Request $request, $doc_type, $doc_id)
	{
		$tgl_dok = strtotime($request->tgl_dok);
		$data_dokumen = [
			'parent_type' => $doc_type,
			'parent_id' => $doc_id,
			'jns_dok' => $request->jns_dok,
			'no_dok' => $request->no_dok,
			'tgl_dok' => $tgl_dok,
		];

		return $data_dokumen;
	}

	/**
	 * Store a newly created resource in storage or update if exists.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  String $doc_type
	 * @param  Int $doc_id
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request, $doc_type, $doc_id)
	{
		$this->validateData($request);

		DB::beginTransaction();
		try {
			// Insert detail sarkut
			$data_dokumen = $this->prepareData($request, $doc_type, $doc_id);
			$this->insertDetail($doc_type, $doc_id, 'dokumen', $data_dokumen);

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
	 * Store a newly created resource in storage or update if exists.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  String $doc_type
	 * @param  Int $doc_id
	 * @param  Int $dokumen_id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $doc_type, $doc_id, $dokumen_id)
	{
		$this->validateData($request);

		DB::beginTransaction();
		try {
			// Insert detail sarkut
			$data_dokumen = $this->prepareData($request, $doc_type, $doc_id);
			$this->updateDetail('dokumen', $data_dokumen, $dokumen_id);

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
