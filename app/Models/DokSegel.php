<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokSegel extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'dok_segel';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'jenis_segel',
		'jumlah_segel',
		'satuan_segel',
		'nomor_segel',
		'tempat_segel',
		'kode_status'
	];

	protected $casts = [
		'tgl_dok' => 'date',
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
			'segel'
		);
	}

	public function titip()
	{
		return $this->hasOneThrough(
			DokTitip::class,
			ObjectRelation::class,
			'object1_id',
			'id',
			'id',
			'object2_id'
		)->where(
			'object1_type',
			'segel'
		)->where(
			'object2_type',
			'titip'
		);
	}

	public function status()
	{
		return $this->belongsTo(RefStatus::class, 'kode_status', 'kode_status');
	}
}
