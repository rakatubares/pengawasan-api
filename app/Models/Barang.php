<?php

namespace App\Models;

use App\Models\References\RefKategoriBarang;
use App\Models\References\RefSatuan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'barang';

	protected $fillable = [
		'goodsable_type',
		'goodsable_id',
		'jumlah_barang',
		'satuan_id',
		'uraian_barang',
		'kategori_id',
		'berat',
		'satuan_berat',
	];

	public function goodsable() {
		return $this->morphTo();
	}

	/**
	 * Satuan barang
	 */
	public function satuan()
	{
		return $this->belongsTo(RefSatuan::class, 'satuan_id');
	}

	/**
	 * Kategori barang
	 */
	public function kategori()
	{
		return $this->belongsTo(RefKategoriBarang::class, 'kategori_id');
	}

	/**
	 * Foto barang
	 */
	public function images()
	{
		return $this->morphMany(Lampiran::class, 'attachable');
	}
}
