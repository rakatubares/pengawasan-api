<?php

namespace App\Http\Controllers\References;

use App\Http\Controllers\Controller;
use App\Http\Resources\References\RefKepercayaanSumberResource;
use App\Models\References\RefKepercayaanSumber;

class RefKepercayaanSumberController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$klasifikasi = RefKepercayaanSumber::orderBy('klasifikasi')->get();
		return RefKepercayaanSumberResource::collection($klasifikasi);
	}
}
