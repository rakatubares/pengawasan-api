<?php

namespace App\Traits;

use App\Http\Resources\DetailBadanResource;
use App\Http\Resources\DetailBangunanResource;
use App\Http\Resources\DetailBarangResource;
use App\Http\Resources\DetailDokumenResource;
use App\Http\Resources\DetailSarkutResource;
use App\Http\Resources\DokBastResource;
use App\Http\Resources\DokBastTableResource;
use App\Http\Resources\DokBukaPengamanResource;
use App\Http\Resources\DokBukaPengamanTableResource;
use App\Http\Resources\DokBukaSegelResource;
use App\Http\Resources\DokBukaSegelTableResource;
use App\Http\Resources\DokContohResource;
use App\Http\Resources\DokContohTableResource;
use App\Http\Resources\DokLapResource;
use App\Http\Resources\DokLapTableResource;
use App\Http\Resources\DokLiResource;
use App\Http\Resources\DokLiTableResource;
use App\Http\Resources\DokLkaiResource;
use App\Http\Resources\DokLkaiTableResource;
use App\Http\Resources\DokLphpResource;
use App\Http\Resources\DokLphpTableResource;
use App\Http\Resources\DokLpNResource;
use App\Http\Resources\DokLppiResource;
use App\Http\Resources\DokLppiTableResource;
use App\Http\Resources\DokLpResource;
use App\Http\Resources\DokLpTableResource;
use App\Http\Resources\DokLptpNResource;
use App\Http\Resources\DokLptpResource;
use App\Http\Resources\DokNhiResource;
use App\Http\Resources\DokNhiTableResource;
use App\Http\Resources\DokPengamanResource;
use App\Http\Resources\DokPengamanTableResource;
use App\Http\Resources\DokReeksporResource;
use App\Http\Resources\DokReeksporTableResource;
use App\Http\Resources\DokRiksaResource;
use App\Http\Resources\DokRiksaBadanResource;
use App\Http\Resources\DokRiksaBadanTableResource;
use App\Http\Resources\DokRiksaTableResource;
use App\Http\Resources\DokSbpResource;
use App\Http\Resources\DokSbpTableResource;
use App\Http\Resources\DokSegelResource;
use App\Http\Resources\DokSegelTableResource;
use App\Http\Resources\DokTegahResource;
use App\Http\Resources\DokTegahTableResource;
use App\Http\Resources\DokTitipResource;
use App\Http\Resources\DokTitipTableResource;
use App\Http\Resources\DokTolakSbp1Resource;
use App\Http\Resources\DokTolakSbp1TableResource;
use App\Http\Resources\DokTolakSbp2Resource;
use App\Http\Resources\DokTolakSbp2TableResource;
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
use App\Models\DokLp;
use App\Models\DokLphp;
use App\Models\DokLphpN;
use App\Models\DokLpN;
use App\Models\DokLppi;
use App\Models\DokLptp;
use App\Models\DokLptpN;
use App\Models\DokNhi;
use App\Models\DokPengaman;
use App\Models\DokReekspor;
use App\Models\DokRiksa;
use App\Models\DokRiksaBadan;
use App\Models\DokSbp;
use App\Models\DokSbpN;
use App\Models\DokSegel;
use App\Models\DokTitip;
use App\Models\DokTegah;
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
		'nhi' => [
			'tipe_dok' => 'NHI',
			'agenda' => '/KPU.305/',
			'parent' => 'intelijen',
			'model' => DokNhi::class,
			'resource' => DokNhiResource::class,
			'table_resource' => DokNhiTableResource::class,
		],

		// Penindakan
		'bast' => [
			'tipe_dok' => 'BAST',
			'agenda' => '/KPU.305/',
			'parent' => 'bast',
			'model' => DokBast::class,
			'resource' => DokBastResource::class,
			'table_resource' => DokBastTableResource::class,
		],
		'bukapengaman' => [
			'tipe_dok' => 'BA',
			'agenda' => '/TANDAPENGAMAN/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokBukaPengaman::class,
			'resource' => DokBukaPengamanResource::class,
			'table_resource' => DokBukaPengamanTableResource::class,
		],
		'bukasegel' => [
			'tipe_dok' => 'BA',
			'agenda' => '/BUKA SEGEL/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokBukaSegel::class,
			'resource' => DokBukaSegelResource::class,
			'table_resource' => DokBukaSegelTableResource::class,
		],
		'contoh' => [
			'tipe_dok' => 'BA',
			'agenda' => '/CONTOH/KPU.305/',
			'parent' => 'contoh',
			'model' => DokContoh::class,
			'resource' => DokContohResource::class,
			'table_resource' => DokContohTableResource::class,
		],
		'lap' => [
			'tipe_dok' => 'LAP',
			'agenda' => '/KPU.305/',
			'parent' => 'lap',
			'model' => DokLap::class,
			'resource' => DokLapResource::class,
			'table_resource' => DokLapTableResource::class,
		],
		'li' => [
			'tipe_dok' => 'LI-1',
			'agenda' => '/KPU.305/',
			'parent' => 'li',
			'model' => DokLi::class,
			'resource' => DokLiResource::class,
			'table_resource' => DokLiTableResource::class,
		],
		'lp' => [
			'tipe_dok' => 'LP',
			'agenda' => '/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokLp::class,
			'resource' => DokLpResource::class,
			'table_resource' => DokLpTableResource::class,
		],
		'lpn' => [
			'tipe_dok' => 'LP-N',
			'agenda' => '/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokLpN::class,
			'resource' => DokLpNResource::class,
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
		'lphpn' => [
			'tipe_dok' => 'LPHP-N',
			'agenda' => '/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokLphpN::class,
			'resource' => DokLphpResource::class,
			'table_resource' => DokLphpTableResource::class,
		],
		'lptp' => [
			'tipe_dok' => 'LPTP',
			'agenda' => '/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokLptp::class,
			'resource' => DokLptpResource::class,
			'table_resource' => null,
		],
		'lptpn' => [
			'tipe_dok' => 'LPTP-N',
			'agenda' => '/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokLptpN::class,
			'resource' => DokLptpNResource::class,
			'table_resource' => null,
		],
		'pengaman' => [
			'tipe_dok' => 'BA',
			'agenda' => '/TANDAPENGAMAN/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokPengaman::class,
			'resource' => DokPengamanResource::class,
			'table_resource' => DokPengamanTableResource::class,
		],
		'reekspor' => [
			'tipe_dok' => 'BA',
			'agenda' => '/KPU.305/',
			'parent' => 'reekspor',
			'model' => DokReekspor::class,
			'resource' => DokReeksporResource::class,
			'table_resource' => DokReeksporTableResource::class,
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
		'sbpn' => [
			'tipe_dok' => 'SBP-N',
			'agenda' => '/TINDAK/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokSbpN::class,
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
		'titip' => [
			'tipe_dok' => 'BA',
			'agenda' => '/TITIP/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokTitip::class,
			'resource' => DokTitipResource::class,
			'table_resource' => DokTitipTableResource::class,
		],
		'tolak1' => [
			'tipe_dok' => 'BA',
			'agenda' => '/TOLAK 1/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokTolakSbp1::class,
			'resource' => DokTolakSbp1Resource::class,
			'table_resource' => DokTolakSbp1TableResource::class,
		],
		'tolak2' => [
			'tipe_dok' => 'BA',
			'agenda' => '/TOLAK 2/KPU.305/',
			'parent' => 'penindakan',
			'model' => DokTolakSbp2::class,
			'resource' => DokTolakSbp2Resource::class,
			'table_resource' => DokTolakSbp2TableResource::class,
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