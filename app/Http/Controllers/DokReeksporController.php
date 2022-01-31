<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokReeksporResource;
use App\Http\Resources\DokReeksporTableResource;
use App\Models\DokReekspor;
use App\Traits\DokumenTrait;
use Illuminate\Http\Request;

class DokReeksporController extends Controller
{
	use DokumenTrait;

	public function __construct()
	{
		$this->doc_type = 'reekspor';
		$this->tipe_surat = $this->switchObject($this->doc_type, 'tipe_dok');
		$this->agenda_dok = $this->switchObject($this->doc_type, 'agenda');
	}

	/*
	 |--------------------------------------------------------------------------
	 | DISPLAY functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$all_reekspor = DokReekspor::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$reekspor_list = DokReeksporTableResource::collection($all_reekspor);
		return $reekspor_list;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$reekspor = new DokReeksporResource(DokReekspor::findOrFail($id));
		return $reekspor;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function display($id)
	{
		$contoh = new DokReeksporResource(DokReekspor::findOrFail($id), 'display');
		return $contoh;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
