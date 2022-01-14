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
use App\Http\Resources\DokLphpResource;
use App\Http\Resources\DokLpResource;
use App\Http\Resources\DokPengamanResource;
use App\Http\Resources\LptpResource;
use App\Http\Resources\RiksaResource;
use App\Http\Resources\SbpResource;
use App\Http\Resources\SegelResource;
use App\Http\Resources\TegahResource;
use App\Http\Resources\TitipResource;
use App\Models\BukaSegel;
use App\Models\DetailBangunan;
use App\Models\DetailBarang;
use App\Models\DetailDokumen;
use App\Models\DetailSarkut;
use App\Models\DokBast;
use App\Models\DokBukaPengaman;
use App\Models\DokBukaSegel;
use App\Models\DokLp;
use App\Models\DokLphp;
use App\Models\DokPengaman;
use App\Models\Lptp;
use App\Models\RefEntitas;
use App\Models\Riksa;
use App\Models\Sbp;
use App\Models\Segel;
use App\Models\Tegah;
use App\Models\Titip;
use Illuminate\Database\Eloquent\Model;

trait SwitcherTrait
{
	private $models = [
		// Dokumen
		'bast' => [
			'tipe_dok' => 'BAST',
			'model' => DokBast::class,
			'resource' => DokBastResource::class,
		],
		'bukapengaman' => [
			'tipe_dok' => 'BA',
			'model' => DokBukaPengaman::class,
			'resource' => DokBukaPengamanResource::class,
		],
		'bukasegel' => [
			'tipe_dok' => 'BA',
			'parent' => 'penindakan',
			'model' => DokBukaSegel::class,
			'resource' => DokBukaSegelResource::class,
		],
		'lp' => [
			'tipe_dok' => 'LP',
			'parent' => 'penindakan',
			'model' => DokLp::class,
			'resource' => DokLpResource::class,
		],
		'lphp' => [
			'tipe_dok' => 'LPHP',
			'parent' => 'penindakan',
			'model' => DokLphp::class,
			'resource' => DokLphpResource::class,
		],
		'lptp' => [
			'tipe_dok' => 'LPTP',
			'parent' => 'penindakan',
			'model' => Lptp::class,
			'resource' => LptpResource::class,
		],
		'pengaman' => [
			'tipe_dok' => 'BA',
			'model' => DokPengaman::class,
			'resource' => DokPengamanResource::class,
		],
		'riksa' => [
			'tipe_dok' => 'BA',
			'parent' => 'penindakan',
			'model' => Riksa::class,
			'resource' => RiksaResource::class,
		],
		'sbp' => [
			'tipe_dok' => 'SBP',
			'parent' => 'penindakan',
			'model' => Sbp::class,
			'resource' => SbpResource::class,
		],
		'segel' => [
			'tipe_dok' => 'BA',
			'parent' => 'penindakan',
			'model' => Segel::class,
			'resource' => SegelResource::class,
		],
		'titip' => [
			'tipe_dok' => 'BA',
			'parent' => 'penindakan',
			'model' => Titip::class,
			'resource' => TitipResource::class,
		],
		'tegah' => [
			'tipe_dok' => 'BA',
			'parent' => 'penindakan',
			'model' => Tegah::class,
			'resource' => TegahResource::class,
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