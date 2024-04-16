<?php

namespace App\Models\Penindakan;

use App\Models\Barang;
use App\Models\Entitas\EntitasOrang;
use App\Models\References\RefKemasan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PenindakanBarang extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'penindakan_barang';

	protected $fillable = [
		'penindakan_id',
		'jumlah_kemasan',
		'jenis_kemasan_id',
		'nomor_kemasan',
		'jenis_dokumen',
		'nomor_dokumen',
		'tanggal_dokumen',
		'pemilik_id',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
	];

	/**
	 * Parent penindakan
	 */
	public function penindakan() 
	{
		return $this->belongsTo(Penindakan::class, 'penindakan_id');
	}

	/**
	 * Jenis kemasan
	 */
	public function kemasan()
	{
		return $this->belongsTo(RefKemasan::class, 'jenis_kemasan_id');
	}
	
	/**
	 * Detail entitas pemilik
	 */
	public function pemilik()
	{
		return $this->belongsTo(EntitasOrang::class, 'pemilik_id');
	}

	/**
	 * Detail Barang
	 */
	public function barang()
	{
		return $this->morphMany(Barang::class, 'goodsable');
	}
}
