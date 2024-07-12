<?php

namespace App\Models\Intelijen;

use App\Models\Dokumen;

class DokLkai extends Dokumen
{
	protected $table = 'dok_lkai';
	public $kodeDokumen = 'lkai';
	public $tipeDokumen = 'LKAI';
	public $kodeLppi = 'lppi';
	public $kodeLpti = 'lpti';
	public $tipeLpti = 'LPTI';
	public $kodeNpi = 'npi';
	public $tipeNpi = 'NPI';
	public $kodeNhi = 'nhi';
	public $kodeNi = 'ni';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'chain_id',
		'nomor_lpti',
		'tanggal_lpti',
		'nomor_npi',
		'tanggal_npi',
		'informasi',
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
		'status_tindak_lanjut',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
		'tanggal_lpti' => 'date',
		'tanggal_npi' => 'date',
		'tanggal_terima_pejabat' => 'date',
		'tanggal_terima_atasan' => 'date',
	];
}
