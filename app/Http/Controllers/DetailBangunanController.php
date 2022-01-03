<?php

namespace App\Http\Controllers;

use App\Http\Resources\SbpResource;
use App\Models\Sbp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailBangunanController extends DetailController
{
	private function validateData(Request $request)
	{
		$request->validate([
			'alamat' => 'required'
		]);
	}

	private function prepareData(Request $request)
	{
		$data_bangunan = [
			'alamat' => $request->alamat,
			'no_reg' => $request->no_reg,
			'pemilik_id' => $request->pemilik['id'],
		];

		return $data_bangunan;
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
			$data_bangunan = $this->prepareData($request);
			$this->insertDetail($doc_type, $doc_id, 'bangunan', $data_bangunan);

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
			$data_bangunan = $this->prepareData($request);
			$this->updateDetail('bangunan', $data_bangunan, $sarkut_id);

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
				$result = $this->showDetails($doc_type, $doc_id, 'bangunan');
				break;
			
			default:
				$result = $this->showDetail($doc_type, $doc_id, 'bangunan');
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
		$result = $this->deleteDetail($doc_type, $doc_id, 'bangunan');
		return $result;
    }
}
