<?php

namespace App\Http\Controllers;

use App\Models\DokTegah;
use Illuminate\Http\Request;

class DokTegahController extends DokPenindakanController
{
	public function __construct($doc_type='tegah')
	{
		parent::__construct($doc_type);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
        $no_dok_lengkap = $this->tipe_surat . '-     ' . $this->agenda_dok;

		$insert_result = DokTegah::create([
			'agenda_dok' => $this->agenda_dok,
			'no_dok_lengkap' => $no_dok_lengkap,
			'kode_status' => 100,
		]);

		return $insert_result;
	}
}
