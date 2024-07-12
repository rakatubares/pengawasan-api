<?php

namespace App\Models\Penindakan;

use App\Models\Entitas\EntitasOrang;
use App\Models\References\RefNegara;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PenindakanBadan extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'penindakan_badan';

	protected $fillable = [
		'penindakan_id',
		'entitas_id',
		'asal',
		'tujuan',
		'pendamping_id',
		'nama_sarkut',
		'nomor_sarkut',
		'jenis_sarkut',
		'pengemudi_id',
		'bendera_sarkut',
		'registrasi_sarkut',
		'jenis_dokumen',
		'nomor_dokumen',
		'tanggal_dokumen',
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
	 * Detail entitas
	 */
	public function entitas()
	{
		return $this->belongsTo(EntitasOrang::class, 'entitas_id');
	}

	/**
	 * Detail pendamping
	 */
	public function pendamping()
	{
		return $this->belongsTo(EntitasOrang::class, 'pendamping_id');
	}

	/**
	 * Detail pengemudi sarkut
	 */
	public function pengemudi()
	{
		return $this->belongsTo(EntitasOrang::class, 'pengemudi_id');
	}

	/**
	 * Detail bendera sarkut
	 */
	public function bendera()
	{
		return $this->belongsTo(RefNegara::class, 'bendera_sarkut', 'kode_2');
	}
}
