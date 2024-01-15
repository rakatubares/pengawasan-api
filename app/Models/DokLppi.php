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
	protected $tipe_lppi = 'lppi';

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
			$this->tipe_lppi
		);
	}

	/**
	 * Petugas
	 */

	function detail_petugas()
	{
		return $this->morphMany(DetailPetugas::class, 'officerable');
	}

	function penerima_informasi()
	{
		return $this->hasOneThrough(
			RefUserCache::class,
			DetailPetugas::class,
			'officerable_id',
			'nip',
			'id',
			'nip'
		)->where(
			['officerable_type', 'lppi'],
			['detail_petugas.posisi', 'penerima_informasi']
		);
	}

	function penilai_informasi()
	{
		return $this->hasOneThrough(
			RefUserCache::class,
			DetailPetugas::class,
			'officerable_id',
			'nip',
			'id',
			'nip'
		)->where(
			['officerable_type', 'lppi'],
			['detail_petugas.posisi', 'penilai_informasi']
		);
	}

	function penerima_disposisi()
	{
		return $this->hasOneThrough(
			RefUserCache::class,
			DetailPetugas::class,
			'officerable_id',
			'nip',
			'id',
			'nip'
		)->where(
			['officerable_type', 'lppi'],
			['detail_petugas.posisi', 'penerima_disposisi']
		);
	}

	function pejabat()
	{
		return $this->hasOneThrough(
			RefUserCache::class,
			DetailPetugas::class,
			'officerable_id',
			'nip',
			'id',
			'nip'
		)->where(
			['officerable_type', 'lppi'],
			['detail_petugas.posisi', 'pejabat']
		);
	}

	function jabatan()
	{
		return $this->hasOneThrough(
			RefJabatan::class,
			DetailPetugas::class,
			'officerable_id',
			'kode',
			'id',
			'kode_jabatan'
		)->where(
			['officerable_type', 'lppi'],
			['detail_petugas.posisi', 'pejabat']
		);
	}

	public function status()
	{
		return $this->belongsTo(RefStatus::class, 'kode_status', 'kode_status');
	}
}
