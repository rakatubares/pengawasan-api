<?php

namespace App\Traits;

use App\Http\Resources\DetailBadanResource;
use App\Http\Resources\DetailBangunanResource;
use App\Http\Resources\DetailBarangResource;
use App\Http\Resources\DetailDokumenResource;
use App\Http\Resources\DetailSarkutResource;
use App\Models\SerahTerima;
use App\Models\BukaSegel;
use App\Models\DetailBarang;
use App\Models\Lptp;
use App\Models\Riksa;
use App\Models\Sbp;
use App\Models\Segel;
use App\Models\Titip;
use App\Models\Tegah;
use Illuminate\Database\Eloquent\Model;

trait SwitcherTrait
{
	private $models = [
		'bukasegel' => [
			'class' => BukaSegel::class,
			'tipe_dok' => 'BA'
		],
		'lptp' => [
			'class' => Lptp::class,
			'tipe_dok' => 'LPTP'
		],
		'riksa' => [
			'class' => Riksa::class,
			'tipe_dok' => 'BA'
		],
		'sbp' => [
			'class' => Sbp::class,
			'tipe_dok' => 'SBP'
		],
		'segel' => [
			'class' => Segel::class,
			'tipe_dok' => 'BA'
		],
		'titip' => [
			'class' => Titip::class,
			'tipe_dok' => 'BA'
		],
		'tegah' => [
			'class' => Tegah::class,
			'tipe_dok' => 'BA'
		],
		'barang' => [
			'class' => DetailBarang::class
		],
	];

	private $resources = [
		'badan' => DetailBadanResource::class,
		'bangunan' => DetailBangunanResource::class,
		'barang' => DetailBarangResource::class,
		'dokumen' => DetailDokumenResource::class,
		'sarkut' => DetailSarkutResource::class,
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
			$model = $this->models[$doc_type]['class'];
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