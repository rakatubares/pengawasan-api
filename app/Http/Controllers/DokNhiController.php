<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokNhiResource;
use App\Http\Resources\DokNhiTableResource;
use App\Models\DokLkai;
use App\Models\DokNhi;
use App\Models\ObjectRelation;
use App\Traits\ConverterTrait;
use App\Traits\DokumenTrait;
use App\Traits\SwitcherTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokNhiController extends Controller
{
	use ConverterTrait;
	use DokumenTrait;
	use SwitcherTrait;
	
	public function __construct()
	{
		$this->doc_type = 'nhi';
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
		$all_nhi = DokNhi::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$nhi_list = DokNhiTableResource::collection($all_nhi);
		return $nhi_list;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$lppi = new DokNhiResource(DokNhi::findOrFail($id));
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
		$lppi = new DokNhiResource(DokNhi::findOrFail($id), 'display');
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
		$nhi = new DokNhiResource(DokNhi::findOrFail($id), 'form');
		return $nhi;
	}

	/**
	 * Display object type
	 * 
	 * @param int $id
	 */
	public function objek($id)
	{
		$objek = new DokNhiResource(DokNhi::find($id), 'objek');
		return $objek;
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
			'lkai_id' => 'integer',
			'sifat' => 'string',
			'klasifikasi' => 'string',
			'waktu_indikasi' => 'nullable|date',
			'zona_waktu' => 'string',
			'flag_exim' => 'boolean',
			'tanggal_dok_exim' => 'nullable|date',
			'tanggal_awb_exim' => 'nullable|date',
			'flag_bkc' => 'boolean',
			'flag_tertentu' => 'boolean',
			'tanggal_dok_tertentu' => 'nullable|date',
			'tanggal_awb_tertentu' => 'nullable|date',
			'penerbit.plh' => 'boolean',
			'penerbit.user_id' => 'integer',
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
		$waktu_indikasi = $this->dateFromText($request->waktu_indikasi, 'Y-m-d H:i:s');
		$tanggal_dok_exim = $this->dateFromText($request->tanggal_dok_exim);
		$tanggal_awb_exim = $this->dateFromText($request->tanggal_awb_exim);
		$tanggal_dok_tertentu = $this->dateFromText($request->tanggal_dok_tertentu);
		$tanggal_awb_tertentu = $this->dateFromText($request->tanggal_awb_tertentu);

		$data_nhi = [
			'sifat' => $request->sifat,
			'klasifikasi' => $request->klasifikasi,
			'tujuan' => $request->tujuan,
			'tempat_indikasi' => $request->tempat_indikasi,
			'waktu_indikasi' => $waktu_indikasi,
			'zona_waktu' => $request->zona_waktu,
			'kantor' => $request->kantor,
			'flag_exim' => $request->flag_exim,
			'jenis_dok_exim' => $request->jenis_dok_exim,
			'nomor_dok_exim' => $request->nomor_dok_exim,
			'tanggal_dok_exim' => $tanggal_dok_exim,
			'nama_sarkut_exim' => $request->nama_sarkut_exim,
			'no_flight_trayek_exim' => $request->no_flight_trayek_exim,
			'nomor_awb_exim' => $request->nomor_awb_exim,
			'tanggal_awb_exim' => $tanggal_awb_exim,
			'merek_koli_exim' => $request->merek_koli_exim,
			'importir_ppjk' => $request->importir_ppjk,
			'npwp' => $request->npwp,
			'data_lain_exim' => $request->data_lain_exim,
			'flag_bkc' => $request->flag_bkc,
			'tempat_penimbunan' => $request->tempat_penimbunan,
			'penyalur' => $request->penyalur,
			'tempat_penjualan' => $request->tempat_penjualan,
			'nppbkc' => $request->nppbkc,
			'nama_sarkut_bkc' => $request->nama_sarkut_bkc,
			'no_flight_trayek_bkc' => $request->no_flight_trayek_bkc,
			'data_lain_bkc' => $request->data_lain_bkc,
			'flag_tertentu' => $request->flag_tertentu,
			'jenis_dok_tertentu' => $request->jenis_dok_tertentu,
			'nomor_dok_tertentu' => $request->nomor_dok_tertentu,
			'tanggal_dok_tertentu' => $tanggal_dok_tertentu,
			'nama_sarkut_tertentu' => $request->nama_sarkut_tertentu,
			'no_flight_trayek_tertentu' => $request->no_flight_trayek_tertentu,
			'nomor_awb_tertentu' => $request->nomor_awb_tertentu,
			'tanggal_awb_tertentu' => $tanggal_awb_tertentu,
			'merek_koli_tertentu' => $request->merek_koli_tertentu,
			'orang_badan_hukum' => $request->orang_badan_hukum,
			'data_lain_tertentu' => $request->data_lain_tertentu,
			'indikasi' => $request->indikasi,
			'kode_jabatan' => $request->penerbit['jabatan']['kode'],
			'plh_pejabat' => $request->penerbit['plh'],
			'pejabat_id' => $request->penerbit['user']['user_id'],
		];

		if ($state == 'insert') {
			$data_nhi['agenda_dok'] = $this->agenda_dok;
			$data_nhi['no_dok_lengkap'] = $no_dok_lengkap;
			$data_nhi['kode_status'] = 100;
		}

		return $data_nhi;
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
			// Save data NHI
			$data_nhi = $this->prepareData($request, 'insert');
			$nhi = DokNhi::create($data_nhi);

			// Save CC
			$cc_list = array_filter($request->tembusan, 'strlen');
			if (sizeof($cc_list) > 0) {
				app(TembusanController::class)->setCc(DokNhi::class, $nhi->id, $cc_list);
			}

			// Link with intelijen
			$this->createLinkLkai($request->lkai_id, $nhi->id);
			
			// Commit store query
			DB::commit();

			// Return created data
			$nhi_resource = new DokNhiResource(DokNhi::find($nhi->id), 'display');
			return $nhi_resource;
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
		$is_unpublished = $this->checkUnpublished(DokNhi::class, $id);

		if ($is_unpublished) {
			DB::beginTransaction();

			try {
				// Validate data
				$this->validateData($request);
	
				// Update data
				$data_nhi = $this->prepareData($request, 'update');
				DokNhi::find($id)->update($data_nhi);

				// Update CC
				$cc_list = array_filter($request->tembusan, 'strlen');
				app(TembusanController::class)->setCc(DokNhi::class, $id, $cc_list);

				// Check existing LKAI
				$intelijen = DokNhi::find($id)->intelijen;
				$lkai = $intelijen->lkai;

				if ($request->lkai_id != $lkai->id) {
					$this->rollbackLkai($id);
					$this->createLinkLkai($request->lkai_id, $id);
				}

				// Commit query
				DB::commit();
	
				// Return data
				$nhi_resource = new DokNhiResource(DokNhi::findOrFail($id), 'display');
				return $nhi_resource;
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
	 * Link LKAI
	 */
	private function createLinkLkai($lkai_id, $nhi_id)
	{
		$lkai = DokLkai::find($lkai_id);
		$lkai->update(['kode_status' => 112]);
		$intelijen = $lkai->intelijen;
		$this->createIntelRelation($intelijen->id, $nhi_id);
	}

	/**
	 * Rollback existing LKAI
	 */
	private function rollbackLkai($nhi_id)
	{
		$existing_intel = DokNhi::find($nhi_id)->intelijen; 
		$existing_lkai = $existing_intel->lkai;
		$existing_lkai->update(['kode_status' => 200]);
		$this->deleteIntelRelation($existing_intel->id, $nhi_id);
	}

	/**
	 * Create new intel relation
	 */
	private function createIntelRelation($intelijen_id, $lkai_id)
	{
		ObjectRelation::create([
			'object1_type' => 'intelijen',
			'object1_id' => $intelijen_id,
			'object2_type' => 'nhi',
			'object2_id' => $lkai_id,
		]);
	}

	/**
	 * Delete relation
	 */
	private function deleteIntelRelation($intelijen_id, $lkai_id)
	{
		ObjectRelation::where([
			'object1_type' => 'intelijen',
			'object1_id' => $intelijen_id,
			'object2_type' => 'nhi',
			'object2_id' => $lkai_id,
		])->delete();
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
			// Publish NHI
			$this->getDocument(DokNhi::class, $id);
			$this->getCurrentDate();
			$number = $this->getNewDocNumber(DokNhi::class);
			$this->updateDocNumberAndYear($number, $this->tipe_surat, true);
			$this->updateDocDate();

			// Change LKAI status
			$lkai = $this->doc->intelijen->lkai;
			if ($lkai != null) {
				$lkai->update(['kode_status' => 212]);
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
			$is_unpublished = $this->checkUnpublished(DokNhi::class, $id);
			if ($is_unpublished) {
				DokNhi::find($id)->delete();
			}
			
			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}
}
