<?php

use App\Http\Controllers\DetailBadanController;
use App\Http\Controllers\DetailBangunanController;
use App\Http\Controllers\DetailBarangController;
use App\Http\Controllers\DetailBarangItemController;
use App\Http\Controllers\DetailDokumenController;
use App\Http\Controllers\DetailSarkutController;
use App\Http\Controllers\PenindakanController;
use App\Http\Controllers\RefEntitasController;
use App\Http\Controllers\RefJabatanController;
use App\Http\Controllers\RefSprintController;
use App\Http\Controllers\RefUserCacheController;
use App\Http\Controllers\SbpController;
use App\Http\Controllers\SegelController;
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

/**
 * API for penindakan
 */
Route::get('/penindakan/{id}', [PenindakanController::class, 'show']);

/**
 * API for SBP
 */
Route::apiResource('sbp', SbpController::class);
// Route::get('/sbp/{sbp_id}/complete', [SbpController::class, 'showComplete']);
Route::get('/sbp/{sbp_id}/objek', [SbpController::class, 'objek']);
Route::post('/sbp/{sbp_id}/storelinked', [SbpController::class, 'storeLinkedDoc']);
Route::put('/sbp/{sbp_id}/publish', [SbpController::class, 'publish']);

/**
 * API for BA Segel
 */
Route::apiResource('segel', SegelController::class);
Route::put('/segel/{segel_id}/publish', [SegelController::class, 'publish']);

/**
 * API for BA Buka Segel
 */
// Route::apiResource('bukasegel', BukaSegelController::class);
// Route::get('/bukasegel/{buka_segel_id}/complete', [BukaSegelController::class, 'showComplete']);
// Route::get('/bukasegel/{buka_segel_id}/details', [BukaSegelController::class, 'showDetails']);
// Route::put('/bukasegel/{buka_segel_id}/publish', [BukaSegelController::class, 'publish']);

/** 
 * API for BA Titip
 */
// Route::apiResource('titip', TitipController::class);
// Route::get('/titip/{titip_id}/complete', [TitipController::class, 'showComplete']);
// Route::get('/titip/{titip_id}/details', [TitipController::class, 'showDetails']);
// Route::put('/titip/{titip_id}/publish', [TitipController::class, 'publish']);

/** 
 * API for BA Tegah
 */
// Route::apiResource('tegah', TegahController::class);
// Route::get('/tegah/{tegah_id}/complete', [TegahController::class, 'showComplete']);
// Route::get('/tegah/{tegah_id}/details', [TegahController::class, 'showDetails']);
// Route::put('/tegah/{tegah_id}/publish', [TegahController::class, 'publish']);

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
