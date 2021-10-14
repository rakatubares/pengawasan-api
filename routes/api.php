<?php

use App\Http\Controllers\SbpBarangDetailController;
use App\Http\Controllers\SbpHeaderController;
use App\Http\Controllers\SbpPenindakanBadanController;
use App\Http\Controllers\SbpPenindakanBangunanController;
use App\Http\Controllers\SbpPenindakanBarangController;
use App\Http\Controllers\SbpPenindakanSarkutController;
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
 * API for SBP
 */

// SBP header
Route::apiResource('sbp', SbpHeaderController::class);
Route::prefix('sbp/{sbp_id}')->group(function() {

	Route::get('/details', [SbpHeaderController::class, 'showDetails']);
	Route::put('/publish', [SbpHeaderController::class, 'publish']);

	// SBP penindakan sarkut
	Route::prefix('sarkut')->group(function() {
		Route::get('/', [SbpPenindakanSarkutController::class, 'show']);
		Route::post('/', [SbpPenindakanSarkutController::class, 'store']);
		Route::delete('/', [SbpPenindakanSarkutController::class, 'destroy']);
	});

	// SBP penindakan barang
	Route::prefix('barang')->group(function() {
		Route::get('/', [SbpPenindakanBarangController::class, 'show']);
		Route::post('/', [SbpPenindakanBarangController::class, 'store']);
		Route::delete('/', [SbpPenindakanBarangController::class, 'destroy']);

		// Detail barang
		Route::prefix('detail')->group(function() {
			Route::get('/', [SbpBarangDetailController::class, 'index']);
			Route::post('/', [SbpBarangDetailController::class, 'store']);
			Route::get('/{detail_id}', [SbpBarangDetailController::class, 'show']);
			Route::put('/{detail_id}', [SbpBarangDetailController::class, 'update']);
			Route::delete('/{detail_id}', [SbpBarangDetailController::class, 'destroy']);
		});
	});

	// SBP penindakan bangunan
	Route::prefix('bangunan')->group(function() {
		Route::get('/', [SbpPenindakanBangunanController::class, 'show']);
		Route::post('/', [SbpPenindakanBangunanController::class, 'store']);
		Route::delete('/', [SbpPenindakanBangunanController::class, 'destroy']);
	});

	// SBP penindakan badan
	Route::prefix('badan')->group(function() {
		Route::get('/', [SbpPenindakanBadanController::class, 'show']);
		Route::post('/', [SbpPenindakanBadanController::class, 'store']);
		Route::delete('/', [SbpPenindakanBadanController::class, 'destroy']);
	});
 
});