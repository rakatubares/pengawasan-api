<?php

namespace App\Http\Controllers;

use App\Http\Resources\DokLapResource;
use App\Http\Resources\DokLapTableResource;
use App\Models\DokLap;
use App\Traits\DokumenTrait;
use App\Traits\SwitcherTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokLapController extends Controller
{
	use DokumenTrait;
	use SwitcherTrait;

	public function __construct()
	{
		$this->doc_type = 'lap';
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
		$all_doc = DokLap::orderBy('created_at', 'desc')
			->orderBy('no_dok', 'desc')
			->get();
		$doc_list = DokLapTableResource::collection($all_doc);
		return $doc_list;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$doc = new DokLapResource(DokLap::findOrFail($id));
		return $doc;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function display($id)
	{
		$doc = new DokLapResource(DokLap::findOrFail($id), 'display');
		return $doc;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function form($id)
	{
		$doc = new DokLapResource(DokLap::findOrFail($id), 'form');
		return $doc;
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
			'tanggal_dokumen' => 'required|date',
			'nomor_sumber' => 'required',
			'tanggal_sumber' => 'required|date',
			'dugaan_pelanggaran.id' => 'required|integer',
			'flag_pelaku' => 'integer',
			'flag_pelanggaran' => 'integer',
			'flag_locus' => 'integer',
			'flag_tempus' => 'integer',
			'flag_kewenangan' => 'integer',
			'flag_sdm' => 'integer',
			'flag_sarpras' => 'integer',
			'flag_anggaran' => 'integer',
			'flag_layak_penindakan' => 'boolean',
			'skema_penindakan.id' => 'nullable|integer',
			'flag_layak_patroli' => 'nullable|integer',
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
		$thn_dok = date('Y', strtotime($request->tanggal_dokumen));
		$tanggal_dokumen = date('Y-m-d', strtotime($request->tanggal_dokumen));
		$tanggal_sumber = date('Y-m-d', strtotime($request->tanggal_sumber));

		$data_lap = [
			'thn_dok' => $thn_dok,
			'tanggal_dokumen' => $tanggal_dokumen,
			'jenis_sumber' => $request->jenis_sumber,
			'nomor_sumber' => $request->nomor_sumber,
			'tanggal_sumber' => $tanggal_sumber,
			'dugaan_pelanggaran_id' => $request->dugaan_pelanggaran['id'],
			'flag_pelaku' => $request->flag_pelaku,
			'keterangan_pelaku' => $request->keterangan_pelaku,
			'flag_pelanggaran' => $request->flag_pelanggaran,
			'keterangan_pelanggaran' => $request->keterangan_pelanggaran,
			'flag_locus' => $request->flag_locus,
			'keterangan_locus' => $request->keterangan_locus,
			'flag_tempus' => $request->flag_tempus,
			'keterangan_tempus' => $request->keterangan_tempus,
			'flag_kewenangan' => $request->flag_kewenangan,
			'keterangan_kewenangan' => $request->keterangan_kewenangan,
			'flag_sdm' => $request->flag_sdm,
			'keterangan_sdm' => $request->keterangan_sdm,
			'flag_sarpras' => $request->flag_sarpras,
			'keterangan_sarpras' => $request->keterangan_sarpras,
			'flag_anggaran' => $request->flag_anggaran,
			'keterangan_anggaran' => $request->keterangan_anggaran,
			'flag_layak_penindakan' => $request->flag_layak_penindakan,
			'skema_penindakan_id' => $request->skema_penindakan['id'],
			'keterangan_skema_penindakan' => $request->keterangan_skema_penindakan,
			'flag_layak_patroli' => $request->flag_layak_patroli,
			'keterangan_patroli' => $request->keterangan_patroli,
			'kesimpulan' => $request->kesimpulan,
			'kode_jabatan_penerbit' => $request->penerbit['jabatan']['kode'],
			'plh_penerbit' => $request->penerbit['plh'],
			'penerbit_id' => $request->penerbit['user']['user_id'],
			'kode_jabatan_atasan' => $request->atasan['jabatan']['kode'],
			'plh_atasan' => $request->atasan['plh'],
			'atasan_id' => $request->atasan['user']['user_id'],
		];

		if ($state == 'insert') {
			$data_lap['agenda_dok'] = $this->agenda_dok;
			$data_lap['no_dok_lengkap'] = $no_dok_lengkap;
			$data_lap['kode_status'] = 100;
		};

		return $data_lap;
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
			$data_lap = $this->prepareData($request, 'insert');
			$lap = DokLap::create($data_lap);

			// Commit store query
			DB::commit();

			// Return data
			$lap_resource = new DokLapResource(DokLap::findOrFail($lap->id), 'form');
			return $lap_resource;
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
		$is_unpublished = $this->checkUnpublished(DokLap::class, $id);

		// Update if not published
		if ($is_unpublished) {
			DB::beginTransaction();

			try {
				// Validate data
				$this->validateData($request);

				// Update data
				$data_lap = $this->prepareData($request, 'update');
				DokLap::where('id', $id)->update($data_lap);

				// Commit store query
				DB::commit();

				// Return updated data
				$lap_resource = new DokLapResource(DokLap::findOrFail($id), 'form');
				$result = $lap_resource;
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
			$lap = DokLap::find($id);
			$this->publishDocument('lap', $lap->id, $lap->thn_dok);
			
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
			$is_unpublished = $this->checkUnpublished(DokLap::class, $id);
			if ($is_unpublished) {
				DokLap::find($id)->delete();
			}

			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}
}
