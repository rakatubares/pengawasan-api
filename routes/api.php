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
use App\Http\Controllers\DokSbpController;
use App\Http\Controllers\DokSbpNController;
use App\Http\Controllers\DokTolakSbp1Controller;
use App\Http\Controllers\DokTolakSbp2Controller;
use App\Http\Controllers\MonTarikSbpController;
use App\Http\Controllers\PenindakanController;
use App\Http\Controllers\RefEntitasController;
use App\Http\Controllers\RefJabatanController;
use App\Http\Controllers\RefKategoriBarangController;
use App\Http\Controllers\RefKemasanController;
use App\Http\Controllers\RefLokasiController;
use App\Http\Controllers\RefSatuanController;
use App\Http\Controllers\RefSprintController;
use App\Http\Controllers\RefUserCacheController;
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
 * API for penindakan
 */
Route::get('/penindakan/{id}', [PenindakanController::class, 'show']);
/*
 |--------------------------------------------------------------------------
 | Details routes
 |--------------------------------------------------------------------------
 */

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
