<?php

namespace App\Traits;

use App\Http\Resources\DetailBadanResource;
use App\Http\Resources\DetailBangunanResource;
use App\Http\Resources\DetailBarangResource;
use App\Http\Resources\DetailDokumenResource;
use App\Http\Resources\DetailSarkutResource;
use App\Http\Resources\DokBastResource;
use App\Http\Resources\DokBukaPengamanResource;
use App\Http\Resources\DokBukaSegelResource;
use App\Http\Resources\DokContohResource;
use App\Http\Resources\DokLapResource;
use App\Http\Resources\DokLiResource;
use App\Http\Resources\DokPengamanResource;
use App\Http\Resources\DokReeksporResource;
use App\Http\Resources\DokRiksaResource;
use App\Http\Resources\DokRiksaBadanResource;
use App\Http\Resources\DokSegelResource;
use App\Models\DetailBangunan;
use App\Models\DetailBarang;
use App\Models\DetailDokumen;
use App\Models\DetailSarkut;
use App\Models\DokBast;
use App\Models\DokBukaPengaman;
use App\Models\DokBukaSegel;
use App\Models\DokContoh;
use App\Models\DokLap;
use App\Models\DokLi;
use App\Models\DokPengaman;
use App\Models\DokReekspor;
use App\Models\DokRiksa;
use App\Models\DokRiksaBadan;
use App\Models\DokSegel;
use App\Models\RefEntitas;
use Illuminate\Database\Eloquent\Model;

trait SwitcherTrait
{
	private $models = [
		// Dokumen
		'bast' => [
			'tipe_dok' => 'BAST',
			'agenda' => '/KPU.305/',
			'parent' => 'bast',
			'model' => DokBast::class,
			'resource' => DokBastResource::class,
		],
		'bukapengaman' => [
			'tipe_dok' => 'BA',
			'agenda' => '/TANDAPENGAMAN/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokBukaPengaman::class,
			'resource' => DokBukaPengamanResource::class,
		],
		'bukasegel' => [
			'tipe_dok' => 'BA',
			'agenda' => '/BUKA SEGEL/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokBukaSegel::class,
			'resource' => DokBukaSegelResource::class,
		],
		'contoh' => [
			'tipe_dok' => 'BA',
			'agenda' => '/CONTOH/KPU.305/',
			'parent' => 'contoh',
			'model' => DokContoh::class,
			'resource' => DokContohResource::class,
		],
		'lap' => [
			'tipe_dok' => 'LAP',
			'agenda' => '/KPU.305/',
			'parent' => 'lap',
			'model' => DokLap::class,
			'resource' => DokLapResource::class,
		],
		'li' => [
			'tipe_dok' => 'LI-1',
			'agenda' => '/KPU.305/',
			'parent' => 'li',
			'model' => DokLi::class,
			'resource' => DokLiResource::class,
		],
		'pengaman' => [
			'tipe_dok' => 'BA',
			'agenda' => '/TANDAPENGAMAN/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokPengaman::class,
			'resource' => DokPengamanResource::class,
		],
		'reekspor' => [
			'tipe_dok' => 'BA',
			'agenda' => '/KPU.305/',
			'parent' => 'reekspor',
			'model' => DokReekspor::class,
			'resource' => DokReeksporResource::class,
		],
		'riksa' => [
			'tipe_dok' => 'BA',
			'agenda' => '/RIKSA/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokRiksa::class,
			'resource' => DokRiksaResource::class,
		],
		'riksabadan' => [
			'tipe_dok' => 'BA',
			'agenda' => '/BADAN/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokRiksaBadan::class,
			'resource' => DokRiksaBadanResource::class,
		],
		'segel' => [
			'tipe_dok' => 'BA',
			'agenda' => '/SEGEL/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokSegel::class,
			'resource' => DokSegelResource::class,
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