<?php

namespace App\Models\Penindakan;

use App\Models\Dokumen;
use App\Models\Entitas\EntitasOrang;
use App\Models\Sprint;

class DokBukaPengaman extends Dokumen
{
	protected $table = 'dok_buka_pengaman';
	public $kodeDokumen = 'buka_pengaman';
	public $tipeDokumen = 'BA';
	public $agendaDokumen = '/Buka Pengaman/KPU.305/';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'chain_id',
		'sprint_id',
		'tanggal_buka_pengaman',
		'asal_pengaman',
		'jenis_pengaman',
		'jumlah_pengaman',
		'satuan_pengaman',
		'nomor_pengaman',
		'tanggal_pengaman',
		'tempat_pengaman',
		'dasar_pengamanan',
		'saksi_id',
		'kode_status'
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
		'tanggal_buka_pengaman' => 'date',
		'tanggal_pengaman' => 'date',
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
