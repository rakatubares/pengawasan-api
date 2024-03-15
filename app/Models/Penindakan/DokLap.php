<?php

namespace App\Models\Penindakan;

use App\Models\Dokumen;
use App\Models\References\RefKategoriPelanggaran;
use App\Models\References\RefSkemaPenindakan;

class DokLap extends Dokumen
{
	protected $table = 'dok_lap';
	public $kode_dokumen = 'lap';
	public $tipe_dokumen = 'LAP';
	public $kode_nhi = 'nhi';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'chain_id',
		'jenis_sumber',
		'nomor_sumber',
		'tanggal_sumber',
		'dugaan_pelanggaran_id',
		'flag_pelaku',
		'keterangan_pelaku',
		'flag_pelanggaran',
		'keterangan_pelanggaran',
		'flag_locus',
		'keterangan_locus',
		'flag_tempus',
		'keterangan_tempus',
		'flag_kewenangan',
		'keterangan_kewenangan',
		'flag_sdm',
		'keterangan_sdm',
		'flag_sarpras',
		'keterangan_sarpras',
		'flag_anggaran',
		'keterangan_anggaran',
		'flag_layak_penindakan',
		'skema_penindakan_id',
		'keterangan_skema_penindakan',
		'flag_layak_patroli',
		'keterangan_patroli',
		'kesimpulan',
		'kode_status',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
		'tanggal_sumber' => 'date'
	];

	/**
	 * Kategori pelanggaran
	 */
	public function dugaan_pelanggaran()
	{
		return $this->belongsTo(RefKategoriPelanggaran::class, 'dugaan_pelanggaran_id');
	}

	/**
	 * Skema penindakan
	 */
	public function skema_penindakan()
	{
		return $this->belongsTo(RefSkemaPenindakan::class, 'skema_penindakan_id');
	}
}
