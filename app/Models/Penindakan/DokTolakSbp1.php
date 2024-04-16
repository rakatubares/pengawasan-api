<?php

namespace App\Models\Penindakan;

use App\Models\Dokumen;

class DokTolakSbp1 extends Dokumen
{
	protected $table = 'dok_tolak_sbp1';
	public $kode_dokumen = 'tolak1';
	public $tipe_dokumen = 'BA';
	public $agenda_dokumen = '/Tolak 1/KPU.305/';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'parent_type',
		'parent_id',
		'alasan',
		'kode_status',
		'status_tolak'
	];

	protected $casts = [
		'tanggal_dokumen' => 'date'
	];

	public function tolakable() 
	{
		return $this->morphTo(__FUNCTION__, 'parent_type', 'parent_id');
	}

	public function tolak2() 
	{
		return $this->hasOne(DokTolakSbp2::class, 'tolak1_id');
	}
}
