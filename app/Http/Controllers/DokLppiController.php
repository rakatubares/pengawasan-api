<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokLppiResource;
use App\Http\Resources\DokLppiTableResource;
use App\Models\DokLppi;
use App\Models\Intelijen;
use App\Models\ObjectRelation;
use App\Traits\DokumenTrait;
use App\Traits\SwitcherTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokLppiController extends Controller
{
	use DokumenTrait;
	use SwitcherTrait;

	public function __construct()
	{
		$this->doc_type = 'lppi';
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
		$all_lppi = DokLppi::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$lppi_list = DokLppiTableResource::collection($all_lppi);
		return $lppi_list;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$lppi = new DokLppiResource(DokLppi::findOrFail($id));
		return $lppi;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function display($id)
	{
		$lppi = new DokLppiResource(DokLppi::findOrFail($id), 'display');
		return $lppi;
	}

	/*
	 |--------------------------------------------------------------------------
	 | Data modify functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Validate request
	 * 
	 * @param  \Illuminate\Http\Request  $request
	 */
	private function validateData(Request $request)
	{
		$request->validate([
			'flag_info_internal' => 'boolean',
			'tgl_terima_info_internal' => 'nullable|date',
			'tgl_dok_info_internal' => 'nullable|date',
			'flag_info_eksternal' => 'boolean',
			'tgl_terima_info_eksternal' => 'nullable|date',
			'tgl_dok_info_eksternal' => 'nullable|date',
			'flag_analisis' => 'nullable|boolean',
			'flag_arsip' => 'nullable|boolean',
			'penerima_info_id' => 'nullable|integer',
			'penilai_info_id' => 'nullable|integer',
			'disposisi_id' => 'nullable|integer',
			'tanggal_disposisi' => 'nullable|date',
			'pejabat.user.user_id' => 'nullable|integer',
			'ikhtisar' => 'required|array|min:1'
		]);
	}

	/**
	 * Prepare data from request to array
	 * 
	 * @param Request $request
	 * @param String $state
	 * @return Array
	 */
	private function prepareData(Request $request, $state='insert')
	{
		$no_dok_lengkap = $this->tipe_surat . '-' . '      ' . $this->agenda_dok;
		$tgl_terima_info_internal = date('Y-m-d', strtotime($request->tgl_terima_info_internal));
		$tgl_dok_info_internal = date('Y-m-d', strtotime($request->tgl_dok_info_internal));
		$tgl_terima_info_eksternal = date('Y-m-d', strtotime($request->tgl_terima_info_eksternal));
		$tgl_dok_info_eksternal = date('Y-m-d', strtotime($request->tgl_dok_info_eksternal));
		$tanggal_disposisi = date('Y-m-d', strtotime($request->tanggal_disposisi));

		$data_lppi = [
			'flag_info_internal' => $request->flag_info_internal,
			'media_info_internal' => $request->media_info_internal,
			'tgl_terima_info_internal' => $tgl_terima_info_internal,
			'no_dok_info_internal' => $request->no_dok_info_internal,
			'tgl_dok_info_internal' => $tgl_dok_info_internal,
			'flag_info_eksternal' => $request->flag_info_eksternal,
			'media_info_eksternal' => $request->media_info_eksternal,
			'tgl_terima_info_eksternal' => $tgl_terima_info_eksternal,
			'no_dok_info_eksternal' => $request->no_dok_info_eksternal,
			'tgl_dok_info_eksternal' => $tgl_dok_info_eksternal,
			'penerima_info_id' => $request->penerima_info_id,
			'penilai_info_id' => $request->penilai_info_id,
			'kesimpulan' => $request->kesimpulan,
			'disposisi_id' => $request->disposisi_id,
			'tanggal_disposisi' => $tanggal_disposisi,
			'flag_analisis' => $request->flag_analisis,
			'flag_arsip' => $request->flag_arsip,
			'catatan' => $request->catatan,
			'kode_jabatan' => $request->pejabat['jabatan']['kode'],
			'plh' => $request->pejabat['plh'],
			'pejabat_id' => $request->pejabat['user']['user_id'],
		];

		if ($state == 'insert') {
			$data_lppi['agenda_dok'] = $this->agenda_dok;
			$data_lppi['no_dok_lengkap'] = $no_dok_lengkap;
			$data_lppi['kode_status'] = 100;
		}

		return $data_lppi;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		// Validate data LPPI
		$this->validateData($request);

		DB::beginTransaction();
		try {
			// Save data LPPI
			$data_lppi = $this->prepareData($request, 'insert');
			$lppi = DokLppi::create($data_lppi);

			// Save intelijen
			$intelijen = Intelijen::create();
			ObjectRelation::create([
				'object1_type' => 'intelijen',
				'object1_id' => $intelijen->id,
				'object2_type' => 'lppi',
				'object2_id' => $lppi->id,
			]);

			// Save data ikhtisar
			$intelijen->ikhtisar()->createMany($request->ikhtisar);

			// Commit store query
			DB::commit();

			// Return created data
			$lppi_resource = new DokLppiResource(DokLppi::findOrFail($lppi->id), 'display');
			return $lppi_resource;
			// return $lppi;
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
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
