<?php

namespace App\Models\Penindakan;

use App\Models\DetailPetugas;
use App\Models\DocumentsChain;
use App\Models\Entitas\EntitasOrang;
use App\Models\References\RefKategoriPelanggaran;
use App\Models\Sprint;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penindakan extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'penindakan';

	protected $fillable = [
		'sprint_id',
		'chain_id',
		'tanggal_mulai_penindakan',
		'waktu_mulai_penindakan',
		'tanggal_selesai_penindakan',
		'waktu_selesai_penindakan',
		'lokasi_penindakan',
		'kategori_penindakan_id',
		'uraian_penindakan',
		'alasan_penindakan',
		'jenis_pelanggaran',
		'hal_terjadi',
		'saksi_id',
	];

	protected $casts = [
		'tanggal_mulai_penindakan' => 'date',
		'tanggal_selesai_penindakan' => 'date',
	];

	/**
	 * Surat perintah
	 */
	public function sprint()
	{
		return $this->belongsTo(Sprint::class, 'sprint_id');
	}

	/**
	 * Documents chain
	 */
	public function chain() {
		return $this->belongsTo(DocumentsChain::class, 'chain_id');
	}

	/**
	 * Kategori pelanggaran
	 */
	public function kategori_penindakn()
	{
		return $this->belongsTo(RefKategoriPelanggaran::class, 'kategori_penindakan_id');
	}

	/**
	 * Detail saksi
	 */
	public function saksi() {
		return $this->belongsTo(EntitasOrang::class, 'saksi_id');
	}

	/**
	 * Petugas
	 */
	public function detail_petugas()
	{
		return $this->morphMany(DetailPetugas::class, 'officerable');
	}

	/**
	 * Detail
	 */

	// Penindakan Sarkut
	public function sarkut() {
		return $this->hasOne(PenindakanSarkut::class, 'penindakan_id');
	}

	// Penindakan Barang
	public function barang() {
		return $this->hasOne(PenindakanBarang::class, 'penindakan_id');
	}

	// Penindakan Bangunan
	public function bangunan() {
		return $this->hasOne(PenindakanBangunan::class, 'penindakan_id');
	}

	// Penindakan Badan
	public function badan() {
		return $this->hasOne(PenindakanBadan::class, 'penindakan_id');
	}
}
