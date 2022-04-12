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
		'warga_negara',
		'agama',
		'jenis_identitas',
		'nomor_identitas',
		'penerbit_identitas',
		'tempat_identitas_terbit',
		'alamat',
		'alamat_tinggal',
		'pekerjaan',
		'nomor_telepon',
		'email',
	];

	protected $casts = [
		'tanggal_lahir' => 'date'
	];
}
