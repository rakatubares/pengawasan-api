<?php

namespace App\Models\Intelijen;

use App\Models\Dokumen;

class DokLppi extends Dokumen
{
	protected $table = 'dok_lppi';
	public $kode_dokumen = 'lppi';
	public $tipe_dokumen = 'LPPI';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'chain_id',
		'flag_info_internal',
		'media_info_internal',
		'tgl_terima_info_internal',
		'no_dok_info_internal',
		'tgl_dok_info_internal',
		'flag_info_eksternal',
		'media_info_eksternal',
		'tgl_terima_info_eksternal',
		'no_dok_info_eksternal',
		'tgl_dok_info_eksternal',
		'kesimpulan',
		'tanggal_disposisi',
		'flag_analisis',
		'flag_arsip',
		'catatan',
		'kode_status',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
		'tgl_terima_info_internal' => 'date',
		'tgl_dok_info_internal' => 'date',
		'tgl_terima_info_eksternal' => 'date',
		'tgl_dok_info_eksternal' => 'date',
		'tanggal_disposisi' => 'date',
	];

	public function informasi()
	{
		return $this->morphMany(DokLppiInformasi::class, 'infoable');
	}
}
