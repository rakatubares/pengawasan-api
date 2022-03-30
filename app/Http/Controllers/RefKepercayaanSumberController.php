<?php

namespace App\Http\Controllers;

use App\Http\Resources\RefKepercayaanSumberResource;
use App\Models\RefKepercayaanSumber;
use Illuminate\Http\Request;

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
		$list_klasifikasi = RefKepercayaanSumberResource::collection($klasifikasi);
		return $list_klasifikasi;
	}
}
