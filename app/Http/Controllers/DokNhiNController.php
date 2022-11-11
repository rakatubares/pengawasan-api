<?php

namespace App\Http\Controllers;

use App\Models\DetailBarang;
use App\Models\DokNhiN;
use Illuminate\Http\Request;

class DokNhiNController extends DokNhiController
{
    public function __construct()
	{
		parent::__construct('nhin');
		$this->lkai_type = 'lkain';
		$this->lkai_draft_status = 122;
		$this->lkai_published_status = 222;
		$this->prepareLkai();
	}

	/**
	 * Validate request
	 * 
	 * @param  \Illuminate\Http\Request  $request
	 */
	protected function validateData(Request $request)
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
			'flag_sarkut' => 'boolean',
			'flag_orang' => 'boolean',
			'waktu_berangkat_orang' => 'nullable|date',
			'waktu_datang_orang' => 'nullable|date',
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
	protected function prepareData(Request $request, $state='insert')
	{
		$no_dok_lengkap = $this->tipe_surat . '-' . '      ' . $this->agenda_dok;
		$waktu_indikasi = $this->dateFromText($request->waktu_indikasi, 'Y-m-d H:i:s');
		$tanggal_dok_exim = $this->dateFromText($request->tanggal_dok_exim);
		$tanggal_awb_exim = $this->dateFromText($request->tanggal_awb_exim);
		$waktu_berangkat_orang = $this->dateFromText($request->waktu_berangkat_orang, 'Y-m-d H:i:s');
		$waktu_datang_orang = $this->dateFromText($request->waktu_datang_orang, 'Y-m-d H:i:s');

		$data_nhi = [
			'sifat' => $request->sifat,
			'klasifikasi' => $request->klasifikasi,
			'tujuan' => $request->tujuan,
			'tempat_indikasi' => $request->tempat_indikasi,
			'waktu_indikasi' => $waktu_indikasi,
			'zona_waktu' => $request->zona_waktu,
			'kd_kantor' => $request->kantor_bc['kd_kantor'],
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
			'id_barang_exim' => $request->id_barang_exim,
			'data_lain_exim' => $request->data_lain_exim,
			'flag_sarkut' => $request->flag_sarkut,
			'nama_sarkut' => $request->nama_sarkut,
			'jenis_sarkut' => $request->jenis_sarkut,
			'no_flight_trayek_sarkut' => $request->no_flight_trayek_sarkut,
			'pelabuhan_asal_sarkut' => $request->pelabuhan_asal_sarkut['iata_code'],
			'pelabuhan_tujuan_sarkut' => $request->pelabuhan_tujuan_sarkut['iata_code'],
			'imo_mmsi_sarkut' => $request->imo_mmsi_sarkut,
			'data_lain_sarkut' => $request->data_lain_sarkut,
			'flag_orang' => $request->flag_orang,
			'entitas_id' => $request->orang['id'],
			'flight_voyage_orang' => $request->flight_voyage_orang,
			'pelabuhan_asal_orang' => $request->pelabuhan_asal_orang['iata_code'],
			'pelabuhan_tujuan_orang' => $request->pelabuhan_tujuan_orang['iata_code'],
			'waktu_berangkat_orang' => $waktu_berangkat_orang,
			'waktu_datang_orang' => $waktu_datang_orang,
			'data_lain_orang' => $request->data_lain_orang,
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
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		// Check exim item in old data
		$old_data = DokNhiN::find($id);
		$old_flag_exim = $old_data->flag_exim;
		$old_barang_id = $old_data->id_barang_exim;
		$new_flag_exim = $request->flag_exim;
		
		// Update data
		$result = parent::update($request, $id);

		// Delete item detail if type of activity is not exim
		if (($old_flag_exim == true) && ($new_flag_exim == false)) {
			if ($old_barang_id != null) {
				DetailBarang::find($old_barang_id)->delete();
			}
		}

		// Return updated data
		return $result;
	}
}