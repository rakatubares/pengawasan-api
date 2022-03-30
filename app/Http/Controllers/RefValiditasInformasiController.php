<?php

namespace App\Http\Controllers;

use App\Http\Resources\RefValiditasInformasiResource;
use App\Models\RefValiditasInformasi;
use Illuminate\Http\Request;

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
