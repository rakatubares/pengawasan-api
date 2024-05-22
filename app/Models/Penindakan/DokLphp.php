<?php

namespace App\Models\Penindakan;

use App\Models\Dokumen;

class DokLphp extends Dokumen
{
	protected $table = 'dok_lphp';
	public $kode_dokumen = 'lphp';
	public $tipe_dokumen = 'LPHP';
	public $kode_lptp = 'lptp';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'chain_id',
		'analisa',
		'catatan',
		'kode_status'
	];

	protected $casts = [
		'tanggal_dokumen' => 'date'
	];
}
