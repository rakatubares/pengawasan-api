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
		'grup_lokasi_id',
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
	 * Grup lokasi
	 */
	public function grup_lokasi()
	{
		return $this->belongsTo(RefLokasi::class, 'grup_lokasi_id');
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
	 * LAP
	 */
	public function lap()
	{
		return $this->hasOneThrough(
			DokLap::class,
			ObjectRelation::class,
			'object2_id',
			'id',
			'id',
			'object1_id'
		)->where(
			'object1_type',
			'lap'
		)->where(
			'object2_type',
			'penindakan'
		);
	}

	/**
	 * LAP-N
	 */
	public function lapn()
	{
		return $this->hasOneThrough(
			DokLapN::class,
			ObjectRelation::class,
			'object2_id',
			'id',
			'id',
			'object1_id'
		)->where(
			'object1_type',
			'lapn'
		)->where(
			'object2_type',
			'penindakan'
		);
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

	public function sbp_relation()
	{
		return $this->hasOne(
			ObjectRelation::class, 'object1_id'
		)->whereIn('object2_type', ['sbp', 'sbpn']);
	}

	/**
	 * SBP
	 */
	public function sbp()
	{
		return $this->hasOneThrough(
			DokSbp::class,
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
			'sbp'
		);
	}

	/**
	 * SBP-N
	 */
	public function sbpn()
	{
		return $this->hasOneThrough(
			DokSbpN::class,
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
			'sbpn'
		);
	}

	/**
	 * BA Pemeriksaan
	 */
	public function riksa()
	{
		return $this->hasOneThrough(
			DokRiksa::class,
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
			'riksa'
		);
	}

	/**
	 * BA Pemeriksaan Badan
	 */
	public function riksabadan()
	{
		return $this->hasOneThrough(
			DokRiksaBadan::class,
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
			'riksabadan'
		);
	}

	/**
	 * BA Penegahan
	 */
	public function tegah()
	{
		return $this->hasOneThrough(
			DokTegah::class,
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
			'tegah'
		);
	}

	/**
	 * BA Penyegelan
	 */
	public function segel()
	{
		return $this->hasOneThrough(
			DokSegel::class,
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
			'segel'
		);
	}

	/**
	 * BA Buka Segel
	 */
	public function bukasegel()
	{
		return $this->hasOneThrough(
			DokBukaSegel::class,
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
			'bukasegel'
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
	 * Penyidikan
	 */
	public function penyidikan()
	{
		return $this->hasOneThrough(
			Penyidikan::class,
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
			'penyidikan'
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

			// Delete other linked documents
			if ($penindakan->sbp != null) {
				$penindakan->sbp->delete();
			}
			if ($penindakan->sbpn != null) {
				$penindakan->sbpn->delete();
			}
			if ($penindakan->segel != null) {
				$penindakan->segel->delete();
			}
			if ($penindakan->tegah != null) {
				$penindakan->tegah->delete();
			}
			if ($penindakan->riksa != null) {
				$penindakan->riksa->delete();
			}
			if ($penindakan->riksabadan != null) {
				$penindakan->riksabadan->delete();
			}
		});
	}
}
