<?php

namespace App\Models\Entitas;

use App\Models\References\RefNegara;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntitasOrang extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'entitas_orang';

	protected $fillable = [
		'nama',
		'alias',
		'jenis_kelamin',
		'tempat_lahir',
		'tanggal_lahir',
		'kd_warga_negara',
		'agama',
		'alamat_identitas',
		'alamat_tinggal',
		'pekerjaan',
		'nomor_telepon',
		'email',
	];

	protected $casts = [
		'tanggal_lahir' => 'date'
	];

	/**
	 * Detail kewarganegaraan
	 */
	public function warga_negara()
	{
		return $this->belongsTo(RefNegara::class, 'kd_warga_negara', 'kode_2');
	}

	/**
	 * Detail identitas
	 */
	public function identitas() 
	{
		return $this->morphMany(EntitasIdentitas::class, 'identityable');
	}
}
