<?php

namespace App\Models\Penindakan;

use App\Models\Dokumen;
use App\Models\Entitas\EntitasOrang;

class DokTolakSbp2 extends Dokumen
{
	protected $table = 'dok_tolak_sbp2';
	public $kode_dokumen = 'tolak2';
	public $tipe_dokumen = 'BA';
	public $agenda_dokumen = '/Tolak 2/KPU.305/';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'chain_id',
		'tolak1_id',
		'alasan',
		'saksi_id',
		'kode_status'
	];

	protected $casts = [
		'tanggal_dokumen' => 'date'
	];

	public function tolak1() 
	{
		return $this->belongsTo(DokTolakSbp1::class, 'tolak1_id');
	}

	public function saksi()
	{
		return $this->belongsTo(EntitasOrang::class, 'saksi_id');
	}
}
