<?php

use App\Http\Controllers\DetailBadanController;
use App\Http\Controllers\DetailBangunanController;
use App\Http\Controllers\DetailBarangController;
use App\Http\Controllers\DetailBarangItemController;
use App\Http\Controllers\DetailDokumenController;
use App\Http\Controllers\DetailSarkutController;
use App\Http\Controllers\DokLpController;
use App\Http\Controllers\DokLphpController;
use App\Http\Controllers\DokLphpNController;
use App\Http\Controllers\DokLpNController;
use App\Http\Controllers\DokLppController;
use App\Http\Controllers\DokLptpController;
use App\Http\Controllers\DokLptpNController;
use App\Http\Controllers\DokRiksaBadanController;
use App\Http\Controllers\DokRiksaController;
use App\Http\Controllers\DokSbpController;
use App\Http\Controllers\DokSbpNController;
use App\Http\Controllers\DokSegelController;
use App\Http\Controllers\RefEntitasController;
use App\Http\Controllers\RefJabatanController;
use App\Http\Controllers\RefKategoriBarangController;
use App\Http\Controllers\RefKemasanController;
use App\Http\Controllers\RefLokasiController;
use App\Http\Controllers\RefNegaraController;
use App\Http\Controllers\RefSatuanController;
use App\Http\Controllers\RefSprintController;
use App\Http\Controllers\RefUserCacheController;
use App\Http\Controllers\TrackingSbpController;
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
 | Penindakan routes
 |--------------------------------------------------------------------------
 */

/**
 * API for SBP
 */
Route::apiResource('sbp', DokSbpController::class);
Route::get('/sbp/{sbp_id}/display', [DokSbpController::class, 'display']);
Route::get('/sbp/{sbp_id}/form', [DokSbpController::class, 'form']);
Route::get('/sbp/{sbp_id}/docs', [DokSbpController::class, 'docs']);
Route::get('/sbp/{sbp_id}/pdf', [DokSbpController::class, 'pdf']);
Route::get('/sbp/{sbp_id}/objek', [DokSbpController::class, 'objek']);
Route::get('/sbp/{sbp_id}/linked', [DokSbpController::class, 'linked']);
Route::post('/sbp/{sbp_id}/storelinked', [DokSbpController::class, 'storeLinkedDoc']);
Route::put('/sbp/{sbp_id}/publish', [DokSbpController::class, 'publish']);
Route::post('/sbp/search', [DokSbpController::class, 'search']);

/**
 * API for LPTP
 */
Route::get('/lptp/{lptp_id}/pdf', [DokLptpController::class, 'pdf']);

/**
 * API for LPHP
 */
Route::apiResource('lphp', DokLphpController::class);
Route::get('/lphp/{lphp_id}/display', [DokLphpController::class, 'display']);
Route::get('/lphp/{lphp_id}/form', [DokLphpController::class, 'form']);
Route::get('/lphp/{lphp_id}/docs', [DokLphpController::class, 'docs']);
Route::get('/lphp/{lphp_id}/pdf', [DokLphpController::class, 'pdf']);
Route::get('/lphp/{lphp_id}/objek', [DokLphpController::class, 'objek']);
Route::put('/lphp/{lphp_id}/publish', [DokLphpController::class, 'publish']);

/**
 * API for LP
 */
Route::apiResource('lp', DokLpController::class);
Route::get('/lp/{lp_id}/display', [DokLpController::class, 'display']);
Route::get('/lp/{lp_id}/form', [DokLpController::class, 'form']);
Route::get('/lp/{lp_id}/docs', [DokLpController::class, 'docs']);
Route::get('/lp/{lp_id}/pdf', [DokLpController::class, 'pdf']);
Route::get('/lp/{lp_id}/objek', [DokLpController::class, 'objek']);
Route::put('/lp/{lp_id}/publish', [DokLpController::class, 'publish']);
Route::post('/lp/search', [DokLpController::class, 'search']);

/**
 * API for BA Pemeriksaan
 */
Route::apiResource('riksa', DokRiksaController::class);
Route::get('/riksa/{riksa_id}/display', [DokRiksaController::class, 'display']);
Route::get('/riksa/{riksa_id}/form', [DokRiksaController::class, 'form']);
Route::get('/riksa/{riksa_id}/docs', [DokRiksaController::class, 'docs']);
Route::get('/riksa/{riksa_id}/pdf', [DokRiksaController::class, 'pdf']);
Route::get('/riksa/{riksa_id}/objek', [DokRiksaController::class, 'objek']);
Route::put('/riksa/{riksa_id}/publish', [DokRiksaController::class, 'publish']);

/**
 * API for BA Periksa Badan
 */
Route::apiResource('riksabadan', DokRiksaBadanController::class);
Route::get('/riksabadan/{riksabadan_id}/display', [DokRiksaBadanController::class, 'display']);
Route::get('/riksabadan/{riksabadan_id}/form', [DokRiksaBadanController::class, 'form']);
Route::get('/riksabadan/{riksabadan_id}/docs', [DokRiksaBadanController::class, 'docs']);
Route::get('/riksabadan/{riksabadan_id}/pdf', [DokRiksaBadanController::class, 'pdf']);
Route::put('/riksabadan/{riksabadan_id}/publish', [DokRiksaBadanController::class, 'publish']);

/**
 * API for BA Segel
 */
Route::apiResource('segel', DokSegelController::class);
Route::post('/segel/search', [DokSegelController::class, 'search']);
Route::get('/segel/{segel_id}/display', [DokSegelController::class, 'display']);
Route::get('/segel/{segel_id}/form', [DokSegelController::class, 'form']);
Route::get('/segel/{segel_id}/docs', [DokSegelController::class, 'docs']);
Route::get('/segel/{segel_id}/pdf', [DokSegelController::class, 'pdf']);
Route::get('/segel/{segel_id}/objek', [DokSegelController::class, 'objek']);
Route::put('/segel/{segel_id}/publish', [DokSegelController::class, 'publish']);

/*
 |--------------------------------------------------------------------------
 | NPP routes
 |--------------------------------------------------------------------------
 */

 /**
 * API for SBP-N
 */
Route::apiResource('sbpn', DokSbpNController::class);
Route::get('/sbpn/{sbpn_id}/display', [DokSbpNController::class, 'display']);
Route::get('/sbpn/{sbpn_id}/form', [DokSbpNController::class, 'form']);
Route::get('/sbpn/{sbpn_id}/docs', [DokSbpNController::class, 'docs']);
Route::get('/sbpn/{sbpn_id}/pdf', [DokSbpNController::class, 'pdf']);
Route::get('/sbpn/{sbpn_id}/objek', [DokSbpNController::class, 'objek']);
Route::get('/sbpn/{sbpn_id}/linked', [DokSbpNController::class, 'linked']);
Route::post('/sbpn/{sbpn_id}/storelinked', [DokSbpNController::class, 'storeLinkedDoc']);
Route::put('/sbpn/{sbpn_id}/publish', [DokSbpNController::class, 'publish']);
Route::post('/sbpn/search', [DokSbpNController::class, 'search']);

/**
 * API for LPTP-N
 */
Route::get('/lptpn/{lptpn_id}/pdf', [DokLptpNController::class, 'pdf']);

/**
 * API for LPHP-N
 */
Route::apiResource('lphpn', DokLphpNController::class);
Route::get('/lphpn/{lphpn_id}/display', [DokLphpNController::class, 'display']);
Route::get('/lphpn/{lphpn_id}/form', [DokLphpNController::class, 'form']);
Route::get('/lphpn/{lphpn_id}/docs', [DokLphpNController::class, 'docs']);
Route::get('/lphpn/{lphpn_id}/pdf', [DokLphpNController::class, 'pdf']);
Route::get('/lphpn/{lphpn_id}/objek', [DokLphpNController::class, 'objek']);
Route::put('/lphpn/{lphpn_id}/publish', [DokLphpNController::class, 'publish']);

/**
 * API for LP-N
 */
Route::apiResource('lpn', DokLpNController::class);
Route::get('/lpn/{lpn_id}/display', [DokLpNController::class, 'display']);
Route::get('/lpn/{lpn_id}/form', [DokLpNController::class, 'form']);
Route::get('/lpn/{lpn_id}/docs', [DokLpNController::class, 'docs']);
Route::get('/lpn/{lpn_id}/pdf', [DokLpNController::class, 'pdf']);
Route::get('/lpn/{lpn_id}/objek', [DokLpNController::class, 'objek']);
Route::put('/lpn/{lpn_id}/publish', [DokLpNController::class, 'publish']);
Route::post('/lpn/search', [DokLpNController::class, 'search']);

/*
 |--------------------------------------------------------------------------
 | Penyidikan routes
 |--------------------------------------------------------------------------
 */

/**
 * API for LPP
 */
Route::apiResource('lpp', DokLppController::class);
Route::get('/lpp/{lpp_id}/display', [DokLppController::class, 'display']);
Route::get('/lpp/{lpp_id}/form', [DokLppController::class, 'form']);
Route::get('/lpp/{lpp_id}/docs', [DokLppController::class, 'docs']);
Route::get('/lpp/{lpp_id}/pdf', [DokLppController::class, 'pdf']);
Route::get('/lpp/{lpp_id}/objek', [DokLppController::class, 'objek']);
Route::put('/lpp/{lpp_id}/publish', [DokLppController::class, 'publish']);

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
		Route::get('/{how?}', [DetailSarkutController::class, 'show']);
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
		Route::get('/{how?}', [DetailBangunanController::class, 'show']);
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
		Route::get('/{how?}', [DetailDokumenController::class, 'show']);
		Route::post('/{how?}', [DetailDokumenController::class, 'store']);
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
 * API for Negara
 */
Route::get('negara/{kode}', [RefNegaraController::class, 'show']);
Route::post('negara/search', [RefNegaraController::class, 'search']);

/**
 * API for User
 */
Route::apiResource('user', RefUserCacheController::class);
Route::get('/user/id/{id}', [RefUserCacheController::class, 'show']);
Route::post('/user/role', [RefUserCacheController::class, 'role']);
Route::post('/user/jabatan', [RefUserCacheController::class, 'jabatan']);
Route::post('/jabatan/list', [RefUserCacheController::class, 'listJabatan']);

/*
 |--------------------------------------------------------------------------
 | Tracking routes
 |--------------------------------------------------------------------------
 */
Route::post('/tracking/sbp', [TrackingSbpController::class, 'tracking']);
Route::get('/tracking/sbp/{id}/attachments', [TrackingSbpController::class, 'getAttachments']);
Route::post('/tracking/sbp/{id}/attach', [TrackingSbpController::class, 'addAttachment']);

Route::get('test', function() {
	# code...
})->middleware('permission');
