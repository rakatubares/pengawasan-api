<?php

namespace App\Models\Penindakan;

use App\Models\Dokumen;

class DokSegel extends Dokumen
{
	protected $table = 'dok_segel';
	public $kode_dokumen = 'segel';
	public $tipe_dokumen = 'BA';
	public $agenda_dokumen = '/Segel/KPU.305/';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'chain_id',
		'jenis_segel',
		'jumlah_segel',
		'satuan_segel',
		'nomor_segel',
		'tempat_segel',
		'kode_status',
		'status_segel',
		'status_titip',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
	];
}
