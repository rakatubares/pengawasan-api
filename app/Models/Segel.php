<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Segel extends Model
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
		'lokasi_segel',
		'nama_pemilik',
		'alamat_pemilik',
		'pekerjaan_pemilik',
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

	public function status()
	{
		return $this->belongsTo(RefStatus::class, 'kode_status', 'kode_status');
	}
}
