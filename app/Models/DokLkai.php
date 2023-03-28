<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokLkai extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'dok_lkai';
	protected $tipe_lkai = 'lkai';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'flag_lpti',
		'nomor_lpti',
		'tanggal_lpti',
		'flag_npi',
		'nomor_npi',
		'tanggal_npi',
		'prosedur',
		'hasil',
		'kesimpulan',
		'flag_rekom_nhi',
		'flag_rekom_ni',
		'rekomendasi_lain',
		'informasi_lain',
		'tujuan',
		'analis_id',
		'keputusan_pejabat',
		'catatan_pejabat',
		'tanggal_terima_pejabat',
		'kode_pejabat',
		'plh_pejabat',
		'pejabat_id',
		'keputusan_atasan',
		'catatan_atasan',
		'tanggal_terima_atasan',
		'kode_atasan',
		'plh_atasan',
		'atasan_id',
		'kode_status',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
		'tanggal_lpti' => 'date',
		'tanggal_npi' => 'date',
		'tanggal_terima_pejabat' => 'date',
		'tanggal_terima_atasan' => 'date',
	];

	public function intelijen()
	{
		return $this->hasOneThrough(
			Intelijen::class,
			ObjectRelation::class,
			'object2_id',
			'id',
			'id',
			'object1_id'
		)->where(
			'object1_type',
			'intelijen'
		)->where(
			'object2_type',
			$this->tipe_lkai
		);
	}

	/**
	 * Detail analis
	 */
	public function analis()
	{
		return $this->belongsTo(RefUserCache::class, 'analis_id');
	}

	/**
	 * Detail pejabat
	 */
	public function pejabat()
	{
		return $this->belongsTo(RefUserCache::class, 'pejabat_id');
	}

	public function jabatan_pejabat()
	{
		return $this->belongsTo(RefJabatan::class, 'kode_pejabat', 'kode');
	}

	/**
	 * Detail atasan
	 */
	public function atasan()
	{
		return $this->belongsTo(RefUserCache::class, 'atasan_id');
	}

	public function jabatan_atasan()
	{
		return $this->belongsTo(RefJabatan::class, 'kode_atasan', 'kode');
	}

	/**
	 * Status dokumen
	 */
	public function status()
	{
		return $this->belongsTo(RefStatus::class, 'kode_status', 'kode_status');
	}
}
