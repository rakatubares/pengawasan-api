<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokLrp extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'dok_lrp';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'no_lk',
		'tanggal_lk',
		'no_sptp',
		'tanggal_sptp',
		'no_spdp',
		'tanggal_spdp',
		'alat_bukti_surat',
		'alat_bukti_petunjuk',
		'alternatif_penyelesaian',
		'informasi_lain',
		'catatan',
		'penyidik_id',
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
		'tanggal_lk' => 'date',
		'tanggal_sptp' => 'date',
		'tanggal_spdp' => 'date',
	];

	/**
	 * Relation to LHP
	 */
	public function lhp()
	{
		return $this->hasOneThrough(
			DokLhp::class,
			ObjectRelation::class,
			'object2_id',
			'id',
			'id',
			'object1_id'
		)->where(
			'object1_type',
			'lhp'
		)->where(
			'object2_type',
			'lrp'
		);
	}

	/**
	 * Saksi
	 */
	public function saksi()
	{
		return $this->morphToMany(RefEntitas::class, 'entityable', 'detail_entitas', 'entityable_id', 'entity_id')
			->wherePivot('position', 'saksi')
			->wherePivotNull('deleted_at')
			->withTimestamps();
	}

	/**
	 * Ahli
	 */
	public function ahli()
	{
		return $this->morphToMany(RefEntitas::class, 'entityable', 'detail_entitas', 'entityable_id', 'entity_id')
			->wherePivot('position', 'ahli')
			->wherePivotNull('deleted_at')
			->withTimestamps();
	}

	/**
	 * Detail petugas
	 */
	public function penyidik()
	{
		return $this->belongsTo(RefUserCache::class, 'penyidik_id');
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
