<?php

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

Route::get('test', function() {
	# code...
})->middleware('permission');