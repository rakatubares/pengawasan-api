<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BukaSegel extends Model
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
		'jenis_segel',
		'jumlah_segel',
		'nomor_segel',
		'tempat_segel',
		'nama_saksi',
		'alamat_saksi',
		'pekerjaan_saksi',
		'jns_identitas',
		'no_identitas',
		'pejabat1',
		'pejabat2',
		'kode_status'
	];

	protected $casts = [
		'tgl_dok' => 'date',
		'tgl_sprint' => 'date',
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
		)->where('barangable_type', BukaSegel::class);
	}

	public function bangunan()
	{
		return $this->morphOne(DetailBangunan::class, 'bangunanable');
	}

	public function status()
	{
		return $this->belongsTo(RefStatus::class, 'kode_status', 'kode_status');
	}
}
