<?php

namespace App\Models\Penindakan;

use App\Models\Dokumen;
use App\Models\Entitas\EntitasOrang;
use App\Models\Sprint;

class DokBukaSegel extends Dokumen
{
	protected $table = 'dok_buka_segel';
	public $kode_dokumen = 'buka_segel';
	public $tipe_dokumen = 'BA';
	public $agenda_dokumen = '/Buka Segel/KPU.305/';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'chain_id',
		'sprint_id',
		'tanggal_buka_segel',
		'asal_segel',
		'jenis_segel',
		'jumlah_segel',
		'satuan_segel',
		'nomor_segel',
		'tanggal_segel',
		'tempat_segel',
		'saksi_id',
		'kode_status',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
		'tanggal_buka_segel' => 'date',
		'tanggal_segel' => 'date',
	];

	public function sprint()
	{
		return $this->belongsTo(Sprint::class, 'sprint_id');
	}

	public function saksi()
	{
		return $this->belongsTo(EntitasOrang::class, 'saksi_id');
	}
}
