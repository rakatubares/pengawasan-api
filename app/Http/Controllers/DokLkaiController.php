<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokLkaiResource;
use App\Http\Resources\DokLkaiTableResource;
use App\Models\Intelijen;
use App\Models\ObjectRelation;
use App\Traits\ConverterTrait;
use App\Traits\DokumenTrait;
use App\Traits\SwitcherTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokLkaiController extends Controller
{
	use ConverterTrait;
	use DokumenTrait;
	use SwitcherTrait;

	public function __construct()
	{
		$this->doc_type = 'lkai';
		$this->lppi_type = 'lppi';
		$this->prepareModel();
	}

	public function prepareModel()
	{
		$this->tipe_surat = $this->switchObject($this->doc_type, 'tipe_dok');
		$this->agenda_dok = $this->switchObject($this->doc_type, 'agenda');
		$this->model_lkai = $this->switchObject($this->doc_type, 'model');
		$this->model_lppi = $this->switchObject($this->lppi_type, 'model');
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
		$all_lkai = $this->model_lkai::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$lkai_list = DokLkaiTableResource::collection($all_lkai);
		return $lkai_list;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$lkai = new DokLkaiResource($this->model_lkai::findOrFail($id));
		return $lkai;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function display($id)
	{
		$lppi = new DokLkaiResource($this->model_lkai::findOrFail($id), 'display');
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
		$lppi = new DokLkaiResource($this->model_lkai::findOrFail($id), 'form', $this->doc_type);
		return $lppi;
	}

	/**
	 * Display resource based on search query
	 * 
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function search(Request $request)
	{
		$src = $request->src;
		$flt = $request->flt;
		$exc = $request->exc;
		$search = '%' . $src . '%';

		$search_result = $this->model_lkai::where(function ($query) use ($search, $flt) 
			{
				$query->where('no_dok_lengkap', 'like', $search)
					->when($flt != null, function ($query) use ($flt)
					{
						foreach ($flt as $column => $value) {
							if (is_array($value)) {
								$query->whereIn($column, $value);
							} else if ($value == null) {
								$query->where($column, $value);
							} else {
								$search_value = '%' . $value . '%';
								$query->where($column, 'like', $search_value);
							}
						}
						return $query;
					});
			})
			->when($exc != null, function ($query) use ($exc)
			{
				return $query->orWhere('id', $exc);
			})
			->orderBy('created_at', 'desc')
			->orderBy('id', 'desc')
			->take(5)
			->get();
		$search_list = DokLkaiTableResource::collection($search_result);
		return $search_list;
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
			'lppi_id' => 'nullable|integer',
			'flag_lpti' => 'boolean',
			'tanggal_lpti' => 'nullable|date',
			'flag_npi' => 'boolean',
			'tanggal_npi' => 'nullable|date',
			'flag_rekom_nhi' => 'boolean',
			'flag_rekom_ni' => 'boolean',
			'analis.user_id' => 'integer',
			'pejabat.user.plh' => 'boolean',
			'pejabat.user.user_id' => 'integer',
			'pejabat.user.keputusan' => 'boolean',
			'pejabat.user.tanggal_terima' => 'date',
			'atasan.user.plh' => 'boolean',
			'atasan.user.user_id' => 'integer',
			'atasan.user.keputusan' => 'boolean',
			'atasan.user.tanggal_terima' => 'date',
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
		$tanggal_lpti = $this->dateFromText($request->tanggal_lpti);
		$tanggal_npi = $this->dateFromText($request->tanggal_npi);
		$tanggal_terima_pejabat = $this->dateFromText($request->pejabat['tanggal_terima']);
		$tanggal_terima_atasan = $this->dateFromText($request->atasan['tanggal_terima']);

		$data_lkai = [
			'flag_lpti' => $request->flag_lpti,
			'nomor_lpti' => $request->nomor_lpti,
			'tanggal_lpti' => $tanggal_lpti,
			'flag_npi' => $request->flag_npi,
			'nomor_npi' => $request->nomor_npi,
			'tanggal_npi' => $tanggal_npi,
			'prosedur' => $request->prosedur,
			'hasil' => $request->hasil,
			'kesimpulan' => $request->kesimpulan,
			'flag_rekom_nhi' => $request->flag_rekom_nhi,
			'flag_rekom_ni' => $request->flag_rekom_ni,
			'rekomendasi_lain' => $request->rekomendasi_lain,
			'informasi_lain' => $request->informasi_lain,
			'tujuan' => $request->tujuan,
			'analis_id' => $request->analis['user_id'],
			'keputusan_pejabat' => $request->pejabat['keputusan'],
			'catatan_pejabat' => $request->pejabat['catatan'],
			'tanggal_terima_pejabat' => $tanggal_terima_pejabat,
			'kode_pejabat' => $request->pejabat['jabatan']['kode'],
			'plh_pejabat' => $request->pejabat['plh'],
			'pejabat_id' => $request->pejabat['user']['user_id'],
			'keputusan_atasan' => $request->atasan['keputusan'],
			'catatan_atasan' => $request->atasan['catatan'],
			'tanggal_terima_atasan' => $tanggal_terima_atasan,
			'kode_atasan' => $request->atasan['jabatan']['kode'],
			'plh_atasan' => $request->atasan['plh'],
			'atasan_id' => $request->atasan['user']['user_id'],
		];

		if ($this->doc_type == 'lkain') {
			unset($data_lkai['informasi_lain']);
		}

		if ($state == 'insert') {
			$data_lkai['agenda_dok'] = $this->agenda_dok;
			$data_lkai['no_dok_lengkap'] = $no_dok_lengkap;
			$data_lkai['kode_status'] = 100;
		}

		return $data_lkai;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		// validate data
		$this->validateData($request);

		DB::beginTransaction();
		try {
			// Save data LKAI
			$data_lkai = $this->prepareData($request, 'insert');
			$lkai = $this->model_lkai::create($data_lkai);

			// Create intelijen
			if ($request->lppi_id == null) {
				$this->createIntel($request, $lkai->id);
			} else {
				$this->createLinkLppi($request->lppi_id, $lkai->id);
			}

			// Commit store query
			DB::commit();

			// Return created data
			$lkai_resource = new DokLkaiResource($this->model_lkai::findOrFail($lkai->id), 'display');
			return $lkai_resource;
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
		$is_unpublished = $this->checkUnpublished($this->model_lkai, $id);

		if ($is_unpublished) {
			DB::beginTransaction();

			try {
				// Validate data
				$this->validateData($request);
	
				// Update data
				$data_lkai = $this->prepareData($request, 'update');
				$this->model_lkai::find($id)->update($data_lkai);

				// Check existing LPPI
				$intelijen = $this->model_lkai::find($id)->intelijen;
				$lppi = $this->lppi_type == 'lppin' ? $intelijen->lppin : $intelijen->lppi;

				if ($request->lppi_id == null) {
					if ($lppi != null) {
						$this->rollbackLppi($id);
						$this->createIntel($request, $id);
					}
				} else {
					if ($lppi == null) {
						$this->deleteIntel($id);
						$this->createLinkLppi($request->lppi_id, $id);
					} else {
						if ($lppi->id != $request->lppi_id) {
							$this->rollbackLppi($id);
							$this->createLinkLppi($request->lppi_id, $id);
						}
					}
				}

				// Commit query
				DB::commit();
	
				// Return data
				$lkai_resource = new DokLkaiResource($this->model_lkai::findOrFail($id), 'display');
				return $lkai_resource;
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
	 * Create new intel
	 */
	private function createIntel($request, $lkai_id)
	{
		$intelijen = Intelijen::create();
		$intelijen->ikhtisar()->createMany($request->ikhtisar);
		$this->createIntelRelation($intelijen->id, $lkai_id);
	}

	/**
	 * Delete intel
	 */
	private function deleteIntel($lkai_id)
	{
		$existing_lkai = $this->model_lkai::find($lkai_id);
		$existing_intel = $existing_lkai->intelijen;
		$existing_intel->ikhtisar()->delete();
		$this->deleteIntelRelation($existing_intel->id, $lkai_id);
	}

	/**
	 * Create new intel relation
	 */
	private function createIntelRelation($intelijen_id, $lkai_id)
	{
		ObjectRelation::create([
			'object1_type' => 'intelijen',
			'object1_id' => $intelijen_id,
			'object2_type' => $this->doc_type,
			'object2_id' => $lkai_id,
		]);
	}

	/**
	 * Delete relation
	 */
	private function deleteIntelRelation($intel_id, $lkai_id)
	{
		ObjectRelation::where([
			'object1_type' => 'intelijen',
			'object1_id' => $intel_id,
			'object2_type' => $this->doc_type,
			'object2_id' => $lkai_id,
		])->delete();
	}

	/**
	 * Link LPPI
	 */
	private function createLinkLppi($lppi_id, $lkai_id)
	{
		$lppi = $this->model_lppi::find($lppi_id);
		$status_lppi = $this->lppi_type == 'lppin' ? 121 : 111;
		$lppi->update(['kode_status' => $status_lppi]);
		$intelijen = $lppi->intelijen;
		$this->createIntelRelation($intelijen->id, $lkai_id);
	}

	/**
	 * Rollback existing LPPI
	 */
	private function rollbackLppi($lkai_id)
	{
		$existing_intel = $this->model_lkai::find($lkai_id)->intelijen; 
		$existing_lppi = $this->lppi_type == 'lppin' ? $existing_intel->lppin : $existing_intel->lppi;
		$existing_lppi->update(['kode_status' => 200]);
		$this->deleteIntelRelation($existing_intel->id, $lkai_id);
	}

	/**
	 * Publish document.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function publish($id)
	{
		DB::beginTransaction();
		try {
			// Publish LKAI
			$this->getDocument($this->model_lkai, $id);
			$this->getCurrentDate();
			$number = $this->getNewDocNumber($this->model_lkai);
			$this->updateDocNumberAndYear($number, $this->tipe_surat, true);
			$this->updateDocDate();

			// Change LPPI status
			$status_lppi = $this->lppi_type == 'lppin' ? 221 : 211;
			$lppi = $this->lppi_type = 'lppin' ? $this->doc->intelijen->lppin : $this->doc->intelijen->lppi;
			if ($lppi != null) {
				$lppi->update(['kode_status' => $status_lppi]);
			}
			
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
			$is_unpublished = $this->checkUnpublished($this->model_lkai, $id);
			if ($is_unpublished) {
				$this->model_lkai::find($id)->delete();
			}
			
			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}
}
