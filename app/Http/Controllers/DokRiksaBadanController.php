<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokRiksaBadanResource;
use App\Http\Resources\DokRiksaBadanTableResource;
use App\Models\DokRiksaBadan;
use App\Traits\DokumenTrait;
use App\Traits\SwitcherTrait;
use Illuminate\Http\Request;

class DokRiksaBadanController extends Controller
{
	use DokumenTrait;
	use SwitcherTrait;

	public function __construct()
	{
		$this->doc_type = 'riksabadan';
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
		$all_riksa = DokRiksaBadan::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$riksa_list = DokRiksaBadanTableResource::collection($all_riksa);
		return $riksa_list;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$riksa = new DokRiksaBadanResource(DokRiksaBadan::findOrFail($id));
		return $riksa;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function display($id)
	{
		$riksa = new DokRiksaBadanResource(DokRiksaBadan::findOrFail($id), 'display');
		return $riksa;
	}
}
