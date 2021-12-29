<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokPengaman extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'dok_pengaman';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'alasan_pengamanan',
		'keterangan',
		'jenis_pengaman',
		'jumlah_pengaman',
		'satuan_pengaman',
		'nomor_pengaman',
		'tempat_pengaman',
		'kode_status'
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
			'pengaman'
		);
	}

	public function status()
	{
		return $this->belongsTo(RefStatus::class, 'kode_status', 'kode_status');
	}
}
