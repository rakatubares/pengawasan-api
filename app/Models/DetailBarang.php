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
		'parent_type',
		'parent_id',
		'jumlah_kemasan',
		'satuan_kemasan',
		'pemilik_id'
	];

	/**
	 * Define polymorphic properties
	 */
	public function goodsable()
	{
		return $this->morphTo(__FUNCTION__, 'parent_type', 'parent_id');
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
		return $this->morphOne(DetailDokumen::class, 'parent');
	}

	/**
	 * OneToMany ke detail barang
	 */
	public function itemBarang()
	{
		return $this->hasMany(DetailBarangItem::class, 'detail_barang_id');
	}

	/**
	 * The "booted" method of the model.
	 *
	 * @return void
	 */
	protected static function booted()
	{
		static::deleted(function ($detailBarang) {
			// Delete item barang
			$detailBarang->itemBarang()->delete();

			// Delete dokumen dasar
			if ($detailBarang->dokumen != null) {
				$detailBarang->dokumen->delete();
			}
		});
	}
}
