<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokLppi extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'dok_lppi';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
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
		'penerima_info_id',
		'penilai_info_id',
		'kesimpulan',
		'disposisi_id',
		'tanggal_disposisi',
		'flag_analisis',
		'flag_arsip',
		'catatan',
		'kode_jabatan',
		'plh',
		'pejabat_id',
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
			'lppi'
		);
	}

	/**
	 * Detail penerima info
	 */
	public function penerima_info()
	{
		return $this->belongsTo(RefUserCache::class, 'penerima_info_id');
	}

	/**
	 * Detail penilai info
	 */
	public function penilai_info()
	{
		return $this->belongsTo(RefUserCache::class, 'penilai_info_id');
	}

	/**
	 * Detail tujuan disposisi
	 */
	public function disposisi()
	{
		return $this->belongsTo(RefUserCache::class, 'disposisi_id');
	}

	/**
	 * Detail pejabat
	 */
	public function pejabat()
	{
		return $this->belongsTo(RefUserCache::class, 'pejabat_id');
	}

	public function jabatan()
	{
		return $this->belongsTo(RefJabatan::class, 'kode_jabatan', 'kode');
	}

	public function status()
	{
		return $this->belongsTo(RefStatus::class, 'kode_status', 'kode_status');
	}
}
