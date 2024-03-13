<?php

namespace App\Models\Intelijen;

use App\Models\Dokumen;

class DokLkaiN extends Dokumen
{
	protected $table = 'dok_lkain';
	public $kode_dokumen = 'lkain';
	public $tipe_dokumen = 'LKAI-N';
	public $kode_lppi = 'lppin';
	public $kode_lpti = 'lptin';
	public $tipe_lpti = 'LPTI-N';
	public $kode_npi = 'npin';
	public $tipe_npi = 'NPI-N';
	public $kode_nhi = 'nhin';
	public $kode_ni = 'nin';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'chain_id',
		'nomor_lptin',
		'tanggal_lptin',
		'nomor_npin',
		'tanggal_npin',
		'informasi',
		'prosedur',
		'hasil',
		'kesimpulan',
		'flag_rekom_nhin',
		'flag_rekom_nin',
		'rekomendasi_lain',
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
		'tanggal_lptin' => 'date',
		'tanggal_npin' => 'date',
		'tanggal_terima_pejabat' => 'date',
		'tanggal_terima_atasan' => 'date',
	];
}
