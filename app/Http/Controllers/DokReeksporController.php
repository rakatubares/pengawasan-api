<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokReeksporController extends DokPenindakanController
{
	public function __construct($doc_type='reekspor')
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
			'jenis_dok_asal' => 'required',
			'nomor_dok_asal' => 'required',
			'tanggal_dok_asal' => 'required|date',
			'jenis_dok_ekspor' => 'required',
			'nomor_dok_ekspor' => 'required',
			'tanggal_dok_ekspor' => 'required|date',
			'tanggal_mawb' => 'nullable|date',
			'tanggal_hawb' => 'nullable|date',
			'tanggal_flight' => 'nullable|date',
			'saksi.id' => 'required|integer',
			'petugas1.user_id' => 'required|integer',
			'petugas2.user_id' => 'nullable|integer',
		]);
	}

	protected function prepareData(Request $request, $state='insert')
	{
		$no_dok_lengkap = $this->tipe_surat . '-     ' . $this->agenda_dok;
		$tanggal_dok_asal = date('Y-m-d', strtotime($request->tanggal_dok_asal));
		$tanggal_dok_ekspor = date('Y-m-d', strtotime($request->tanggal_dok_ekspor));
		$tanggal_mawb = $request->tanggal_mawb != null ? date('Y-m-d', strtotime($request->tanggal_mawb)) : null;
		$tanggal_hawb = $request->tanggal_hawb != null ? date('Y-m-d', strtotime($request->tanggal_hawb)) : null;
		$tanggal_flight = $request->tanggal_flight != null ? date('Y-m-d', strtotime($request->tanggal_flight)) : null;
		
		$data_reekspor = [
			'jenis_dok_asal' => $request->jenis_dok_asal,
			'nomor_dok_asal' => $request->nomor_dok_asal,
			'tanggal_dok_asal' => $tanggal_dok_asal,
			'jenis_dok_ekspor' => $request->jenis_dok_ekspor,
			'nomor_dok_ekspor' => $request->nomor_dok_ekspor,
			'tanggal_dok_ekspor' => $tanggal_dok_ekspor,
			'nomor_mawb' => $request->nomor_mawb,
			'tanggal_mawb' => $tanggal_mawb,
			'nomor_hawb' => $request->nomor_hawb,
			'tanggal_hawb' => $tanggal_hawb,
			'nama_sarkut' => $request->nama_sarkut,
			'nomor_flight' => $request->nomor_flight,
			'tanggal_flight' => $tanggal_flight,
			'nomor_reg_sarkut' => $request->nomor_reg_sarkut,
			'kedapatan' => $request->kedapatan,
			'saksi_id' => $request->saksi['id'],
			'petugas1_id' => $request->petugas1['user_id'],
			'petugas2_id' => $request->petugas2['user_id'],
		];

		if ($state == 'insert') {
			$data_reekspor['agenda_dok'] = $this->agenda_dok;
			$data_reekspor['no_dok_lengkap'] = $no_dok_lengkap;
			$data_reekspor['kode_status'] = 100;
		};

		return $data_reekspor;
	}

	public function store(Request $request)
	{
		$result = $this->storePenindakanDocument($request);
		return $result;
	}

	public function update(Request $request, $id)
	{
		$result = $this->updatePenindakanDocument($request, $id);
		return $result;
	}
}
