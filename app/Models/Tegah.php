<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tegah extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'tegah';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tgl_dok',
		'sprint_id',
		'detail_sarkut',
		'detail_barang',
		'saksi_id',
		'petugas1_id',
		'petugas2_id',
		'kode_status'
	];

	protected $casts = [
		'tgl_dok' => 'date',
	];

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
		)->where('parent_type', Tegah::class);
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
