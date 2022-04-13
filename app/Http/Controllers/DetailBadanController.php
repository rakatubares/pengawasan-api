<?php

namespace App\Http\Controllers;

use App\Traits\SwitcherTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailBadanController extends DetailController
{
	use SwitcherTrait;

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
	public function store(Request $request, $doc_type, $doc_id)
	{
		$this->validateData($request);

		DB::beginTransaction();
		try {
			$model = $this->switchObject($doc_type, 'model');
			$resource = $this->switchObject($doc_type, 'resource');

			// Update object
			$this->updateObjectType($doc_type, $doc_id, 'orang', $request->orang_id);
			$model::find($doc_id)->penindakan->update(['saksi_id' => $request->orang_id]);

			// Commit change
			DB::commit();

			// Get changed data
			$result = new $resource($model::find($doc_id), 'objek');

			// Return data
			return $result;
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
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
