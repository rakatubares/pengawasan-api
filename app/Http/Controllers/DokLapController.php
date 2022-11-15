<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokLapController extends DokPenindakanController
{

	public function __construct($doc_type='lap')
	{
		parent::__construct($doc_type);
	}

	/*
	 |--------------------------------------------------------------------------
	 | Data modify functions
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Validate request
	 */
	protected function validateData(Request $request)
	{
		$request->validate([
			'tanggal_dokumen' => 'required|date',
			'sumber_id' => 'nullable|integer',
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
	protected function prepareData(Request $request, $state='insert')
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
		$result = $this->storePenindakanDocument($request);
		return $result;
	}

	// Handle store relation
	protected function stored($request)
	{
		if ($request->jenis_sumber == 'LI-1') {
			$this->createDocRelation('li', $request->sumber_id, 106);
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
		$result = $this->updatePenindakanDocument($request, $id);
		return $result;
	}

	// Handle update relation
	protected function updating($request)
	{
		$existing_sumber = $this->doc->jenis_sumber;

		// Update relation if necessary
		if ($existing_sumber == 'LI-1') {
			if ($request->jenis_sumber == 'LI-1') {
				if ($request->sumber_id != $this->doc->li->id) {
					$this->deleteDocRelation('li', 200);
					$this->createDocRelation('li', $request->sumber_id, 106);
				}
			} else {
				$this->deleteDocRelation('li', 200);
			}
		} else {
			if ($request->jenis_sumber == 'LI-1') {
				$this->createDocRelation('li', $request->sumber_id, 106);
			}
		}
	}

	/**
	 * Get year before document is published
	 */
	protected function publishing($id)
	{
		$this->year = $this->doc->thn_dok;
	}

	// Additional function when publish
	protected function published()
	{
		if ($this->doc->li != null) {
			$this->doc->li->update(['kode_status' => 206]);
		}
	}
}