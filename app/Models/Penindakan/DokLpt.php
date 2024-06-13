<?php

namespace App\Models\Penindakan;

use App\Models\Dokumen;

class DokLpt extends Dokumen
{
    protected $table = 'dok_lpt';
	public $kode_dokumen = 'lpt';
	public $tipe_dokumen = 'LPT';
	public $agenda_dokumen = '/OPERASI/KPU.3053/';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'chain_id',
		'barang',
		'sarpras',
		'kronologi',
		'kode_status',
		'status_tindak_lanjut',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
	];
}
