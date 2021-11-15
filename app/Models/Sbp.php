<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sbp extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'sbp';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tgl_dok',
		'sprint_id',
		'detail_sarkut',
		'detail_barang',
		'detail_bangunan',
		'detail_badan',
		'lokasi_penindakan',
		'uraian_penindakan',
		'alasan_penindakan',
		'jenis_pelanggaran',
		'wkt_mulai_penindakan',
		'wkt_selesai_penindakan',
		'hal_terjadi',
		'saksi_id',
		'pejabat1',
		'pejabat2',
		'kode_status'
	];

	protected $casts = [
		'tgl_dok' => 'date',
		'wkt_mulai_penindakan' => 'datetime',
		'wkt_selesai_penindakan' => 'datetime',
	];

	public function sarkut()
	{
		return $this->morphOne(DetailSarkut::class, 'vehicleable');
	}

	public function barang()
	{
		return $this->morphOne(DetailBarang::class, 'goodsable');
	}

	public function itemBarang()
	{
		return $this->hasManyThrough(
			DetailBarangItem::class,
			DetailBarang::class,
			'goodsable_id',
			'detail_barang_id'
		)->where('goodsable_type', Sbp::class);
	}

	public function bangunan()
	{
		return $this->morphOne(DetailBangunan::class, 'buildingable');
	}

	public function badan()
	{
		return $this->morphOne(DetailBadan::class, 'bodyable');
	}

	public function sprint()
	{
		return $this->belongsTo(RefSprint::class, 'sprint_id');
	}

	public function saksi()
	{
		return $this->belongsTo(RefEntitas::class, 'saksi_id');
	}

	public function status()
	{
		return $this->belongsTo(RefStatus::class, 'kode_status', 'kode_status');
	}
}