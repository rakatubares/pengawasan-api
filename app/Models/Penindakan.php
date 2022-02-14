<?php

namespace App\Models;

use App\Traits\DokumenTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penindakan extends Model
{
	use DokumenTrait;
    use HasFactory;
	use SoftDeletes;

	protected $table = 'penindakan';

	protected $fillable = [
		'sprint_id',
		'object_type',
		'object_id',
		'tanggal_penindakan',
		'lokasi_penindakan',
		'saksi_id',
		'petugas1_id',
		'petugas2_id',
	];

	protected $casts = [
		'tanggal_penindakan' => 'date'
	];

	/**
	 * Define polymorphic properties
	 */
	public function objectable()
	{
		return $this->morphTo(__FUNCTION__, 'object_type', 'object_id');
	}

	/**
	 * Surat perintah
	 */
	public function sprint()
	{
		return $this->belongsTo(RefSprint::class, 'sprint_id');
	}

	/**
	 * Detail saksi
	 */
	public function saksi()
	{
		return $this->belongsTo(RefEntitas::class, 'saksi_id');
	}

	/**
	 * Detail petugas
	 */
	public function petugas1()
	{
		return $this->belongsTo(RefUserCache::class, 'petugas1_id');
	}

	/**
	 * Detail petugas
	 */
	public function petugas2()
	{
		return $this->belongsTo(RefUserCache::class, 'petugas2_id');
	}

	/**
	 * Dokumen
	 */
	public function dokumen()
	{
		return $this->hasMany(
			ObjectRelation::class, 
			'object1_id', 
			'id'
		)->where(
			'object1_type',
			'penindakan'
		);
	}

	/**
	 * BA Pengaman
	 */
	public function pengaman()
	{
		return $this->hasOneThrough(
			DokPengaman::class,
			ObjectRelation::class,
			'object1_id',
			'id',
			'id',
			'object2_id'
		)->where(
			'object1_type',
			'penindakan'
		)->where(
			'object2_type',
			'pengaman'
		);
	}

	/**
	 * BA Buka Pengaman
	 */
	public function bukapengaman()
	{
		return $this->hasOneThrough(
			DokBukaPengaman::class,
			ObjectRelation::class,
			'object1_id',
			'id',
			'id',
			'object2_id'
		)->where(
			'object1_type',
			'penindakan'
		)->where(
			'object2_type',
			'bukapengaman'
		);
	}

	/**
	 * The "booted" method of the model.
	 *
	 * @return void
	 */
	protected static function booted()
	{
		static::deleted(function ($penindakan) {
			// Delete objek penindakan
			if (($penindakan->object_type != null) && ($penindakan->object_type != 'orang')) {
				$penindakan->objectable->delete();
			};
		});
	}
}
