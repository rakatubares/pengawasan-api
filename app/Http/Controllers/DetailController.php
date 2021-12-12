<?php

namespace App\Http\Controllers;

use App\Models\ObjectRelation;
use App\Traits\DokumenTrait;
use App\Traits\SwitcherTrait;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
	use DokumenTrait;
    use SwitcherTrait;

	public function insertDetail($doc_type, $doc_id, $detail_type, $detail_data)
	{
		$detail = $this->insertData($detail_type, $detail_data);
		$this->updateObjectType($doc_type, $doc_id, $detail_type, $detail->id);

		return $detail;
	}

	public function insertData($type, $data)
	{
		$model = $this->getModel($type);
		$detail = $model::create($data);
		return $detail;
	}

	public function updateObjectType($doc_type, $doc_id, $detail_type, $detail_id)
	{
		$model = $this->getModel($doc_type);
		$doc = $model::find($doc_id);
		$penindakan = $doc->penindakan;
		$result = $penindakan->update([
			'object_type' => $detail_type,
			'object_id' => $detail_id
		]);

		return $result;
	}

	public function updateDetail($detail_type, $detail_data, $detail_id)
	{
		$model = $this->getModel($detail_type);
		$model::find($detail_id)->update($detail_data);
	}

	/**
     * Store a newly created resource in storage or update if exists.
     *
     * @param  \Illuminate\Http\Request  $request
	 * @param  string $doc_type
	 * @param  string $doc_id
     * @return \Illuminate\Http\Response
     */
    public function upsertDetail($detail_data, $doc_type, $doc_id, $detail_type)
    {
		DB::beginTransaction();

		try {
			// Get model
			$model = $this->getModel($doc_type);

			// Update kolom status detail di tabel parent menjadi TRUE
			$update_result = $this->updateStatusDetail($model, $doc_id, $detail_type, 1);

			// Upsert data detail
			if ($update_result == 1) {
				$resource = $this->getResource($detail_type);

				$insert_result = $model::find($doc_id)
					->$detail_type()
					->updateOrCreate(
						[
							'parent_type' => $model,
							'parent_id' => $doc_id
						],
						$detail_data
					);
				
				$result = new $resource($insert_result);
			} else {
				$result = $update_result;
			}

			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			// $result = response()->json(['error' => 'Gagal input detail ' . $detail_type], 422);
			$result = $th;
		}
        
		return $result;
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  string  $doc_type
	 * @param  int  $doc_id
	 * @param  string  $detail_type
	 * @return \Illuminate\Http\Response
	 */
	public function showDetail($doc_type, $doc_id, $detail_type)
	{
		// Get model
		$model = $this->getModel($doc_type);

		// Get header
		$header = $model::find($doc_id);

		// Get detail data if header is found
		if ($header) {
			$detail = $header->$detail_type()->first();
			if ($detail != null) {
				$resource = $this->getResource($detail_type);
				$result = new $resource($detail);
			} else {
				$result = response()->json(['error' => 'Detail '. $detail_type . ' tidak ditemukan.'], 422);
			}
		} else {
			$result = response()->json(['error' => 'Dokumen tidak ditemukan.'], 422);
		}
		
		return $result;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  string  $doc_type
	 * @param  int  $doc_id
	 * @param  string  $detail_type
	 * @return \Illuminate\Http\Response
	 */
	public function showDetails($doc_type, $doc_id, $detail_type)
	{
		// Get model
		$model = $this->getModel($doc_type);

		// Get header
		$header = $model::find($doc_id);

		// Get detail data if header is found
		if ($header) {
			$detail = $header->$detail_type()->get();
			if ($detail != null) {
				$resource = $this->getResource($detail_type);
				$result = $resource::collection($detail);
			} else {
				$result = response()->json(['error' => 'Detail '. $detail_type . ' tidak ditemukan.'], 422);
			}
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
	 * @param  string  $detail_type
	 * @return \Illuminate\Http\Response
	 */
	public function deleteDetail($doc_type, $doc_id, $detail_type)
	{
		DB::beginTransaction();

		try {
			 // Get model
			$model = $this->getModel($doc_type);

			// Update kolom detail di tabel parent menjadi FALSE
			$update_result = $this->updateStatusDetail($model, $doc_id, $detail_type, 0);

			// Delete detail
			if ($update_result == 1) {
				$result = $model::find($doc_id)
					->$detail_type()
					->delete();
			} else {
				$result = $update_result;
			}

			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			$result = response()->json(['error' => 'Gagal menghapus detail ' . $detail_type], 422);
		}
	   
		return $result;
	}
}
