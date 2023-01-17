<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penyidikan extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'penyidikan';

	protected $fillable = [
		'jenis_pelanggaran',
		'pasal',
		'tempat_pelanggaran',
		'waktu_pelanggaran',
		'modus',
		'bhp_id',
		'pelaku_id',
		'sarkut_id',
		'status_penangkapan',
	];

	protected $casts = [
		'waktu_pelanggaran' => 'datetime'
	];

	/**
	 * Detail BHP
	 */
	public function bhp()
	{
		return $this->belongsTo(DetailBarang::class, 'bhp_id');
	}

	/**
	 * Detail orang pelaku
	 */
	public function pelaku()
	{
		return $this->belongsTo(RefEntitas::class, 'pelaku_id');
	}

	/**
	 * Detail sarana pengangkut
	 */
	public function sarkut()
	{
		return $this->belongsTo(DetailSarkut::class, 'sarkut_id');
	}

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
			'penyidikan'
		);
	}

	/**
	 * Relation to LPP through object relation model
	 */
	public function lpp()
	{
		return $this->hasOneThrough(
			DokLpp::class,
			ObjectRelation::class,
			'object1_id',
			'id',
			'id',
			'object2_id'
		)->where(
			'object1_type',
			'penyidikan'
		)->where(
			'object2_type',
			'lpp'
		);
	}
}
