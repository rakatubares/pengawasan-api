<?php

namespace App\Models\Penindakan;

use App\Models\Dokumen;

class DokLpN extends Dokumen
{
	protected $table = 'dok_lpn';
	public $kode_dokumen = 'lpn';
	public $tipe_dokumen = 'LP-N';
	public $kode_lphp = 'lphpn';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'chain_id',
		'sprint_id',
		'kesimpulan',
		'kode_status',
		'status_tindak_lanjut',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date'
	];
}
