<?php

namespace App\Models\Penindakan;

use App\Models\Dokumen;

class DokLp extends Dokumen
{
	protected $table = 'dok_lp';
	public $kode_dokumen = 'lp';
	public $tipe_dokumen = 'LP';
	public $kode_lphp = 'lphp';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'chain_id',
		'pasal',
		'modus',
		'kode_status',
		'status_tindak_lanjut',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date'
	];
}
