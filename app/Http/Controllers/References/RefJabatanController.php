<?php

namespace App\Http\Controllers\References;

use App\Http\Controllers\Controller;
use App\Http\Resources\References\RefJabatanResource;
use App\Models\References\RefJabatan;
use Illuminate\Http\Request;

class RefJabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_jabatan = RefJabatan::all();
		return RefJabatanResource::collection($all_jabatan);
    }
}
