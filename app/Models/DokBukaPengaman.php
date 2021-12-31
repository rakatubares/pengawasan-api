<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokBukaPengaman extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'dok_buka_pengaman';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'tanggal_dokumen',
		'no_dok_lengkap',
		'sprint_id',
		'jenis_pengaman',
		'jumlah_pengaman',
		'satuan_pengaman',
		'nomor_pengaman',
		'tanggal_pengaman',
		'tempat_pengaman',
		'dasar_pengaman',
		'saksi_id',
		'petugas1_id',
		'petugas2_id',
		'kode_status'
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
		'tanggal_pengaman' => 'date'
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
			'bukapengaman'
		);
	}

	public function sprint()
	{
		return $this->belongsTo(RefSprint::class, 'sprint_id');
	}

	public function saksi()
	{
		return $this->belongsTo(RefEntitas::class, 'saksi_id');
	}

	public function petugas1()
	{
		return $this->belongsTo(RefUserCache::class, 'petugas1_id', 'user_id');
	}

	public function petugas2()
	{
		return $this->belongsTo(RefUserCache::class, 'petugas2_id', 'user_id');
	}

	public function status()
	{
		return $this->belongsTo(RefStatus::class, 'kode_status', 'kode_status');
	}
}
