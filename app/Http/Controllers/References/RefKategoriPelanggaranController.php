<?php

namespace App\Http\Controllers\References;

use App\Http\Controllers\Controller;
use App\Http\Resources\References\RefKategoriPelanggaranResource;
use App\Models\References\RefKategoriPelanggaran;

class RefKategoriPelanggaranController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$kategori = RefKategoriPelanggaran::orderBy('id')->get();
		return RefKategoriPelanggaranResource::collection($kategori);
	}
}
