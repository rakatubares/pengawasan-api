<?php

namespace App\Models\Penindakan;

use App\Models\Dokumen;

class DokRiksaBadan extends Dokumen
{
	protected $table = 'dok_riksa_badan';
	public $kode_dokumen = 'riksa_badan';
	public $tipe_dokumen = 'BA';
	public $agenda_dokumen = '/Badan/KPU.305/';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'chain_id',
		'uraian_pemeriksaan',
		'hasil_pemeriksaan',
		'kode_status',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
	];

	/**
	 * Detail orang yg bepergian bersama
	 */
	public function pendamping()
	{
		return $this->belongsTo(EntitasOrang::class, 'pendamping_id');
	}
}
