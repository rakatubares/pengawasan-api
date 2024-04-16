<?php

namespace App\Models\Penindakan;

use App\Models\Dokumen;

class DokRiksa extends Dokumen
{
	protected $table = 'dok_riksa';
	public $kode_dokumen = 'riksa';
	public $tipe_dokumen = 'BA';
	public $agenda_dokumen = '/Riksa/KPU.305/';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'chain_id',
		'kode_status',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
	];
}
