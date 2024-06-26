<?php

namespace App\Models\Penyidikan;

use App\Models\Dokumen;
use App\Models\References\RefKategoriPelanggaran;

class DokLpp extends Dokumen
{
	protected $table = 'dok_lpp';
	public $kode_dokumen = 'lpp';
	public $tipe_dokumen = 'LPP';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'chain_id',
		'asal_perkara',
		'jenis_penindakan',
		'jenis_perkara_id',
		'catatan',
		'kode_status',
		'status_tindak_lanjut',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
	];

	/**
	 * Jenis perkara
	 */
	public function jenis_perkara()
	{
		return $this->belongsTo(RefKategoriPelanggaran::class, 'jenis_perkara_id');
	}
}
