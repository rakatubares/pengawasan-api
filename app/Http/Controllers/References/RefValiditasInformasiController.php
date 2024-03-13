<?php

namespace App\Http\Controllers\References;

// use App\Http\Resources\RefValiditasInformasiResource;

use App\Http\Controllers\Controller;
use App\Http\Resources\References\RefValiditasInformasiResource;
use App\Models\References\RefValiditasInformasi;

class RefValiditasInformasiController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$klasifikasi = RefValiditasInformasi::orderBy('klasifikasi')->get();
		$list_klasifikasi = RefValiditasInformasiResource::collection($klasifikasi);
		return $list_klasifikasi;
	}
}
