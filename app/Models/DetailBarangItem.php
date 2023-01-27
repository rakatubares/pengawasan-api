<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailBarangItem extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $fillable = [
		'detail_barang_id',
		'jumlah_barang',
		'satuan_id',
		'uraian_barang',
		'merk',
		'kondisi',
		'tipe',
		'spesifikasi_lain',
		'kategori_id',
	];

	/**
	 * ManyToOne ke detail barang
	 */
	public function detailBarang()
	{
		return $this->belongsTo(DetailBarang::class, 'detail_barang_id');
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
