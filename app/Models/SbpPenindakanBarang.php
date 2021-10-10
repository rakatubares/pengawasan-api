<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SbpPenindakanBarang extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $fillable = [
		'sbp_id',
		'jumlah_kemasan',
		'satuan_kemasan',
		'jns_dok',
		'no_dok',
		'tgl_dok',
		'pemilik'
	];

	protected $casts = [
		'tgl_dok' => 'date'
	];

	public function sbpHeader()
	{
		return $this->belongsTo(SbpHeader::class, 'sbp_id');
	}

	public function detailBarang()
	{
		return $this->hasMany(SbpBarangDetail::class, 'sbp_barang_id');
	}
}
