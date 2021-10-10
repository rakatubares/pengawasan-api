<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SbpBarangDetail extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $fillable = [
		'sbp_barang_id',
		'jumlah_barang',
		'satuan_barang',
		'uraian_barang'
	];

	public function penindakanBarang()
	{
		return $this->belongsTo(SbpPenindakanBarang::class, 'sbp_barang_id');
	}
}
