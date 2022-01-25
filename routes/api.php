<?php

use App\Http\Controllers\DetailBadanController;
use App\Http\Controllers\DetailBangunanController;
use App\Http\Controllers\DetailBarangController;
use App\Http\Controllers\DetailBarangItemController;
use App\Http\Controllers\DetailDokumenController;
use App\Http\Controllers\DetailSarkutController;
use App\Http\Controllers\DokBukaPengamanController;
use App\Http\Controllers\DokLpController;
use App\Http\Controllers\DokLphpController;
use App\Http\Controllers\DokPengamanController;
use App\Http\Controllers\DokBastController;
use App\Http\Controllers\DokBukaSegelController;
use App\Http\Controllers\DokContohController;
use App\Http\Controllers\DokSegelController;
use App\Http\Controllers\DokTitipController;
use App\Http\Controllers\PenindakanController;
use App\Http\Controllers\RefEntitasController;
use App\Http\Controllers\RefJabatanController;
use App\Http\Controllers\RefSprintController;
use App\Http\Controllers\RefUserCacheController;
use App\Http\Controllers\RiksaController;
use App\Http\Controllers\SbpController;
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
 * API for BA Contoh
 */
Route::apiResource('sbp', SbpController::class);
Route::get('/sbp/{sbp_id}/basic', [SbpController::class, 'basic']);
Route::get('/sbp/{sbp_id}/objek', [SbpController::class, 'objek']);
Route::get('/sbp/{sbp_id}/linked', [SbpController::class, 'linked']);
Route::post('/sbp/{sbp_id}/storelinked', [SbpController::class, 'storeLinkedDoc']);
Route::post('/sbp/search', [SbpController::class, 'search']);
Route::put('/sbp/{sbp_id}/publish', [SbpController::class, 'publish']);

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
Route::apiResource('riksa', RiksaController::class);
Route::get('/riksa/{riksa_id}/basic', [RiksaController::class, 'basic']);
Route::get('/riksa/{riksa_id}/objek', [RiksaController::class, 'objek']);
Route::put('/riksa/{riksa_id}/publish', [RiksaController::class, 'publish']);

/**
 * API for BA Segel
 */
Route::apiResource('segel', DokSegelController::class);
Route::post('/segel/search', [DokSegelController::class, 'search']);
Route::get('/segel/{segel_id}/basic', [DokSegelController::class, 'basic']);
Route::get('/segel/{segel_id}/objek', [DokSegelController::class, 'objek']);
Route::put('/segel/{segel_id}/publish', [DokSegelController::class, 'publish']);

/**
 * API for BA Buka Segel
 */
Route::apiResource('bukasegel', DokBukaSegelController::class);
Route::get('/bukasegel/{buka_segel_id}/basic', [DokBukaSegelController::class, 'basic']);
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
 * API for BA COntoh Barang
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
Route::get('/bast/{bast_id}/basic', [DokBastController::class, 'basic']);
Route::get('/bast/{bast_id}/objek', [DokBastController::class, 'objek']);
Route::put('/bast/{bast_id}/publish', [DokBastController::class, 'publish']);

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
