<?php

namespace App\Traits;

use App\Models\Segel;
use Illuminate\Database\Eloquent\Model;

trait SwitcherTrait
{
	private $models = [
		'segel' => Segel::class,
	];

	private $resources = [
		'sarkut' => DetailSarkutResource::class,
		'barang' => DetailBarangResource::class,
		'bangunan' => DetailBangunanResource::class,
		'badan' => DetailBadanResource::class,
	];

	/**
	 * Get model by doc type
	 * 
	 * @param string $doc_type
	 * @return Model
	 */
	public function getModel($doc_type)
	{
		if (array_key_exists($doc_type, $this->models)) {
			$model = $this->models[$doc_type];
		} else {
			$model = null;
		}
		
		return $model;
	}

	/**
	 * Get resource by type
	 * 
	 * @param string $resource_type
	 * @return Resource
	 */
	public function getResource($resource_type)
	{
		if (array_key_exists($resource_type, $this->resources)) {
			$resource = $this->resources[$resource_type];
		} else {
			$resource = null;
		}
		
		return $resource;
	}
}