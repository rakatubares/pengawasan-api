<?php

namespace App\Traits;

use App\Http\Resources\DetailBadanResource;
use App\Http\Resources\DetailBangunanResource;
use App\Http\Resources\DetailBarangResource;
use App\Http\Resources\DetailDokumenResource;
use App\Http\Resources\DetailSarkutResource;
use App\Http\Resources\DokLphpResource;
use App\Http\Resources\DokLphpTableResource;
use App\Http\Resources\DokLppResource;
use App\Http\Resources\DokLppTableResource;
use App\Http\Resources\DokLpResource;
use App\Http\Resources\DokLpTableResource;
use App\Http\Resources\DokLptpResource;
use App\Http\Resources\DokRiksaBadanResource;
use App\Http\Resources\DokRiksaBadanTableResource;
use App\Http\Resources\DokRiksaResource;
use App\Http\Resources\DokRiksaTableResource;
use App\Http\Resources\DokSbpResource;
use App\Http\Resources\DokSbpTableResource;
use App\Http\Resources\DokSegelResource;
use App\Http\Resources\DokSegelTableResource;
use App\Http\Resources\DokTegahResource;
use App\Http\Resources\DokTegahTableResource;
use App\Models\DetailBangunan;
use App\Models\DetailBarang;
use App\Models\DetailDokumen;
use App\Models\DetailSarkut;
use App\Models\DokLp;
use App\Models\DokLphp;
use App\Models\DokLpp;
use App\Models\DokLptp;
use App\Models\DokRiksa;
use App\Models\DokRiksaBadan;
use App\Models\DokSbp;
use App\Models\DokSegel;
use App\Models\DokTegah;
use App\Models\RefEntitas;
use Illuminate\Database\Eloquent\Model;

trait SwitcherTrait
{
	private $models = [
		// Penindakan
		'lp' => [
			'tipe_dok' => 'LP',
			'agenda' => '/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokLp::class,
			'resource' => DokLpResource::class,
			'table_resource' => DokLpTableResource::class,
		],
		'lphp' => [
			'tipe_dok' => 'LPHP',
			'agenda' => '/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokLphp::class,
			'resource' => DokLphpResource::class,
			'table_resource' => DokLphpTableResource::class,
		],
		'lptp' => [
			'tipe_dok' => 'LPTP',
			'agenda' => '/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokLptp::class,
			'resource' => DokLptpResource::class,
		],
		'riksa' => [
			'tipe_dok' => 'BA',
			'agenda' => '/RIKSA/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokRiksa::class,
			'resource' => DokRiksaResource::class,
			'table_resource' => DokRiksaTableResource::class,
		],
		'riksabadan' => [
			'tipe_dok' => 'BA',
			'agenda' => '/BADAN/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokRiksaBadan::class,
			'resource' => DokRiksaBadanResource::class,
			'table_resource' => DokRiksaBadanTableResource::class,
		],
		'sbp' => [
			'tipe_dok' => 'SBP',
			'agenda' => '/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokSbp::class,
			'resource' => DokSbpResource::class,
			'table_resource' => DokSbpTableResource::class,
		],
		'segel' => [
			'tipe_dok' => 'BA',
			'agenda' => '/SEGEL/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokSegel::class,
			'resource' => DokSegelResource::class,
			'table_resource' => DokSegelTableResource::class,
		],
		'tegah' => [
			'tipe_dok' => 'BA',
			'agenda' => '/TEGAH/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokTegah::class,
			'resource' => DokTegahResource::class,
			'table_resource' => DokTegahTableResource::class,
		],

		// Penyidikan
		'lpp' => [
			'tipe_dok' => 'LPP',
			'agenda' => '/KPU.305/',
			'parent' => 'penyidikan',
			'model' => DokLpp::class,
			'resource' => DokLppResource::class,
			'table_resource' => DokLppTableResource::class,
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