<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokLppiResource;
use App\Http\Resources\DokLppiTableResource;
use App\Models\DokLppi;
use App\Models\Intelijen;
use App\Models\ObjectRelation;
use App\Traits\ConverterTrait;
use App\Traits\DokumenTrait;
use App\Traits\SwitcherTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokLppiController extends Controller
{
	use ConverterTrait;
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

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function form($id)
	{
		$lppi = new DokLppiResource(DokLppi::findOrFail($id), 'form');
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
			'disposisi.user_id' => 'nullable|integer',
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
		$tgl_terima_info_internal = $this->dateFromText($request->tgl_terima_info_internal);
		$tgl_dok_info_internal = $this->dateFromText($request->tgl_dok_info_internal);
		$tgl_terima_info_eksternal = $this->dateFromText($request->tgl_terima_info_eksternal);
		$tgl_dok_info_eksternal = $this->dateFromText($request->tgl_dok_info_eksternal);
		$tanggal_disposisi = $this->dateFromText($request->tanggal_disposisi);

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
			'penerima_info_id' => $request->penerima_info['user_id'],
			'penilai_info_id' => $request->penilai_info['user_id'],
			'kesimpulan' => $request->kesimpulan,
			'disposisi_id' => $request->disposisi['user_id'],
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
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		// Check if document is not published yet
		$is_unpublished = $this->checkUnpublished(DokLppi::class, $id);

		if ($is_unpublished) {
			DB::beginTransaction();

			try {
				// Validate data
				$this->validateData($request);
	
				// Update data
				$data_lppi = $this->prepareData($request, 'update');
				DokLppi::where('id', $id)->update($data_lppi);

				// Get existing ikhtisar
				$intelijen = DokLppi::find($id)->intelijen;
				$existing_ikhtisar = $intelijen->ikhtisar->toArray();
				$existing_ikhtisar_ids = array_map(function($ikhtisar)
				{
					return $ikhtisar['id'];
				}, $existing_ikhtisar);

				// Map data ikhtisar
				$update_ids = [];
				foreach ($request->ikhtisar as $ikhtisar) {
					// Delete index key
					unset($ikhtisar['index']);

					// Insert intelijen id
					$ikhtisar['intelijen_id'] = $intelijen->id;

					// Map array to insert/update data
					if (isset($ikhtisar['id'])) {
						$intelijen->ikhtisar()->find($ikhtisar['id'])->update($ikhtisar);
						array_push($update_ids, $ikhtisar['id']);
					} else {
						$intelijen->ikhtisar()->create($ikhtisar);
					}
				}
				
				// Delete ikhtisar
				foreach ($existing_ikhtisar_ids as $ikhtisar_id) {
					if (!in_array($ikhtisar_id, $update_ids)) {
						$intelijen->ikhtisar()->find($ikhtisar_id)->delete();
					}
				}
	
				// Commit query
				DB::commit();
	
				// Return data
				$lppi_resource = new DokLppiResource(DokLppi::findOrFail($id), 'display');
				return $lppi_resource;
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
	 * Pablish document.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function publish($id)
	{
		DB::beginTransaction();
		try {
			$this->getDocument(DokLppi::class, $id);
			$this->getCurrentDate();
			$number = $this->getNewDocNumber(DokLppi::class);
			$this->updateDocNumberAndYear($number, $this->tipe_surat, true);
			$this->updateDocDate();
			
			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}

	/*
	 |--------------------------------------------------------------------------
	 | Destroy functions
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
			$is_unpublished = $this->checkUnpublished(DokLppi::class, $id);
			if ($is_unpublished) {
				DokLppi::find($id)->delete();
			}
			
			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}
}
