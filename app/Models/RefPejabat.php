<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefPejabat extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'ref_pejabat';

	protected $fillable = [
		'kode_jabatan',
		'nip'
	];


	function petugas() {
		return $this->hasOne(RefUserCache::class, 'nip', 'nip');
	}

	function jabatan() {
		return $this->hasOne(RefJabatan::class, 'kode', 'kode_jabatan');
	}
}
