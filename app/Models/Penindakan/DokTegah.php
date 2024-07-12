<?php

namespace App\Models\Penindakan;

use App\Models\Dokumen;

class DokTegah extends Dokumen
{
	protected $table = 'dok_tegah';
	public $kodeDokumen = 'tegah';
	public $tipeDokumen = 'BA';
	public $agendaDokumen = '/Tegah/KPU.305/';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'chain_id',
		'kode_status'
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
	];
}
