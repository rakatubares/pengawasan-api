<?php

namespace App\Http\Controllers;

use App\Http\Resources\RefLokasiResource;
use App\Models\RefLokasi;
use Illuminate\Http\Request;

class RefLokasiController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active_locations = RefLokasi::where(['active' => true])->orderByDesc('id')->get();
		$locations_list = RefLokasiResource::collection($active_locations);
		return $locations_list;
    }
}
