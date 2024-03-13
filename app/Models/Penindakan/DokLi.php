<?php

namespace App\Models\Penindakan;

use App\Models\Dokumen;

class DokLi extends Dokumen
{
	protected $table = 'dok_li';
	public $kode_dokumen = 'li';
	public $tipe_dokumen = 'LI-1';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'chain_id',
		'sumber',
		'informasi',
		'tindak_lanjut',
		'catatan',
		'kode_status',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date'
	];
}
