<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokLphp extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'dok_lphp';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'analisa',
		'catatan',
		'kode_jabatan_penyusun',
		'plh_penyusun',
		'penyusun_id',
		'kode_jabatan_atasan',
		'plh_atasan',
		'atasan_id',
		'kode_status'
	];

	protected $casts = [
		'tanggal_dokumen' => 'date'
	];

	public function lptp()
	{
		return $this->hasOneThrough(
			DokLptp::class,
			ObjectRelation::class,
			'object2_id',
			'id',
			'id',
			'object1_id'
		)->where(
			'object1_type',
			'lptp'
		)->where(
			'object2_type',
			'lphp'
		);
	}

	/**
	 * Detail pejabat
	 */
	public function penyusun()
	{
		return $this->belongsTo(RefUserCache::class, 'penyusun_id');
	}

	public function jabatan_penyusun()
	{
		return $this->belongsTo(RefJabatan::class, 'kode_jabatan_penyusun', 'kode');
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
