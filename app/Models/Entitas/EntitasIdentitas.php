<?php

namespace App\Models\Entitas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntitasIdentitas extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'entitas_identitas';

	protected $fillable = [
		'identityable_type',
		'identityable_id',
		'jenis',
		'nomor',
		'pejabat_penerbit',
		'tempat_penerbitan',
	];

	public function identityable() {
		return $this->morphTo();
	}
}
