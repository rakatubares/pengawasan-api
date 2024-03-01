<?php

namespace App\Models;

use App\Models\References\RefJabatan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailPetugas extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'detail_petugas';

	protected $fillable = [
		'officerable_type',
		'officerable_id',
		'posisi',
		'flag_pejabat',
		'kode_jabatan',
		'tipe_ttd',
		'nip'
	];

	function petugas() {
		return $this->hasOne(RefUserCache::class, 'nip', 'nip');
	}

	function jabatan() {
		return $this->hasOne(RefJabatan::class, 'kode', 'kode_jabatan');
	}
}
