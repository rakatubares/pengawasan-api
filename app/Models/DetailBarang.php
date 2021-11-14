<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailBarang extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'detail_barang';

	protected $fillable = [
		'goodsable_type',
		'goodsable_id',
		'jumlah_kemasan',
		'satuan_kemasan_id',
		'pemilik_id'
	];

	/**
	 * Define polymorphic properties
	 */
	public function goodsable()
	{
		return $this->morphTo(__FUNCTION__, 'goodsable_type', 'goodsable_id');
	}

	/**
	 * Detail entitas pemilik
	 */
	public function pemilik()
	{
		return $this->belongsTo(RefEntitas::class, 'pemilik_id');
	}

	/**
	 * MorphOne ke dokumen
	 */
	public function dokumen()
	{
		return $this->morphOne(DetailDokumen::class, 'documentable');
	}

	/**
	 * OneToMany ke detail barang
	 */
	public function itemBarang()
	{
		return $this->hasMany(DetailBarangItem::class, 'detail_barang_id');
	}
}
