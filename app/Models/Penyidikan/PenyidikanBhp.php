<?php

namespace App\Models\Penyidikan;

use App\Models\Barang;
use App\Models\Penyidikan;
use App\Models\References\RefKemasan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PenyidikanBhp extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'penyidikan_bhp';

	protected $fillable = [
		'penyidikan_id',
		'jumlah_kemasan',
		'jenis_kemasan_id',
		'nomor_kemasan',
		'jenis_dokumen',
		'nomor_dokumen',
		'tanggal_dokumen',
		'nama_sarkut',
		'jenis_sarkut',
		'nomor_sarkut',
		'registrasi_sarkut',
		'nomor_kontainer',
		'ukuran_kontainer',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
	];

	/**
	 * Parent penyidikan
	 */
	public function penyidikan()
	{
		return $this->belongsTo(Penyidikan::class, 'penyidikan_id');
	}

	/**
	 * Jenis kemasan
	 */
	public function kemasan()
	{
		return $this->belongsTo(RefKemasan::class, 'jenis_kemasan_id');
	}

	/**
	 * Detail Barang
	 */
	public function barang()
	{
		return $this->morphMany(Barang::class, 'goodsable');
	}
}
