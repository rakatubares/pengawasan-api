<?php

use App\Http\Controllers\DetailBadanController;
use App\Http\Controllers\DetailBangunanController;
use App\Http\Controllers\DetailBarangController;
use App\Http\Controllers\DetailBarangItemController;
use App\Http\Controllers\DetailDokumenController;
use App\Http\Controllers\DetailSarkutController;
use App\Http\Controllers\DokLkaiController;
use App\Http\Controllers\DokLkaiNController;
use App\Http\Controllers\DokLppiController;
use App\Http\Controllers\DokLppiNController;
use App\Http\Controllers\DokNhiController;
use App\Http\Controllers\DokNhiNController;
use App\Http\Controllers\PenindakanController;
use App\Http\Controllers\RefBandaraController;
use App\Http\Controllers\RefEntitasController;
use App\Http\Controllers\RefJabatanController;
use App\Http\Controllers\RefKantorBCController;
use App\Http\Controllers\RefKategoriBarangController;
use App\Http\Controllers\RefKemasanController;
use App\Http\Controllers\RefKepercayaanSumberController;
use App\Http\Controllers\RefLokasiController;
use App\Http\Controllers\RefNegaraController;
use App\Http\Controllers\RefSatuanController;
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
 * API for Kantor BC
 */
Route::get('kantor/kode/{kd_kantor}', [RefKantorBCController::class, 'getDataByCode']);
Route::post('kantor/search', [RefKantorBCController::class, 'search']);

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
 * API for Kategori Barang
 */
Route::get('negara/{kode}', [RefNegaraController::class, 'show']);
Route::post('negara/search', [RefNegaraController::class, 'search']);

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
