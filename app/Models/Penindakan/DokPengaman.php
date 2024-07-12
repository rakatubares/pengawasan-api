<?php

namespace App\Models\Penindakan;

use App\Models\Dokumen;

class DokPengaman extends Dokumen
{
	protected $table = 'dok_pengaman';
	public $kodeDokumen = 'pengaman';
	public $tipeDokumen = 'BA';
	public $agendaDokumen = '/Tanda Pengaman/KPU.305/';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'chain_id',
		'alasan_pengamanan',
		'keterangan',
		'jenis_pengaman',
		'jumlah_pengaman',
		'satuan_pengaman',
		'nomor_pengaman',
		'tempat_pengaman',
		'kode_status',
		'status_buka',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
	];
}
