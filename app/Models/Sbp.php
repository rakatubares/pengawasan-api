<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sbp extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'dok_sbp';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'penindakan_id',
		// 'tgl_dok',
		// 'sprint_id',
		// 'detail_sarkut',
		// 'detail_barang',
		// 'detail_bangunan',
		// 'detail_badan',
		// 'objek_penindakan',
		// 'lokasi_penindakan',
		'uraian_penindakan',
		'alasan_penindakan',
		'jenis_pelanggaran',
		'wkt_mulai_penindakan',
		'wkt_selesai_penindakan',
		'hal_terjadi',
		// 'saksi_id',
		// 'petugas1_id',
		// 'petugas2_id',
		'kode_status'
	];

	protected $casts = [
		// 'tgl_dok' => 'date',
		'wkt_mulai_penindakan' => 'datetime',
		'wkt_selesai_penindakan' => 'datetime',
	];

	// public function penindakan()
	// {
	// 	return $this->hasOne(Penindakan::class, 'id', 'penindakan_id');
	// }
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
			'sbp'
		);
	}

	public function sarkut()
	{
		return $this->morphOne(DetailSarkut::class, 'parent');
	}

	public function barang()
	{
		return $this->morphOne(DetailBarang::class, 'parent');
	}

	public function itemBarang()
	{
		return $this->hasManyThrough(
			DetailBarangItem::class,
			DetailBarang::class,
			'parent_id',
			'detail_barang_id'
		)->where('parent_type', Sbp::class);
	}

	public function bangunan()
	{
		return $this->morphOne(DetailBangunan::class, 'parent');
	}

	public function badan()
	{
		return $this->morphOne(DetailBadan::class, 'parent');
	}

	// public function objek()
	// {
	// 	return $this->morphTo(__FUNCTION__, 'objek_penindakan', 'objek_id');
	// }

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

	// public function segel()
	// {
	// 	return $this->hasOneThrough(
	// 		Segel::class,
	// 		DocRelation::class,
	// 		'doc2_id',
	// 		'id',
	// 		'id',
	// 		'doc1_id'
	// 	)->where(
	// 		'doc2_type',
	// 		Sbp::class
	// 	)->where(
	// 		'doc1_type',
	// 		Segel::class
	// 	);
	// }

	// public function segel()
	// {
	// 	return $this->hasOneThrough(
	// 		Segel::class,
	// 		Penindakan::class,
	// 		'id',
	// 		'penindakan_id',
	// 		'penindakan_id',
	// 		'id'
	// 	);
	// }
}