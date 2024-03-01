<?php

namespace App\Models\Entitas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntitasBadanHukum extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'entitas_badan_hukum';

	protected $fillable = [
		'nama',
		'alamat',
		'nomor_telepon',
		'email',
	];

	/**
	 * Detail identitas
	 */
	public function identitas() 
	{
		return $this->morphMany(EntitasIdentitas::class, 'identityable');
	}
}
