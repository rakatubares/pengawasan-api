<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokLap extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'dok_lap';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
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
		'kode_jabatan_penerbit',
		'plh_penerbit',
		'penerbit_id',
		'kode_jabatan_atasan',
		'plh_atasan',
		'atasan_id',
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

	/**
	 * Detail pejabat
	 */
	public function penerbit()
	{
		return $this->belongsTo(RefUserCache::class, 'penerbit_id');
	}

	public function jabatan_penerbit()
	{
		return $this->belongsTo(RefJabatan::class, 'kode_jabatan_penerbit', 'kode');
	}

	public function atasan()
	{
		return $this->belongsTo(RefUserCache::class, 'atasan_id');
	}

	public function jabatan_atasan()
	{
		return $this->belongsTo(RefJabatan::class, 'kode_jabatan_atasan', 'kode');
	}

	/**
	 * Status dokumen
	 */
	public function status()
	{
		return $this->belongsTo(RefStatus::class, 'kode_status', 'kode_status');
	}
}
