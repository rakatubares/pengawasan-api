<?php

namespace App\Models\Penyidikan;

use App\Models\Dokumen;

class DokSplit extends Dokumen
{
	protected $table = 'dok_split';
	public $kodeDokumen = 'split';
	public $tipeDokumen = 'SPLIT';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'chain_id',
		'dugaan_pelanggaran',
		'kode_status',
		'status_tindak_lanjut',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
	];
}
