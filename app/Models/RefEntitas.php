<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefEntitas extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $fillable = [
		'nama',
		'alias',
		'jenis_kelamin',
		'tempat_lahir',
		'tanggal_lahir',
		'kd_warga_negara',
		'agama',
		'jenis_identitas',
		'nomor_identitas',
		'penerbit_identitas',
		'tempat_identitas_terbit',
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
}
