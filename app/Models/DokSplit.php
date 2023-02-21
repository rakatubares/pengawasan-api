<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokSplit extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'dok_split';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'dugaan_pelanggaran',
		'kode_jabatan',
		'plh',
		'pejabat_id',
		'kode_status',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
	];

	/**
	 * Relation to LPF
	 */
	public function lpf()
	{
		return $this->hasOneThrough(
			DokLpf::class,
			ObjectRelation::class,
			'object2_id',
			'id',
			'id',
			'object1_id'
		)->where(
			'object1_type',
			'lpf'
		)->where(
			'object2_type',
			'split'
		);
	}

	/**
	 * Petugas
	 */
	public function petugas()
	{
		return $this->morphToMany(RefUserCache::class, 'officerable', 'detail_petugas', 'officerable_id', 'petugas_id')
			->wherePivot('position', 'petugas')
			->wherePivotNull('deleted_at')
			->orderByPivot('no_urut')
			->withTimestamps();
	}

	public function pejabat()
	{
		return $this->belongsTo(RefUserCache::class, 'pejabat_id');
	}

	public function jabatan()
	{
		return $this->belongsTo(RefJabatan::class, 'kode_jabatan', 'kode');
	}

	/**
	 * Status dokumen
	 */
	public function status()
	{
		return $this->belongsTo(RefStatus::class, 'kode_status', 'kode_status');
	}

	/**
	 * Uraian tembusan
	 */
	public function tembusan()
	{
		return $this->morphToMany(RefTembusan::class, 'cc_able', 'tembusan', 'cc_able_id', 'tembusan_id')
			->wherePivotNull('deleted_at')
			->orderByPivot('no_urut')
			->withTimestamps();
	}
}
