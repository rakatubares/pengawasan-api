<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokLiResource;
use App\Http\Resources\DokLiTableResource;
use App\Models\DokLi;
use App\Traits\DokumenTrait;
use App\Traits\SwitcherTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokLiController extends Controller
{
	use DokumenTrait;
	use SwitcherTrait;


	public function __construct()
	{
		$this->doc_type = 'li';
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
		$all_li = DokLi::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$li_list = DokLiTableResource::collection($all_li);
		return $li_list;
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\DokLi  $dokLi
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$li = new DokLiResource(DokLi::findOrFail($id));
		return $li;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function display($id)
	{
		$li = new DokLiResource(DokLi::findOrFail($id), 'display');
		return $li;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function form($id)
	{
		$li = new DokLiResource(DokLi::findOrFail($id), 'form');
		return $li;
	}

	/*
	 |--------------------------------------------------------------------------
	 | Data modify functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Validate request
	 */
	private function validateData(Request $request)
	{
		$request->validate([
			'sumber' => 'required',
			'informasi' => 'required',
			'penerbit.jabatan.kode' => 'required',
			'penerbit.plh' => 'required|boolean',
			'penerbit.user.user_id' => 'required|integer',
			'atasan.jabatan.kode' => 'required',
			'atasan.plh' => 'required|boolean',
			'atasan.user.user_id' => 'required|integer',
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
		$no_dok_lengkap = $this->tipe_surat . '-     ' . $this->agenda_dok;

		$data_li = [
			'sumber' => $request->sumber,
			'informasi' => $request->informasi,
			'tindak_lanjut' => $request->tindak_lanjut,
			'catatan' => $request->catatan,
			'kode_jabatan_penerbit' => $request->penerbit['jabatan']['kode'],
			'plh_penerbit' => $request->penerbit['plh'],
			'penerbit_id' => $request->penerbit['user']['user_id'],
			'kode_jabatan_atasan' => $request->atasan['jabatan']['kode'],
			'plh_atasan' => $request->atasan['plh'],
			'atasan_id' => $request->atasan['user']['user_id'],
		];

		if ($state == 'insert') {
			$data_li['agenda_dok'] = $this->agenda_dok;
			$data_li['no_dok_lengkap'] = $no_dok_lengkap;
			$data_li['kode_status'] = 100;
		};

		return $data_li;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		// Validate data
		$this->validateData($request);

		DB::beginTransaction();
		try {
			// Save data
			$data_li = $this->prepareData($request, 'insert');
			$li = DokLi::create($data_li);

			// Commit store query
			DB::commit();

			// Return data
			$li_resource = new DokLiResource(DokLi::findOrFail($li->id), 'form');
			return $li_resource;
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $int
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		// Check if document is not published yet
		$is_unpublished = $this->checkUnpublished(DokLi::class, $id);

		// Update if not published
		if ($is_unpublished) {
			DB::beginTransaction();

			try {
				// Validate data
				$this->validateData($request);

				// Update data
				$data_li = $this->prepareData($request, 'update');
				DokLi::where('id', $id)->update($data_li);

				// Commit store query
				DB::commit();

				// Return updated data
				$li_resource = new DokLiResource(DokLi::findOrFail($id), 'form');
				$result = $li_resource;
			} catch (\Throwable $th) {
				DB::rollBack();
				throw $th;
			}
		} else {
			$result = response()->json(['error' => 'Dokumen sudah diterbitkan, tidak dapat mengupdate dokumen.'], 422);
		}
		
		return $result;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function publish($id)
	{
		DB::beginTransaction();
		try {
			$this->getDocument(DokLi::class, $id);
			$this->getCurrentDate();
			$number = $this->getNewDocNumber(DokLi::class);
			$this->updateDocNumberAndYear($number, $this->tipe_surat, true);
			
			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}

	/*
	 |--------------------------------------------------------------------------
	 | Destroy function
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		DB::beginTransaction();
		try {
			$is_unpublished = $this->checkUnpublished(DokLi::class, $id);
			if ($is_unpublished) {
				DokLi::find($id)->delete();
			}

			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}
}
