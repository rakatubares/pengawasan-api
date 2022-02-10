<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokTolakSbp1 extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'dok_tolak_sbp1';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'sprint_id',
		'alasan',
		'petugas1_id',
		'petugas2_id',
		'kode_status',
		'status_tolak'
	];

	protected $casts = [
		'tanggal_dokumen' => 'date'
	];

	public function sbp()
	{
		return $this->hasOneThrough(
			DokSbp::class,
			ObjectRelation::class,
			'object2_id',
			'id',
			'id',
			'object1_id'
		)->where(
			'object1_type',
			'sbp'
		)->where(
			'object2_type',
			'tolak1'
		);
	}

	public function tolak2()
	{
		return $this->hasOneThrough(
			DokTolakSbp2::class,
			ObjectRelation::class,
			'object1_id',
			'id',
			'id',
			'object2_id'
		)->where(
			'object1_type',
			'tolak1'
		)->where(
			'object2_type',
			'tolak2'
		);
	}

	public function sprint()
	{
		return $this->belongsTo(RefSprint::class, 'sprint_id');
	}

	public function petugas1()
	{
		return $this->belongsTo(RefUserCache::class, 'petugas1_id');
	}

	public function petugas2()
	{
		return $this->belongsTo(RefUserCache::class, 'petugas2_id');
	}

	public function status()
	{
		return $this->belongsTo(RefStatus::class, 'kode_status', 'kode_status');
	}
}
