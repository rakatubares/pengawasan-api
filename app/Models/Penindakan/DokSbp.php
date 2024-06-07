<?php

namespace App\Models\Penindakan;

use App\Models\Dokumen;

class DokSbp extends Dokumen
{
	protected $table = 'dok_sbp';
	public $kode_dokumen = 'sbp';
	public $tipe_dokumen = 'SBP';
	public $kode_nhi = 'nhi';
	public $kode_lap = 'lap';
	public $kode_lptp = 'lptp';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'chain_id',
		'kode_status',
		'status_tindak_lanjut',
		'status_tolak',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
	];

	public function tolak1() 
	{
		return $this->morphOne(DokTolakSbp1::class, 'parent');
	}
}