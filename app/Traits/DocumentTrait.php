<?php

namespace App\Traits;

use App\Http\Resources\Intelijen\DokLkaiResource;
use App\Http\Resources\Intelijen\DokLkaiTableResource;
use App\Http\Resources\Intelijen\DokLppiResource;
use App\Http\Resources\Intelijen\DokLppiTableResource;
use App\Http\Resources\Intelijen\DokNhiResource;
use App\Http\Resources\Intelijen\DokNhiTableResource;
use App\Http\Resources\Intelijen\DokNiResource;
use Illuminate\Database\Eloquent\Relations\Relation;

trait DocumentTrait
{
	public function getModel($doc_type) 
	{
		return Relation::getMorphedModel($doc_type);
	}

	public function getDocument($doc_type, $doc_id) 
	{
		$model = $this->getModel($doc_type);
		return $model::findOrFail($doc_id);
	}

	public function checkUnpublished($doc)
	{
		// Return TRUE if document is unpublished
		$kode_status = $doc->kode_status;
		$is_unpublished = (in_array($kode_status, $this->unpublished_status)) ? true : false;
		return $is_unpublished;
	}

	public function getResource($doc_type) {
		$resources = [
			'lppi' => DokLppiResource::class,
			'lkai' => DokLkaiResource::class,
			'nhi' => DokNhiResource::class,
			'ni' => DokNiResource::class,
		];

		try {
			$resource = $resources[$doc_type];
		} catch (\Throwable $th) {
			$resource = null;
		}

		return $resource;
	}

	public function getTableResource($doc_type) {
		$resources = [
			'lppi' => DokLppiTableResource::class,
			'lkai' => DokLkaiTableResource::class,
			'nhi' => DokNhiTableResource::class,
			'ni' => DokNhiTableResource::class,
		];

		try {
			$resource = $resources[$doc_type];
		} catch (\Throwable $th) {
			$resource = null;
		}

		return $resource;
	}
}