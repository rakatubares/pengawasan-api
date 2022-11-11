<?php

use App\Http\Controllers\DetailBadanController;
use App\Http\Controllers\DetailBangunanController;
use App\Http\Controllers\DetailBarangController;
use App\Http\Controllers\DetailBarangItemController;
use App\Http\Controllers\DetailDokumenController;
use App\Http\Controllers\DetailSarkutController;
use App\Http\Controllers\DokBastController;
use App\Http\Controllers\DokBukaPengamanController;
use App\Http\Controllers\DokContohController;
use App\Http\Controllers\DokLapController;
use App\Http\Controllers\DokLiController;
use App\Http\Controllers\DokPengamanController;
use App\Http\Controllers\PenindakanController;
use App\Http\Controllers\RefEntitasController;
use App\Http\Controllers\RefJabatanController;
use App\Http\Controllers\RefKategoriBarangController;
use App\Http\Controllers\RefKategoriPelanggaranController;
use App\Http\Controllers\RefKemasanController;
use App\Http\Controllers\RefLokasiController;
use App\Http\Controllers\RefNegaraController;
use App\Http\Controllers\RefSatuanController;
use App\Http\Controllers\RefSkemaPenindakanController;
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
 * API for BA Contoh
 */
Route::apiResource('contoh', DokContohController::class);
Route::get('/contoh/{contoh_id}/display', [DokContohController::class, 'display']);
Route::get('/contoh/{contoh_id}/objek', [DokContohController::class, 'objek']);
Route::put('/contoh/{contoh_id}/publish', [DokContohController::class, 'publish']);

/**
 * API for BA Tanda Pengaman
 */
Route::apiResource('pengaman', DokPengamanController::class);
Route::get('/pengaman/{pengaman_id}/basic', [DokPengamanController::class, 'basic']);
Route::get('/pengaman/{pengaman_id}/objek', [DokPengamanController::class, 'objek']);
Route::post('/pengaman/search', [DokPengamanController::class, 'search']);
Route::put('/pengaman/{pengaman_id}/publish', [DokPengamanController::class, 'publish']);

/**
 * API for BA Buka Tanda Pengaman
 */
Route::apiResource('bukapengaman', DokBukaPengamanController::class);
Route::get('/bukapengaman/{buka_pengaman_id}/basic', [DokBukaPengamanController::class, 'basic']);
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
 * API for LPHP
 */
Route::resource('lap', DokLapController::class);
Route::get('/lap/{lap_id}/display', [DokLapController::class, 'display']);
Route::get('/lap/{lap_id}/form', [DokLapController::class, 'form']);
Route::get('/lap/{lap_id}/objek', [DokLapController::class, 'objek']);
Route::put('/lap/{lap_id}/publish', [DokLapController::class, 'publish']);

/**
 * API for LI-1
 */
Route::apiResource('li', DokLiController::class);
Route::get('/li/{li_id}/display', [DokLiController::class, 'display']);
Route::get('/li/{li_id}/form', [DokLiController::class, 'form']);
Route::put('/li/{li_id}/publish', [DokLiController::class, 'publish']);
Route::post('/li/search', [DokLiController::class, 'search']);

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

Route::get('test', function() {
	# code...
})->middleware('permission');
