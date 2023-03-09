<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokLhp extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'dok_lhp';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'kesimpulan',
		'alternatif_penyelesaian',
		'informasi_lain',
		'catatan',
		'peneliti_id',
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
	 * Relation to SPLIT
	 */
	public function split()
	{
		return $this->hasOneThrough(
			DokSplit::class,
			ObjectRelation::class,
			'object2_id',
			'id',
			'id',
			'object1_id'
		)->where(
			'object1_type',
			'split'
		)->where(
			'object2_type',
			'lhp'
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
	 * Detail petugas
	 */
	public function peneliti()
	{
		return $this->belongsTo(RefUserCache::class, 'peneliti_id');
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
