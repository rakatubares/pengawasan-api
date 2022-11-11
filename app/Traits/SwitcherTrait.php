<?php

namespace App\Traits;

use App\Http\Resources\DetailBadanResource;
use App\Http\Resources\DetailBangunanResource;
use App\Http\Resources\DetailBarangResource;
use App\Http\Resources\DetailDokumenResource;
use App\Http\Resources\DetailSarkutResource;
use App\Http\Resources\DokLkaiNResource;
use App\Http\Resources\DokLkaiResource;
use App\Http\Resources\DokLkaiTableResource;
use App\Http\Resources\DokLppiResource;
use App\Http\Resources\DokLppiTableResource;
use App\Http\Resources\DokNhiResource;
use App\Http\Resources\DokNhiNResource;
use App\Http\Resources\DokNhiNTableResource;
use App\Http\Resources\DokNhiTableResource;
use App\Http\Resources\DokNiNResource;
use App\Http\Resources\DokNiNTableResource;
use App\Http\Resources\DokNiResource;
use App\Http\Resources\DokNiTableResource;
use App\Models\DetailBangunan;
use App\Models\DetailBarang;
use App\Models\DetailDokumen;
use App\Models\DetailSarkut;
use App\Models\DokLkai;
use App\Models\DokLkaiN;
use App\Models\DokLppi;
use App\Models\DokLppiN;
use App\Models\DokNhi;
use App\Models\DokNhiN;
use App\Models\DokNi;
use App\Models\DokNiN;
use App\Models\RefEntitas;
use Illuminate\Database\Eloquent\Model;

trait SwitcherTrait
{
	private $models = [
		// Intelijen
		'lkai' => [
			'tipe_dok' => 'LKAI',
			'agenda' => '/KPU.305/',
			'parent' => 'intelijen',
			'model' => DokLkai::class,
			'resource' => DokLkaiResource::class,
			'table_resource' => DokLkaiTableResource::class,
		],
		'lkain' => [
			'tipe_dok' => 'LKAI-N',
			'agenda' => '/KPU.305/',
			'parent' => 'intelijen',
			'model' => DokLkaiN::class,
			'resource' => DokLkaiNResource::class,
			'table_resource' => DokLkaiTableResource::class,
		],
		'lppi' => [
			'tipe_dok' => 'LPPI',
			'agenda' => '/KPU.305/',
			'parent' => 'intelijen',
			'model' => DokLppi::class,
			'resource' => DokLppiResource::class,
			'table_resource' => DokLppiTableResource::class,
		],
		'lppin' => [
			'tipe_dok' => 'LPPI-N',
			'agenda' => '/KPU.305/',
			'parent' => 'intelijen',
			'model' => DokLppiN::class,
			'resource' => DokLppiResource::class,
			'table_resource' => DokLppiTableResource::class,
		],
		'nhi' => [
			'tipe_dok' => 'NHI',
			'agenda' => '/KPU.305/',
			'parent' => 'intelijen',
			'model' => DokNhi::class,
			'resource' => DokNhiResource::class,
			'table_resource' => DokNhiTableResource::class,
		],
		'nhin' => [
			'tipe_dok' => 'NHI-N',
			'agenda' => '/KPU.305/',
			'parent' => 'intelijen',
			'model' => DokNhiN::class,
			'resource' => DokNhiNResource::class,
			'table_resource' => DokNhiNTableResource::class,
		],
		'ni' => [
			'tipe_dok' => 'NI',
			'agenda' => '/KPU.305/',
			'parent' => 'intelijen',
			'model' => DokNi::class,
			'resource' => DokNiResource::class,
			'table_resource' => DokNiTableResource::class,
		],
		'nin' => [
			'tipe_dok' => 'NI-N',
			'agenda' => '/KPU.305/',
			'parent' => 'intelijen',
			'model' => DokNiN::class,
			'resource' => DokNiNResource::class,
			'table_resource' => DokNiNTableResource::class,
		],

		// Objek
		'bangunan' => [
			'parent' => 'objek',
			'model' => DetailBangunan::class
		],
		'barang' => [
			'parent' => 'objek',
			'model' => DetailBarang::class
		],
		'dokumen' => [
			'parent' => 'objek',
			'model' => DetailDokumen::class
		],
		'orang' => [
			'parent' => 'objek',
			'model' => RefEntitas::class
		],
		'sarkut' => [
			'parent' => 'objek',
			'model' => DetailSarkut::class
		],
	];

	private $resources = [
		'badan' => DetailBadanResource::class,
		'bangunan' => DetailBangunanResource::class,
		'barang' => DetailBarangResource::class,
		'dokumen' => DetailDokumenResource::class,
		'sarkut' => DetailSarkutResource::class,
	];

	public function switchObject($object_name, $object_type)
	{
		if (array_key_exists($object_name, $this->models)) {
			$model = $this->models[$object_name][$object_type];
		} else {
			$model = null;
		}
		
		return $model;
	}

	public function getModelsListByParent($parent)
	{
		$docs = [];
		foreach ($this->models as $model => $values) {
			if ($values['parent'] == $parent) {
				array_push($docs, $model);
			}
		}
		return $docs;
	}

	/**
	 * Get model by doc type
	 * 
	 * @param string $doc_type
	 * @return Model
	 */
	public function getModel($doc_type)
	{
		if (array_key_exists($doc_type, $this->models)) {
			$model = $this->models[$doc_type]['model'];
		} else {
			$model = null;
		}
		
		return $model;
	}

	/**
	 * Get model by doc type
	 * 
	 * @param string $doc_type
	 * @return Model
	 */
	public function getDocType($doc_type)
	{
		if (array_key_exists($doc_type, $this->models)) {
			$model = $this->models[$doc_type]['tipe_dok'];
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