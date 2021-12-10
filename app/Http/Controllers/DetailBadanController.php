<?php

namespace App\Http\Controllers;

use App\Http\Resources\SbpResource;
use App\Models\Sbp;
use Illuminate\Http\Request;

class DetailBadanController extends DetailController
{
	private function validateData(Request $request)
	{
		$request->validate([
			'orang_id' => 'required'
		]);
	}
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
		$this->validateData($request);

		$this->updateObjectType($doc_type, $doc_id, 'orang', $request->orang_id);
		$result = new SbpResource(Sbp::find($doc_id), 'objek');

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
				$result = $this->showDetails($doc_type, $doc_id, 'badan');
				break;
			
			default:
				$result = $this->showDetail($doc_type, $doc_id, 'badan');
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
		$result = $this->deleteDetail($doc_type, $doc_id, 'badan');
		return $result;
	}
}
