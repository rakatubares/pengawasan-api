<?php

use App\Http\Controllers\BukaSegelController;
use App\Http\Controllers\DetailBadanController;
use App\Http\Controllers\DetailBangunanController;
use App\Http\Controllers\DetailBarangController;
use App\Http\Controllers\DetailBarangItemController;
use App\Http\Controllers\DetailSarkutController;
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
 * API for SBP
 */
Route::apiResource('sbp', SbpController::class);
Route::get('/sbp/{sbp_id}/details', [SbpController::class, 'showDetails']);
Route::put('/sbp/{sbp_id}/publish', [SbpController::class, 'publish']);

/**
 * API for BA Segel
 */
Route::apiResource('segel', SegelController::class);
Route::get('/segel/{segel_id}/details', [SegelController::class, 'showDetails']);
Route::put('/segel/{segel_id}/publish', [SegelController::class, 'publish']);

/**
 * API for BA Buka Segel
 */
Route::apiResource('bukasegel', BukaSegelController::class);
Route::get('/bukasegel/{buka_segel_id}/details', [BukaSegelController::class, 'showDetails']);
Route::put('/bukasegel/{buka_segel_id}/publish', [BukaSegelController::class, 'publish']);

/**
 * API for Details
 */
Route::prefix('{doc_type}/{doc_id}')->group(function() {
	// Sarkut
	Route::prefix('/sarkut')->group(function() {
		Route::get('/', [DetailSarkutController::class, 'show']);
		Route::post('/', [DetailSarkutController::class, 'store']);
		Route::delete('/', [DetailSarkutController::class, 'destroy']);
	});

	// Barang
	Route::prefix('/barang')->group(function() {
		Route::get('/', [DetailBarangController::class, 'show']);
		Route::post('/', [DetailBarangController::class, 'store']);
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
		Route::delete('/', [DetailBangunanController::class, 'destroy']);
	});

	// Badan
	Route::prefix('/badan')->group(function() {
		Route::get('/', [DetailBadanController::class, 'show']);
		Route::post('/', [DetailBadanController::class, 'store']);
		Route::delete('/', [DetailBadanController::class, 'destroy']);
	});
});
