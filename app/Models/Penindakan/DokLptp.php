<?php

namespace App\Models\Penindakan;

use App\Models\Dokumen;

class DokLptp extends Dokumen
{
	protected $table = 'dok_lptp';
	public $kode_dokumen = 'lptp';
	public $tipe_dokumen = 'LPTP';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'chain_id',
		'alasan_tidak_penindakan',
		'catatan',
		'kode_status'
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
	];
}
