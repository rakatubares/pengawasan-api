<?php

use App\Http\Controllers\DetailBadanController;
use App\Http\Controllers\DetailBangunanController;
use App\Http\Controllers\DetailBarangController;
use App\Http\Controllers\DetailBarangItemController;
use App\Http\Controllers\DetailDokumenController;
use App\Http\Controllers\DetailSarkutController;
use App\Http\Controllers\DokBastController;
use App\Http\Controllers\DokBukaPengamanController;
use App\Http\Controllers\DokBukaSegelController;
use App\Http\Controllers\DokContohController;
use App\Http\Controllers\DokLapController;
use App\Http\Controllers\DokLiController;
use App\Http\Controllers\DokLkaiController;
use App\Http\Controllers\DokLkaiNController;
use App\Http\Controllers\DokLpController;
use App\Http\Controllers\DokLpNController;
use App\Http\Controllers\DokLphpController;
use App\Http\Controllers\DokLphpNController;
use App\Http\Controllers\DokLppiController;
use App\Http\Controllers\DokLppiNController;
use App\Http\Controllers\DokNhiController;
use App\Http\Controllers\DokNhiNController;
use App\Http\Controllers\DokPengamanController;
use App\Http\Controllers\DokReeksporController;
use App\Http\Controllers\DokRiksaController;
use App\Http\Controllers\DokRiksaBadanController;
use App\Http\Controllers\DokSbpController;
use App\Http\Controllers\DokSbpNController;
use App\Http\Controllers\DokSegelController;
use App\Http\Controllers\DokTitipController;
use App\Http\Controllers\DokTolakSbp1Controller;
use App\Http\Controllers\DokTolakSbp2Controller;
use App\Http\Controllers\MonTarikSbpController;
use App\Http\Controllers\PenindakanController;
use App\Http\Controllers\RefBandaraController;
use App\Http\Controllers\RefEntitasController;
use App\Http\Controllers\RefJabatanController;
use App\Http\Controllers\RefKategoriPelanggaranController;
use App\Http\Controllers\RefKategoriBarangController;
use App\Http\Controllers\RefKemasanController;
use App\Http\Controllers\RefKepercayaanSumberController;
use App\Http\Controllers\RefLokasiController;
use App\Http\Controllers\RefSatuanController;
use App\Http\Controllers\RefSkemaPenindakanController;
use App\Http\Controllers\RefSprintController;
use App\Http\Controllers\RefUserCacheController;
use App\Http\Controllers\RefValiditasInformasiController;
use App\Http\Controllers\TembusanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
	return $request->user();
});

/*
 |--------------------------------------------------------------------------
 | Intelijen routes
 |--------------------------------------------------------------------------
 */

/**
 * API for LPPI
 */
Route::apiResource('lppi', DokLppiController::class);
Route::get('/lppi/{lppi_id}/display', [DokLppiController::class, 'display']);
Route::get('/lppi/{lppi_id}/form', [DokLppiController::class, 'form']);
Route::put('/lppi/{lppi_id}/publish', [DokLppiController::class, 'publish']);
Route::post('/lppi/search', [DokLppiController::class, 'search']);


/**
 * API for LKAI
 */
Route::apiResource('lkai', DokLkaiController::class);
Route::get('/lkai/{lkai_id}/display', [DokLkaiController::class, 'display']);
Route::get('/lkai/{lkai_id}/form', [DokLkaiController::class, 'form']);
Route::put('/lkai/{lkai_id}/publish', [DokLkaiController::class, 'publish']);
Route::post('/lkai/search', [DokLkaiController::class, 'search']);

/**
 * API for NHI
 */
Route::apiResource('nhi', DokNhiController::class);
Route::get('/nhi/{nhi_id}/display', [DokNhiController::class, 'display']);
Route::get('/nhi/{nhi_id}/form', [DokNhiController::class, 'form']);
Route::get('/nhi/{nhi_id}/objek', [DokNhiController::class, 'objek']);
Route::put('/nhi/{nhi_id}/publish', [DokNhiController::class, 'publish']);

/*
 |--------------------------------------------------------------------------
 | Penindakan routes
 |--------------------------------------------------------------------------
 */

/**
 * API for penindakan
 */
Route::get('/penindakan/{id}', [PenindakanController::class, 'show']);

/**
 * API for LI-1
 */
Route::apiResource('li', DokLiController::class);
Route::get('/li/{li_id}/display', [DokLiController::class, 'display']);
Route::get('/li/{li_id}/form', [DokLiController::class, 'form']);
Route::put('/li/{li_id}/publish', [DokLiController::class, 'publish']);
Route::post('/li/search', [DokLiController::class, 'search']);

/**
 * API for LAP
 */
Route::resource('lap', DokLapController::class);
Route::get('/lap/{lap_id}/display', [DokLapController::class, 'display']);
Route::get('/lap/{lap_id}/form', [DokLapController::class, 'form']);
Route::get('/lap/{lap_id}/objek', [DokLapController::class, 'objek']);
Route::put('/lap/{lap_id}/publish', [DokLapController::class, 'publish']);

/**
 * API for SBP
 */

 // Monitoring penarikan
Route::apiResource('sbp/tarik', MonTarikSbpController::class);

// Dokumen
Route::apiResource('sbp', DokSbpController::class);
Route::get('/sbp/{sbp_id}/display', [DokSbpController::class, 'display']);
Route::get('/sbp/{sbp_id}/form', [DokSbpController::class, 'form']);
Route::get('/sbp/{sbp_id}/objek', [DokSbpController::class, 'objek']);
Route::get('/sbp/{sbp_id}/linked', [DokSbpController::class, 'linked']);
Route::post('/sbp/{sbp_id}/storelinked', [DokSbpController::class, 'storeLinkedDoc']);
Route::put('/sbp/{sbp_id}/publish', [DokSbpController::class, 'publish']);
Route::post('/sbp/search', [DokSbpController::class, 'search']);

/**
 * API for BA Penolakan SBP
 */
Route::apiResource('tolak1', DokTolakSbp1Controller::class);
Route::get('/tolak1/{tolak1_id}/display', [DokTolakSbp1Controller::class, 'display']);
Route::get('/tolak1/{tolak1_id}/form', [DokTolakSbp1Controller::class, 'form']);
Route::put('/tolak1/{tolak1_id}/publish', [DokTolakSbp1Controller::class, 'publish']);
Route::post('/tolak1/search', [DokTolakSbp1Controller::class, 'search']);

/**
 * API for BA Penolakan TTD BA Penolakan SBP
 */
Route::apiResource('tolak2', DokTolakSbp2Controller::class);
Route::get('/tolak2/{tolak2_id}/display', [DokTolakSbp2Controller::class, 'display']);
Route::get('/tolak2/{tolak2_id}/form', [DokTolakSbp2Controller::class, 'form']);
Route::put('/tolak2/{tolak2_id}/publish', [DokTolakSbp2Controller::class, 'publish']);

/**
 * API for LPHP
 */
Route::apiResource('lphp', DokLphpController::class);
Route::get('/lphp/{lphp_id}/display', [DokLphpController::class, 'display']);
Route::get('/lphp/{lphp_id}/form', [DokLphpController::class, 'form']);
Route::get('/lphp/{lphp_id}/objek', [DokLphpController::class, 'objek']);
Route::put('/lphp/{lphp_id}/publish', [DokLphpController::class, 'publish']);

/**
 * API for LP
 */
Route::apiResource('lp', DokLpController::class);
Route::get('/lp/{lp_id}/display', [DokLpController::class, 'display']);
Route::get('/lp/{lp_id}/form', [DokLpController::class, 'form']);
Route::get('/lp/{lp_id}/objek', [DokLpController::class, 'objek']);
Route::put('/lp/{lp_id}/publish', [DokLpController::class, 'publish']);

/**
 * API for BA Pemeriksaan
 */
Route::apiResource('riksa', DokRiksaController::class);
Route::get('/riksa/{riksa_id}/display', [DokRiksaController::class, 'display']);
Route::get('/riksa/{riksa_id}/form', [DokRiksaController::class, 'form']);
Route::get('/riksa/{riksa_id}/objek', [DokRiksaController::class, 'objek']);
Route::put('/riksa/{riksa_id}/publish', [DokRiksaController::class, 'publish']);


/**
 * API for BA Periksa Badan
 */
Route::apiResource('riksabadan', DokRiksaBadanController::class);
Route::get('/riksabadan/{riksabadan_id}/display', [DokRiksaBadanController::class, 'display']);
Route::get('/riksabadan/{riksabadan_id}/form', [DokRiksaBadanController::class, 'form']);
Route::put('/riksabadan/{riksabadan_id}/publish', [DokRiksaBadanController::class, 'publish']);

/**
 * API for BA Segel
 */
Route::apiResource('segel', DokSegelController::class);
Route::post('/segel/search', [DokSegelController::class, 'search']);
Route::get('/segel/{segel_id}/display', [DokSegelController::class, 'display']);
Route::get('/segel/{segel_id}/form', [DokSegelController::class, 'form']);
Route::get('/segel/{segel_id}/objek', [DokSegelController::class, 'objek']);
Route::put('/segel/{segel_id}/publish', [DokSegelController::class, 'publish']);

/**
 * API for BA Buka Segel
 */
Route::apiResource('bukasegel', DokBukaSegelController::class);
Route::get('/bukasegel/{buka_segel_id}/display', [DokBukaSegelController::class, 'display']);
Route::get('/bukasegel/{buka_segel_id}/form', [DokBukaSegelController::class, 'form']);
Route::get('/bukasegel/{buka_segel_id}/objek', [DokBukaSegelController::class, 'objek']);
Route::put('/bukasegel/{buka_segel_id}/publish', [DokBukaSegelController::class, 'publish']);

/**
 * API for BA Titip
 */
Route::apiResource('titip', DokTitipController::class);
Route::get('/titip/{titip_id}/display', [DokTitipController::class, 'display']);
Route::get('/titip/{titip_id}/form', [DokTitipController::class, 'form']);
Route::get('/titip/{titip_id}/objek', [DokTitipController::class, 'objek']);
Route::put('/titip/{titip_id}/publish', [DokTitipController::class, 'publish']);

/** 
 * API for BA Contoh Barang
 */
Route::apiResource('contoh', DokContohController::class);
Route::get('/contoh/{contoh_id}/display', [DokContohController::class, 'display']);
Route::get('/contoh/{contoh_id}/objek', [DokContohController::class, 'objek']);
Route::put('/contoh/{contoh_id}/publish', [DokContohController::class, 'publish']);

/** 
 * API for BA Tanda Pengaman
 */
Route::apiResource('pengaman', DokPengamanController::class);
Route::get('/pengaman/{pengaman_id}/display', [DokPengamanController::class, 'display']);
Route::get('/pengaman/{pengaman_id}/form', [DokPengamanController::class, 'form']);
Route::get('/pengaman/{pengaman_id}/objek', [DokPengamanController::class, 'objek']);
Route::post('/pengaman/search', [DokPengamanController::class, 'search']);
Route::put('/pengaman/{pengaman_id}/publish', [DokPengamanController::class, 'publish']);

/**
 * API for BA Buka Tanda Pengaman
 */
Route::apiResource('bukapengaman', DokBukaPengamanController::class);
Route::get('/bukapengaman/{buka_pengaman_id}/display', [DokBukaPengamanController::class, 'display']);
Route::get('/bukapengaman/{buka_pengaman_id}/form', [DokBukaPengamanController::class, 'form']);
Route::get('/bukapengaman/{buka_pengaman_id}/objek', [DokBukaPengamanController::class, 'objek']);
Route::put('/bukapengaman/{buka_pengaman_id}/publish', [DokBukaPengamanController::class, 'publish']);

/**
 * API for BAST
 */
Route::apiResource('bast', DokBastController::class);
Route::get('/bast/{bast_id}/display', [DokBastController::class, 'display']);
Route::get('/bast/{bast_id}/form', [DokBastController::class, 'form']);
Route::get('/bast/{bast_id}/objek', [DokBastController::class, 'objek']);
Route::put('/bast/{bast_id}/publish', [DokBastController::class, 'publish']);

/**
 * API for BA Reekspor
 */
Route::apiResource('reekspor', DokReeksporController::class);
Route::get('/reekspor/{reekspor_id}/display', [DokReeksporController::class, 'display']);
Route::put('/reekspor/{reekspor_id}/publish', [DokReeksporController::class, 'publish']);

/*
 |--------------------------------------------------------------------------
 | NPP routes
 |--------------------------------------------------------------------------
 */

/**
 * API for LPPI-N
 */
Route::apiResource('lppin', DokLppiNController::class);
Route::get('/lppin/{lppin_id}/display', [DokLppiNController::class, 'display']);
Route::get('/lppin/{lppin_id}/form', [DokLppiNController::class, 'form']);
Route::put('/lppin/{lppin_id}/publish', [DokLppiNController::class, 'publish']);
Route::post('/lppin/search', [DokLppiNController::class, 'search']);

/**
 * API for LKAI-N
 */
Route::apiResource('lkain', DokLkaiNController::class);
Route::get('/lkain/{lkain_id}/display', [DokLkaiNController::class, 'display']);
Route::get('/lkain/{lkain_id}/form', [DokLkaiNController::class, 'form']);
Route::put('/lkain/{lkain_id}/publish', [DokLkaiNController::class, 'publish']);
Route::post('/lkain/search', [DokLkaiNController::class, 'search']);

/**
 * API for NHI-N
 */
Route::apiResource('nhin', DokNhiNController::class);
Route::get('/nhin/{nhin_id}/display', [DokNhiNController::class, 'display']);
Route::get('/nhin/{nhin_id}/form', [DokNhiNController::class, 'form']);
Route::get('/nhin/{nhin_id}/objek', [DokNhiNController::class, 'objek']);
Route::put('/nhin/{nhin_id}/publish', [DokNhiNController::class, 'publish']);

/**
 * API for SBP-N
 */
Route::apiResource('sbpn', DokSbpNController::class);
Route::get('/sbpn/{sbpn_id}/display', [DokSbpNController::class, 'display']);
Route::get('/sbpn/{sbpn_id}/form', [DokSbpNController::class, 'form']);
Route::get('/sbpn/{sbpn_id}/objek', [DokSbpNController::class, 'objek']);
Route::get('/sbpn/{sbpn_id}/linked', [DokSbpNController::class, 'linked']);
Route::post('/sbpn/{sbpn_id}/storelinked', [DokSbpNController::class, 'storeLinkedDoc']);
Route::put('/sbpn/{sbpn_id}/publish', [DokSbpNController::class, 'publish']);
Route::post('/sbpn/search', [DokSbpNController::class, 'search']);

/**
 * API for LPHP-N
 */
Route::apiResource('lphpn', DokLphpNController::class);
Route::get('/lphpn/{lphpn_id}/display', [DokLphpNController::class, 'display']);
Route::get('/lphpn/{lphpn_id}/form', [DokLphpNController::class, 'form']);
Route::get('/lphpn/{lphpn_id}/objek', [DokLphpNController::class, 'objek']);
Route::put('/lphpn/{lphpn_id}/publish', [DokLphpNController::class, 'publish']);

/**
 * API for LP-N
 */
Route::apiResource('lpn', DokLpNController::class);
Route::get('/lpn/{lpn_id}/display', [DokLpNController::class, 'display']);
Route::get('/lpn/{lpn_id}/form', [DokLpNController::class, 'form']);
Route::get('/lpn/{lpn_id}/objek', [DokLpNController::class, 'objek']);
Route::put('/lpn/{lpn_id}/publish', [DokLpNController::class, 'publish']);

/**
 * API for penindakan
 */
// Route::get('/penindakan/{id}', [PenindakanController::class, 'show']);

/*
 |--------------------------------------------------------------------------
 | Details routes
 |--------------------------------------------------------------------------
 */

/**
 * API for Details
 */
Route::prefix('{doc_type}/{doc_id}')->group(function() {
	// Sarkut
	Route::prefix('/sarkut')->group(function() {
		Route::get('/', [DetailSarkutController::class, 'show']);
		Route::post('/', [DetailSarkutController::class, 'store']);
		Route::put('/{sarkut_id}', [DetailSarkutController::class, 'update']);
		Route::delete('/', [DetailSarkutController::class, 'destroy']);
	});

	// Barang
	Route::prefix('/barang')->group(function() {
		Route::post('/new', [DetailBarangController::class, 'store']);
		Route::post('/upsert', [DetailBarangController::class, 'store']);
		Route::post('/', [DetailBarangController::class, 'store']);
		Route::put('/{barang_id}', [DetailBarangController::class, 'update']);
		Route::delete('/', [DetailBarangController::class, 'destroy']);

		// Item barang
		Route::prefix('item')->group(function() {
			Route::get('/', [DetailBarangItemController::class, 'index']);
			Route::post('/', [DetailBarangItemController::class, 'store']);
			Route::get('/{item_id}', [DetailBarangItemController::class, 'show']);
			Route::put('/{item_id}', [DetailBarangItemController::class, 'update']);
			Route::delete('/{item_id}', [DetailBarangItemController::class, 'destroy']);
		});
	});

	// Bangunan
	Route::prefix('/bangunan')->group(function() {
		Route::get('/', [DetailBangunanController::class, 'show']);
		Route::post('/', [DetailBangunanController::class, 'store']);
		Route::put('/{bangunan_id}', [DetailBangunanController::class, 'update']);
		Route::delete('/', [DetailBangunanController::class, 'destroy']);
	});

	// Badan
	Route::prefix('/orang')->group(function() {
		// Route::get('/', [DetailBadanController::class, 'show']);
		Route::post('/', [DetailBadanController::class, 'store']);
		Route::delete('/', [DetailBadanController::class, 'destroy']);
	});

	// Dokumen
	Route::prefix('/dokumen')->group(function() {
		Route::get('/', [DetailDokumenController::class, 'show']);
		Route::post('/', [DetailDokumenController::class, 'store']);
		Route::put('/{dokumen_id}', [DetailDokumenController::class, 'update']);
		Route::delete('/', [DetailDokumenController::class, 'destroy']);
	});
});

/*
 |--------------------------------------------------------------------------
 | Reference routes
 |--------------------------------------------------------------------------
 */

/**
 * API for SPRINT
 */
Route::apiResource('sprint', RefSprintController::class);
Route::post('/sprint/search', [RefSprintController::class, 'search']);

/**
 * API for Entity
 */
Route::apiResource('entitas', RefEntitasController::class);
Route::post('/entitas/search', [RefEntitasController::class, 'search']);

/**
 * API for Jabatan
 */
Route::apiResource('jabatan', RefJabatanController::class);

/**
 * API for Kategori Pelanggaran
 */
Route::apiResource('pelanggaran', RefKategoriPelanggaranController::class);

/**
 * API for Skema Penindakan
 */
Route::apiResource('penindakan', RefSkemaPenindakanController::class);

/**
 * API for Grup Lokasi
 */
Route::get('lokasi', [RefLokasiController::class, 'index']);

/**
 * API for Kemasan
 */
Route::get('kemasan/{id}', [RefKemasanController::class, 'show']);
Route::post('kemasan/search', [RefKemasanController::class, 'search']);

/**
 * API for Satuan
 */
Route::get('satuan/{id}', [RefSatuanController::class, 'show']);
Route::post('satuan/search', [RefSatuanController::class, 'search']);

/**
 * API for Kategori Barang
 */
Route::get('kategori', [RefKategoriBarangController::class, 'index']);
Route::get('kategori/{id}', [RefKategoriBarangController::class, 'show']);
Route::post('kategori/search', [RefKategoriBarangController::class, 'search']);

/**
 * API for Bandara
 */
Route::get('bandara/{code}', [RefBandaraController::class, 'show']);
Route::post('bandara/search', [RefBandaraController::class, 'search']);

/**
 * API for Klasifikasi Kepercayaan
 */
Route::get('kepercayaan', [RefKepercayaanSumberController::class, 'index']);


/**
 * API for Klasifikasi Validitas
 */
Route::get('validitas', [RefValiditasInformasiController::class, 'index']);

/**
 * API for Tembusan
 */
Route::post('tembusan/search', [TembusanController::class, 'search']);

/**
 * API for User
 */
Route::apiResource('user', RefUserCacheController::class);
Route::get('/user/id/{id}', [RefUserCacheController::class, 'show']);
Route::post('/user/role', [RefUserCacheController::class, 'role']);
Route::post('/user/jabatan', [RefUserCacheController::class, 'jabatan']);
Route::post('/jabatan/list', [RefUserCacheController::class, 'listJabatan']);

Route::get('test', function() {
	# code...
})->middleware('permission');
