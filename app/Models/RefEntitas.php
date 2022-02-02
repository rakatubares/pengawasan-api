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
		'jenis_entitas',
		'nama',
		'jenis_kelamin',
		'tempat_lahir',
		'tanggal_lahir',
		'warga_negara',
		'agama',
		'jenis_identitas',
		'nomor_identitas',
		'pekerjaan',
		'alamat',
		'nomor_telepon',
		'email',
	];

	protected $casts = [
		'tanggal_lahir' => 'date'
	];
}
