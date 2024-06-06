<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DocumentsChainController;
use App\Http\Controllers\DokController;
use App\Http\Controllers\Entitas\EntitasBadanHukumController;
use App\Http\Controllers\Entitas\EntitasOrangController;
use App\Http\Controllers\Intelijen\DokLkaiController;
use App\Http\Controllers\Intelijen\DokLkaiNController;
use App\Http\Controllers\Intelijen\DokLppiController;
use App\Http\Controllers\Intelijen\DokLppiNController;
use App\Http\Controllers\Intelijen\DokNhiController;
use App\Http\Controllers\Intelijen\DokNhiNController;
use App\Http\Controllers\Intelijen\DokNiController;
use App\Http\Controllers\Intelijen\DokNiNController;
use App\Http\Controllers\Penindakan\Detail\PenindakanBadanController;
use App\Http\Controllers\Penindakan\Detail\PenindakanBangunanController;
use App\Http\Controllers\Penindakan\Detail\PenindakanBarangController;
use App\Http\Controllers\Penindakan\Detail\PenindakanSarkutController;
use App\Http\Controllers\Penindakan\DokBukaPengamanController;
use App\Http\Controllers\Penindakan\DokBukaSegelController;
use App\Http\Controllers\Penindakan\DokLapController;
use App\Http\Controllers\Penindakan\DokLapNController;
use App\Http\Controllers\Penindakan\DokLiController;
use App\Http\Controllers\Penindakan\DokLpController;
use App\Http\Controllers\Penindakan\DokLphpController;
use App\Http\Controllers\Penindakan\DokLptpController;
use App\Http\Controllers\Penindakan\DokPengamanController;
use App\Http\Controllers\Penindakan\DokRiksaBadanController;
use App\Http\Controllers\Penindakan\DokRiksaController;
use App\Http\Controllers\Penindakan\DokSbpController;
use App\Http\Controllers\Penindakan\DokSegelController;
use App\Http\Controllers\Penindakan\DokTegahController;
use App\Http\Controllers\Penindakan\DokTolakSbp1Controller;
use App\Http\Controllers\Penindakan\DokTolakSbp2Controller;
use App\Http\Controllers\Penindakan\PenindakanController;
use App\Http\Controllers\References\RefBandaraController;
use App\Http\Controllers\References\RefJabatanController;
use App\Http\Controllers\References\RefKantorBCController;
use App\Http\Controllers\References\RefKategoriBarangController;
use App\Http\Controllers\References\RefKategoriPelanggaranController;
use App\Http\Controllers\References\RefKemasanController;
use App\Http\Controllers\References\RefKepercayaanSumberController;
use App\Http\Controllers\References\RefLokasiController;
use App\Http\Controllers\References\RefNegaraController;
use App\Http\Controllers\References\RefSatuanController;
use App\Http\Controllers\References\RefSkemaPenindakanController;
use App\Http\Controllers\References\RefValiditasInformasiController;
use App\Http\Controllers\RefUserCacheController;
use App\Http\Controllers\SprintController;
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
 | Documents routes
 |--------------------------------------------------------------------------
 */

Route::group(['prefix' => 'doc', 'middleware' => ['auth.user']], function() {
	Route::docResources([
		// Intelijen
		'lppi' => DokLppiController::class,
		'lkai' => DokLkaiController::class,
		'nhi' => DokNhiController::class,
		'ni' => DokNiController::class,

		'lppin' => DokLppiNController::class,
		'lkain' => DokLkaiNController::class,
		'nhin' => DokNhiNController::class,
		'nin' => DokNiNController::class,

		// Penindakan
		'li' => DokLiController::class,
		'lap' => DokLapController::class,
		'riksa_badan' => DokRiksaBadanController::class,
		'riksa' => DokRiksaController::class,
		'tegah' => DokTegahController::class,
		'segel' => DokSegelController::class,
		'buka_segel' => DokBukaSegelController::class,
		'sbp' => DokSbpController::class,
		'tolak1' => DokTolakSbp1Controller::class,
		'tolak2' => DokTolakSbp2Controller::class,
		'lptp' => DokLptpController::class,
		'lphp' => DokLphpController::class,
		'lp' => DokLpController::class,

		'lapn' => DokLapNController::class,

		'pengaman' => DokPengamanController::class,
		'buka_pengaman' => DokBukaPengamanController::class,
	]);	

	Route::post('/{doc_type}/search', [DokController::class, 'search']);
	Route::get('/{doc_type}/{doc_id}/chain', [DocumentsChainController::class, 'show']);
});

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
 * API for detail penindakan
 */
Route::prefix('/penindakan/{id}')->group(function () {
	Route::get('/sarkut', [PenindakanSarkutController::class, 'show']);
	Route::post('/sarkut', [PenindakanSarkutController::class, 'store']);
	Route::put('/sarkut', [PenindakanSarkutController::class, 'update']);

	Route::get('/bangunan', [PenindakanBangunanController::class, 'show']);
	Route::post('/bangunan', [PenindakanBangunanController::class, 'store']);
	Route::put('/bangunan', [PenindakanBangunanController::class, 'update']);

	Route::get('/badan', [PenindakanBadanController::class, 'show']);
	Route::post('/badan', [PenindakanBadanController::class, 'store']);
	Route::put('/badan', [PenindakanBadanController::class, 'update']);

	Route::get('/barang', [PenindakanBarangController::class, 'show']);
	Route::post('/barang', [PenindakanBarangController::class, 'store']);
	Route::put('/barang', [PenindakanBarangController::class, 'update']);

	Route::post('/tindakan', [PenindakanController::class, 'tindakan']);
});

/*
 |--------------------------------------------------------------------------
 | Reference routes
 |--------------------------------------------------------------------------
 */

/**
 * API for SPRINT
 */
Route::apiResource('sprint', SprintController::class);
Route::post('/sprint/search', [SprintController::class, 'search']);

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

// /**
//  * API for Kategori Pelanggaran
//  */
// Route::apiResource('pelanggaran', RefKategoriPelanggaranController::class);

// /**
//  * API for Skema Penindakan
//  */
// Route::apiResource('penindakan', RefSkemaPenindakanController::class);

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
Route::get('kemasan', [RefKemasanController::class, 'index']);
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
 * API for Kategori Pelanggaran
 */
Route::get('pelanggaran', [RefKategoriPelanggaranController::class, 'index']);

/**
 * API for Skema Penindakan
 */
Route::get('skema_penindakan', [RefSkemaPenindakanController::class, 'index']);

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
