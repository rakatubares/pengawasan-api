<?php

namespace App\Http\Controllers\References;

use App\Http\Controllers\Controller;
use App\Http\Resources\References\RefSkemaPenindakanResource;
use App\Models\References\RefSkemaPenindakan;

// use App\Http\Resources\RefSkemaPenindakanResource;
// use App\Models\RefSkemaPenindakan;
// use Illuminate\Http\Request;

class RefSkemaPenindakanController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$skema = RefSkemaPenindakan::orderBy('id')->get();
		$list_skema = RefSkemaPenindakanResource::collection($skema);
		return $list_skema;
	}
}
