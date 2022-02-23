<?php

namespace App\Models;

use App\Traits\SwitcherTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokSbp extends Model
{
    use HasFactory;
	use SoftDeletes;
	use SwitcherTrait;

	protected $table = 'dok_sbp';
	protected $tipe_sbp = 'sbp';
	protected $tipe_lptp = 'lptp';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'penindakan_id',
		'uraian_penindakan',
		'alasan_penindakan',
		'jenis_pelanggaran',
		'wkt_mulai_penindakan',
		'wkt_selesai_penindakan',
		'hal_terjadi',
		'kode_status',
		'status_tolak'
	];

	protected $casts = [
		'wkt_mulai_penindakan' => 'datetime',
		'wkt_selesai_penindakan' => 'datetime',
	];

	/**
	 * Relation to main penindakan object
	 */
	public function penindakan()
	{
		return $this->hasOneThrough(
			Penindakan::class,
			ObjectRelation::class,
			'object2_id',
			'id',
			'id',
			'object1_id'
		)->where(
			'object1_type',
			'penindakan'
		)->where(
			'object2_type',
			$this->tipe_sbp
		);
	}

	/**
	 * Relations to other objects
	 */
	public function relations()
	{
		return $this->hasMany(
			ObjectRelation::class, 
			'object1_id', 
			'id'
		)->where(
			'object1_type',
			$this->tipe_sbp
		);
	}

	/**
	 * Relation to LPTP through object relation model
	 */
	public function lptp()
	{
		$lptp_model = $this->switchObject($this->tipe_lptp, 'model');

		return $this->hasOneThrough(
			$lptp_model,
			ObjectRelation::class,
			'object1_id',
			'id',
			'id',
			'object2_id'
		)->where(
			'object1_type',
			$this->tipe_sbp
		)->where(
			'object2_type',
			$this->tipe_lptp
		);
	}

	/**
	 * Relation to Penolakan SBP through object relation model
	 */
	public function tolak1()
	{
		return $this->hasOneThrough(
			DokTolakSbp1::class,
			ObjectRelation::class,
			'object1_id',
			'id',
			'id',
			'object2_id'
		)->where(
			'object1_type',
			$this->tipe_sbp
		)->where(
			'object2_type',
			'tolak1'
		);
	}

	public function status()
	{
		return $this->belongsTo(RefStatus::class, 'kode_status', 'kode_status');
	}
}