<?php

namespace App\Models\Penindakan;

use App\Models\Dokumen;

class DokLphp extends Dokumen
{
	protected $table = 'dok_lphp';
	public $kodeDokumen = 'lphp';
	public $tipeDokumen = 'LPHP';
	public $kodeLptp = 'lptp';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'chain_id',
		'analisa',
		'catatan',
		'kode_status',
		'status_tindak_lanjut',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date'
	];
}
