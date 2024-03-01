<?php

namespace App\Models\Intelijen;

// use App\Models\DocumentsChain;
use App\Models\Dokumen;

class DokLkai extends Dokumen
{
	protected $table = 'dok_lkai';
	public $kode_dokumen = 'lkai';
	public $tipe_dokumen = 'LKAI';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'chain_id',
		'flag_lpti',
		'nomor_lpti',
		'tanggal_lpti',
		'flag_npi',
		'nomor_npi',
		'tanggal_npi',
		'prosedur',
		'hasil',
		'kesimpulan',
		'flag_rekom_nhi',
		'flag_rekom_ni',
		'rekomendasi_lain',
		'informasi_lain',
		'tujuan',
		'keputusan_pejabat',
		'catatan_pejabat',
		'tanggal_terima_pejabat',
		'keputusan_atasan',
		'catatan_atasan',
		'tanggal_terima_atasan',
		'kode_status',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
		'tanggal_lpti' => 'date',
		'tanggal_npi' => 'date',
		'tanggal_terima_pejabat' => 'date',
		'tanggal_terima_atasan' => 'date',
	];
}
