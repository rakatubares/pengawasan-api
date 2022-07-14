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
use App\Http\Resources\DokLkaiResource;
use App\Http\Resources\DokLphpResource;
use App\Http\Resources\DokLpNResource;
use App\Http\Resources\DokLppiResource;
use App\Http\Resources\DokLpResource;
use App\Http\Resources\DokLptpNResource;
use App\Http\Resources\DokLptpResource;
use App\Http\Resources\DokNhiResource;
use App\Http\Resources\DokNhiNResource;
use App\Http\Resources\DokNiResource;
use App\Http\Resources\DokPengamanResource;
use App\Http\Resources\DokReeksporResource;
use App\Http\Resources\DokRiksaResource;
use App\Http\Resources\DokRiksaBadanResource;
use App\Http\Resources\DokSbpResource;
use App\Http\Resources\DokSegelResource;
use App\Http\Resources\DokTegahResource;
use App\Http\Resources\DokTitipResource;
use App\Http\Resources\DokTolakSbp1Resource;
use App\Http\Resources\DokTolakSbp2Resource;
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
use App\Models\DokLkai;
use App\Models\DokLkaiN;
use App\Models\DokLp;
use App\Models\DokLphp;
use App\Models\DokLphpN;
use App\Models\DokLpN;
use App\Models\DokLppi;
use App\Models\DokLppiN;
use App\Models\DokLptp;
use App\Models\DokLptpN;
use App\Models\DokNhi;
use App\Models\DokNhiN;
use App\Models\DokNi;
use App\Models\DokPengaman;
use App\Models\DokReekspor;
use App\Models\DokRiksa;
use App\Models\DokRiksaBadan;
use App\Models\DokSbp;
use App\Models\DokSbpN;
use App\Models\DokSegel;
use App\Models\DokTegah;
use App\Models\DokTitip;
use App\Models\DokTolakSbp1;
use App\Models\DokTolakSbp2;
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
		],
		'lkain' => [
			'tipe_dok' => 'LKAI-N',
			'agenda' => '/KPU.305/',
			'parent' => 'intelijen',
			'model' => DokLkaiN::class,
			'resource' => DokLkaiResource::class,
		],
		'lppi' => [
			'tipe_dok' => 'LPPI',
			'agenda' => '/KPU.305/',
			'parent' => 'intelijen',
			'model' => DokLppi::class,
			'resource' => DokLppiResource::class,
		],
		'lppin' => [
			'tipe_dok' => 'LPPI-N',
			'agenda' => '/KPU.305/',
			'parent' => 'intelijen',
			'model' => DokLppiN::class,
			'resource' => DokLppiResource::class,
		],
		'nhi' => [
			'tipe_dok' => 'NHI',
			'agenda' => '/KPU.305/',
			'parent' => 'intelijen',
			'model' => DokNhi::class,
			'resource' => DokNhiResource::class,
		],
		'nhin' => [
			'tipe_dok' => 'NHI-N',
			'agenda' => '/KPU.305/',
			'parent' => 'intelijen',
			'model' => DokNhiN::class,
			'resource' => DokNhiNResource::class,
		],
		'ni' => [
			'tipe_dok' => 'NI',
			'agenda' => '/KPU.305/',
			'parent' => 'intelijen',
			'model' => DokNi::class,
			'resource' => DokNiResource::class,
		],
		
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
		'lp' => [
			'tipe_dok' => 'LP',
			'agenda' => '/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokLp::class,
			'resource' => DokLpResource::class,
		],
		'lpn' => [
			'tipe_dok' => 'LP-N',
			'agenda' => '/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokLpN::class,
			'resource' => DokLpNResource::class,
		],
		'lphp' => [
			'tipe_dok' => 'LPHP',
			'agenda' => '/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokLphp::class,
			'resource' => DokLphpResource::class,
		],
		'lphpn' => [
			'tipe_dok' => 'LPHP-N',
			'agenda' => '/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokLphpN::class,
			'resource' => DokLphpResource::class,
		],
		'lptp' => [
			'tipe_dok' => 'LPTP',
			'agenda' => '/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokLptp::class,
			'resource' => DokLptpResource::class,
		],
		'lptpn' => [
			'tipe_dok' => 'LPTP-N',
			'agenda' => '/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokLptpN::class,
			'resource' => DokLptpNResource::class,
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
		'sbp' => [
			'tipe_dok' => 'SBP',
			'agenda' => '/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokSbp::class,
			'resource' => DokSbpResource::class,
		],
		'sbpn' => [
			'tipe_dok' => 'SBP-N',
			'agenda' => '/TINDAK/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokSbpN::class,
			'resource' => DokSbpResource::class,
		],
		'segel' => [
			'tipe_dok' => 'BA',
			'agenda' => '/SEGEL/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokSegel::class,
			'resource' => DokSegelResource::class,
		],
		'titip' => [
			'tipe_dok' => 'BA',
			'agenda' => '/TITIP/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokTitip::class,
			'resource' => DokTitipResource::class,
		],
		'tegah' => [
			'tipe_dok' => 'BA',
			'agenda' => '/TEGAH/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokTegah::class,
			'resource' => DokTegahResource::class
		],
		'tolak1' => [
			'tipe_dok' => 'BA',
			'agenda' => '/TOLAK 1/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokTolakSbp1::class,
			'resource' => DokTolakSbp1Resource::class
		],
		'tolak2' => [
			'tipe_dok' => 'BA',
			'agenda' => '/TOLAK 2/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokTolakSbp2::class,
			'resource' => DokTolakSbp2Resource::class
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