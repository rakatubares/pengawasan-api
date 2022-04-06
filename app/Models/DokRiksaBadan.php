<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokRiksaBadan extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'dok_riksa_badan';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'asal',
		'tujuan',
		'pendamping_id',
		'sarkut_id',
		'uraian_pemeriksaan',
		'hasil_pemeriksaan',
		'kode_status',
	];

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
			'riksabadan'
		);
	}

	/**
	 * Detail orang yg bepergian bersama
	 */
	public function pendamping()
	{
		return $this->belongsTo(RefEntitas::class, 'pendamping_id');
	}

	/**
	 * Detail sarana pengangkut yg digunakan orang yg diperiksa
	 */
	public function sarkut()
	{
		return $this->belongsTo(DetailSarkut::class, 'sarkut_id');
	}

	/**
	 * MorphOne ke dokumen
	 */
	public function dokumen()
	{
		return $this->morphOne(DetailDokumen::class, 'parent');
	}

	/**
	 * Detail status
	 */
	public function status()
	{
		return $this->belongsTo(RefStatus::class, 'kode_status', 'kode_status');
	}
}
