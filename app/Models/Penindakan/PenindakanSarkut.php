<?php

namespace App\Models\Penindakan;

use App\Models\Entitas\EntitasOrang;
use App\Models\References\RefNegara;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PenindakanSarkut extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'penindakan_sarkut';

	protected $fillable = [
		'penindakan_id',
		'nama_sarkut',
		'jenis_sarkut',
		'nomor_sarkut',
		'jumlah_kapasitas',
		'satuan_kapasitas',
		'pengemudi_id',
		'bendera_sarkut',
		'registrasi_sarkut',
	];

	/**
	 * Parent penindakan
	 */
	public function penindakan() 
	{
		return $this->belongsTo(Penindakan::class, 'penindakan_id');
	}

	/**
	 * Detail entitas pengemudi
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
