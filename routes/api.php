<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DetailBadanController;
use App\Http\Controllers\DetailBangunanController;
use App\Http\Controllers\DetailDokumenController;
use App\Http\Controllers\DetailSarkutController;
use App\Http\Controllers\DocumentsChainController;
use App\Http\Controllers\DokController;
use App\Http\Controllers\Entitas\EntitasBadanHukumController;
use App\Http\Controllers\Entitas\EntitasOrangController;
use App\Http\Controllers\References\RefBandaraController;
use App\Http\Controllers\References\RefJabatanController;
use App\Http\Controllers\References\RefKantorBCController;
use App\Http\Controllers\References\RefKategoriBarangController;
use App\Http\Controllers\References\RefKemasanController;
use App\Http\Controllers\References\RefKepercayaanSumberController;
use App\Http\Controllers\References\RefLokasiController;
use App\Http\Controllers\References\RefNegaraController;
use App\Http\Controllers\References\RefSatuanController;
use App\Http\Controllers\References\RefValiditasInformasiController;
use App\Http\Controllers\RefSprintController;
use App\Http\Controllers\RefUserCacheController;
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
 | Documents chain routes
 |--------------------------------------------------------------------------
 */

Route::get('/chain/{doc_type}/id/{doc_id}', [DocumentsChainController::class, 'show']);
Route::post('/doc/{doc_type}/search', [DokController::class, 'search']);

/*
 |--------------------------------------------------------------------------
 | Details routes
 |--------------------------------------------------------------------------
 */

/**
 * API for detail barang
 */
Route::prefix('/barang/{doc_type}/{doc_id}')->group(function () {
	Route::apiResource('/item', BarangController::class);
});

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

	// Bangunan
	Route::prefix('/bangunan')->group(function() {
		Route::get('/{how?}', [DetailBangunanController::class, 'show']);
		Route::post('/', [DetailBangunanController::class, 'store']);
		Route::put('/{bangunan_id}', [DetailBangunanController::class, 'update']);
		Route::delete('/', [DetailBangunanController::class, 'destroy']);
	});

	// Badan
	Route::prefix('/orang')->group(function() {
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
 * API for Personal Entity
 */
Route::apiResource('entitas/orang', EntitasOrangController::class);
Route::post('/entitas/orang/search', [EntitasOrangController::class, 'search']);

/**
 * API for Company Entity
 */
Route::apiResource('entitas/badanhukum', EntitasBadanHukumController::class);
Route::post('/entitas/badanhukum/search', [EntitasBadanHukumController::class, 'search']);

/**
 * API for Jabatan
 */
Route::apiResource('jabatan', RefJabatanController::class);

/**
 * API for Grup Lokasi
 */
Route::post('lokasi/search', [RefLokasiController::class, 'search']);

/**
 * API for Kantor BC
 */
Route::get('kantor/kode/{kode_kantor}', [RefKantorBCController::class, 'getDataByCode']);
Route::post('kantor/search', [RefKantorBCController::class, 'search']);

/**
 * API for Kemasan
 */
Route::get('kemasan/{id}', [RefKemasanController::class, 'show']);
Route::post('kemasan/search', [RefKemasanController::class, 'search']);

/**
 * API for Satuan
 */
Route::get('satuan', [RefSatuanController::class, 'index']);
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
Route::post('/user/nip', [RefUserCacheController::class, 'nip']);
Route::post('/user/search', [RefUserCacheController::class, 'search']);
Route::post('/user/role', [RefUserCacheController::class, 'role']);
Route::post('/user/jabatan', [RefUserCacheController::class, 'jabatan']);
Route::post('/jabatan/list', [RefUserCacheController::class, 'listJabatan']);

Route::get('test', function() {
	# code...
})->middleware('permission');
