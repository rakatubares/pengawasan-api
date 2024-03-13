<?php

namespace App\Models\Intelijen;

use App\Models\Dokumen;

class DokNi extends Dokumen
{
	protected $table = 'dok_ni';
	public $kode_dokumen = 'ni';
	public $tipe_dokumen = 'NI';
	public $kode_lkai = 'lkai';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'chain_id',
		'sifat',
		'klasifikasi',
		'tujuan',
		'uraian',
		'kode_status',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
	];
}
