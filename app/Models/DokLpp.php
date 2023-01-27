<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokLpp extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'dok_lpp';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'asal_perkara',
		'jenis_penindakan',
		'jenis_perkara',
		'catatan',
		'petugas_id',
		'kode_jabatan1',
		'plh1',
		'pejabat1_id',
		'kode_jabatan2',
		'plh2',
		'pejabat2_id',
		'kode_status',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
	];

	/**
	 * Relation to main penyidikan object
	 */
	public function penyidikan()
	{
		return $this->hasOneThrough(
			Penyidikan::class,
			ObjectRelation::class,
			'object2_id',
			'id',
			'id',
			'object1_id'
		)->where(
			'object1_type',
			'penyidikan'
		)->where(
			'object2_type',
			'lpp'
		);
	}

	/**
	 * Detail petugas
	 */
	public function petugas()
	{
		return $this->belongsTo(RefUserCache::class, 'petugas_id');
	}

	public function pejabat1()
	{
		return $this->belongsTo(RefUserCache::class, 'pejabat1_id');
	}

	public function jabatan1()
	{
		return $this->belongsTo(RefJabatan::class, 'kode_jabatan1', 'kode');
	}

	public function pejabat2()
	{
		return $this->belongsTo(RefUserCache::class, 'pejabat2_id');
	}

	public function jabatan2()
	{
		return $this->belongsTo(RefJabatan::class, 'kode_jabatan2', 'kode');
	}

	/**
	 * Status dokumen
	 */
	public function status()
	{
		return $this->belongsTo(RefStatus::class, 'kode_status', 'kode_status');
	}
}
