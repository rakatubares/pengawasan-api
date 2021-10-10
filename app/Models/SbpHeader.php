<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SbpHeader extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $fillable = [
		'no_sbp',
		'agenda_sbp',
		'thn_sbp',
		'no_sbp_lengkap',
		'tgl_sbp',
		'no_sprint',
		'tgl_sprint',
		'penindakan_sarkut',
		'penindakan_barang',
		'penindakan_bangunan',
		'penindakan_badan',
		'lokasi_penindakan',
		'uraian_penindakan',
		'alasan_penindakan',
		'jenis_pelanggaran',
		'wkt_mulai_penindakan',
		'wkt_selesai_penindakan',
		'hal_terjadi',
		'nama_pemilik',
		'pejabat1',
		'pejabat2'
	];

	protected $casts = [
		'tgl_sbp' => 'date',
		'tgl_sprint' => 'date',
		'wkt_mulai_penindakan' => 'datetime',
		'wkt_selesai_penindakan' => 'datetime',
	];

	public function penindakanSarkut()
	{
		return $this->hasOne(SbpPenindakanSarkut::class, 'sbp_id');
	}

	public function penindakanBarang()
	{
		return $this->hasOne(SbpPenindakanBarang::class, 'sbp_id');
	}

	public function detailBarang()
	{
		return $this->hasManyThrough(
			SbpBarangDetail::class, 
			SbpPenindakanBarang::class,
			'sbp_id',
			'sbp_barang_id',
		);
	}

	public function penindakanBangunan()
	{
		return $this->hasOne(SbpPenindakanBangunan::class, 'sbp_id');
	}

	public function penindakanBadan()
	{
		return $this->hasOne(SbpPenindakanBadan::class, 'sbp_id');
	}
}
