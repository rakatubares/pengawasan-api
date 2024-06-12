<?php

namespace App\Traits;

use App\Http\Resources\DokTableResource;
use App\Http\Resources\Intelijen\DokLkaiNResource;
use App\Http\Resources\Intelijen\DokLkaiResource;
use App\Http\Resources\Intelijen\DokLkaiTableResource;
use App\Http\Resources\Intelijen\DokLppiResource;
use App\Http\Resources\Intelijen\DokLppiTableResource;
use App\Http\Resources\Intelijen\DokNhiNResource;
use App\Http\Resources\Intelijen\DokNhiNTableResource;
use App\Http\Resources\Intelijen\DokNhiResource;
use App\Http\Resources\Intelijen\DokNhiTableResource;
use App\Http\Resources\Intelijen\DokNiNResource;
use App\Http\Resources\Intelijen\DokNiNTableResource;
use App\Http\Resources\Intelijen\DokNiResource;
use App\Http\Resources\Penindakan\DokBukaPengamanResource;
use App\Http\Resources\Penindakan\DokBukaPengamanTableResource;
use App\Http\Resources\Penindakan\DokBukaSegelResource;
use App\Http\Resources\Penindakan\DokBukaSegelTableResource;
use App\Http\Resources\Penindakan\DokLapResource;
use App\Http\Resources\Penindakan\DokLapTableResource;
use App\Http\Resources\Penindakan\DokLiResource;
use App\Http\Resources\Penindakan\DokLiTableResource;
use App\Http\Resources\Penindakan\DokLphpResource;
use App\Http\Resources\Penindakan\DokLphpTableResource;
use App\Http\Resources\Penindakan\DokLpNResource;
use App\Http\Resources\Penindakan\DokLpResource;
use App\Http\Resources\Penindakan\DokLpTableResource;
use App\Http\Resources\Penindakan\DokLptpResource;
use App\Http\Resources\Penindakan\DokPengamanResource;
use App\Http\Resources\Penindakan\DokPengamanTableResource;
use App\Http\Resources\Penindakan\DokRiksaBadanResource;
use App\Http\Resources\Penindakan\DokRiksaBadanTableResource;
use App\Http\Resources\Penindakan\DokRiksaResource;
use App\Http\Resources\Penindakan\DokRiksaTableResource;
use App\Http\Resources\Penindakan\DokSbpResource;
use App\Http\Resources\Penindakan\DokSbpTableResource;
use App\Http\Resources\Penindakan\DokSegelResource;
use App\Http\Resources\Penindakan\DokSegelTableResource;
use App\Http\Resources\Penindakan\DokTegahResource;
use App\Http\Resources\Penindakan\DokTegahTableResource;
use App\Http\Resources\Penindakan\DokTolakSbp1Resource;
use App\Http\Resources\Penindakan\DokTolakSbp1TableResource;
use App\Http\Resources\Penindakan\DokTolakSbp2Resource;
use App\Http\Resources\Penindakan\DokTolakSbp2TableResource;
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
		$is_unpublished = (in_array($kode_status, $doc->unpublished_status)) ? true : false;
		return $is_unpublished;
	}

	public function getResource($doc_type) {
		$resources = [
			// Intelijen
			'lppi' => DokLppiResource::class,
			'lkai' => DokLkaiResource::class,
			'nhi' => DokNhiResource::class,
			'ni' => DokNiResource::class,

			'lppin' => DokLppiResource::class,
			'lkain' => DokLkaiNResource::class,
			'nhin' => DokNhiNResource::class,
			'nin' => DokNiNResource::class,

			// Penindakan
			'li' => DokLiResource::class,
			'lap' => DokLapResource::class,
			'riksa_badan' => DokRiksaBadanResource::class,
			'riksa' => DokRiksaResource::class,
			'tegah' => DokTegahResource::class,
			'segel' => DokSegelResource::class,
			'buka_segel' => DokBukaSegelResource::class,
			'sbp' => DokSbpResource::class,
			'tolak1' => DokTolakSbp1Resource::class,
			'tolak2' => DokTolakSbp2Resource::class,
			'lptp' => DokLptpResource::class,
			'lphp' => DokLphpResource::class,
			'lp' => DokLpResource::class,

			'lapn' => DokLapResource::class,
			'sbpn' => DokSbpResource::class,
			'lptpn' => DokLptpResource::class,
			'lphpn' => DokLphpResource::class,
			'lpn' => DokLpNResource::class,

			'pengaman' => DokPengamanResource::class,
			'buka_pengaman' => DokBukaPengamanResource::class,
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
			// Intelijen
			'lppi' => DokLppiTableResource::class,
			'lkai' => DokLkaiTableResource::class,
			'nhi' => DokNhiTableResource::class,
			'ni' => DokNhiTableResource::class,

			'lppin' => DokLppiTableResource::class,
			'lkain' => DokLkaiTableResource::class,
			'nhin' => DokNhiNTableResource::class,
			'nin' => DokNiNTableResource::class,

			// Penindakan
			'li' => DokLiTableResource::class,
			'lap' => DokLapTableResource::class,
			'riksa_badan' => DokRiksaBadanTableResource::class,
			'riksa' => DokRiksaTableResource::class,
			'tegah' => DokTegahTableResource::class,
			'segel' => DokSegelTableResource::class,
			'buka_segel' => DokBukaSegelTableResource::class,
			'sbp' => DokSbpTableResource::class,
			'tolak1' => DokTolakSbp1TableResource::class,
			'tolak2' => DokTolakSbp2TableResource::class,
			'lphp' => DokLphpTableResource::class,
			'lp' => DokLpTableResource::class,

			'lapn' => DokLapTableResource::class,
			'sbpn' => DokSbpTableResource::class,
			'lphpn' => DokLphpTableResource::class,
			'lpn' => DokLpTableResource::class,

			'pengaman' => DokPengamanTableResource::class,
			'buka_pengaman' => DokBukaPengamanTableResource::class,
		];

		try {
			$resource = $resources[$doc_type];
		} catch (\Throwable $th) {
			$resource = DokTableResource::class;
		}

		return $resource;
	}
}