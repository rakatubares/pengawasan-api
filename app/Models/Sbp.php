<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sbp extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tgl_dok',
		'no_sprint',
		'tgl_sprint',
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
		'nama_pemilik',
		'pejabat1',
		'pejabat2',
		'kode_status'
	];

	protected $casts = [
		'tgl_dok' => 'date',
		'tgl_sprint' => 'date',
		'wkt_mulai_penindakan' => 'datetime',
		'wkt_selesai_penindakan' => 'datetime',
	];

	public function sarkut()
	{
		return $this->morphOne(DetailSarkut::class, 'sarkutable');
	}

	public function barang()
	{
		return $this->morphOne(DetailBarang::class, 'barangable');
	}

	public function itemBarang()
	{
		return $this->hasManyThrough(
			DetailBarangItem::class,
			DetailBarang::class,
			'barangable_id',
			'detail_barang_id'
		)->where('barangable_type', Sbp::class);
	}

	public function bangunan()
	{
		return $this->morphOne(DetailBangunan::class, 'bangunanable');
	}

	public function badan()
	{
		return $this->morphOne(DetailBadan::class, 'badanable');
	}

	public function status()
	{
		return $this->belongsTo(RefStatus::class, 'kode_status', 'kode_status');
	}
}
