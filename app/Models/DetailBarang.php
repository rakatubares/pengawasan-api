<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailBarang extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $fillable = [
		'barangable_type',
		'barangable_id',
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

	/**
	 * Define polymorphic properties
	 */
	public function barangable()
	{
		return $this->morphTo(__FUNCTION__, 'barangable_type', 'barangable_id');
	}

	/**
	 * OneToMany ke detail barang
	 */
	public function itemBarang()
	{
		return $this->hasMany(DetailBarangItem::class, 'detail_barang_id');
	}
}
