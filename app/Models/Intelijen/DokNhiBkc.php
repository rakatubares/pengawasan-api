<?php

namespace App\Models\Intelijen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokNhiBkc extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'dok_nhi_bkc';

	protected $fillable = [
		'tempat_penimbunan',
		'penyalur',
		'tempat_penjualan',
		'nppbkc',
		'nama_sarkut',
		'nomor_sarkut',
		'data_lain',
	];

	public function nhi() {
		return $this->morphOne(DokNhi::class, 'detail');
	}
}
