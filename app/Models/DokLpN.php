<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokLpN extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'dok_lpn';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'sprint_id',
		'kesimpulan',
		'kode_jabatan_penyusun',
		'plh_penyusun',
		'penyusun_id',
		'kode_jabatan_penerbit',
		'plh_penerbit',
		'penerbit_id',
		'kode_status'
	];

	protected $casts = [
		'tanggal_dokumen' => 'date'
	];

	public function lphp()
	{
		return $this->hasOneThrough(
			DokLphpN::class,
			ObjectRelation::class,
			'object2_id',
			'id',
			'id',
			'object1_id'
		)->where(
			'object1_type',
			'lphpn'
		)->where(
			'object2_type',
			'lpn'
		);
	}

	/**
	 * Sprint
	 */
	public function sprint()
	{
		return $this->belongsTo(RefSprint::class, 'sprint_id');
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

	public function penerbit()
	{
		return $this->belongsTo(RefUserCache::class, 'penerbit_id');
	}

	public function jabatan_penerbit()
	{
		return $this->belongsTo(RefJabatan::class, 'kode_jabatan_penerbit', 'kode');
	}

	/**
	 * Status dokumen
	 */
	public function status()
	{
		return $this->belongsTo(RefStatus::class, 'kode_status', 'kode_status');
	}
}
