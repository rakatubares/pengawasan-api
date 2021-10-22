<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailSarkut extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $fillable = [
		'sarkutable_type',
		'sarkutable_id',
		'nama_sarkut',
		'jenis_sarkut',
		'no_flight_trayek',
		'kapasitas',
		'satuan_kapasitas',
		'nama_pilot_pengemudi',
		'bendera',
		'no_reg_polisi'
	];

	/**
	 * Define polymorphic properties
	 */
	public function sarkutable()
	{
		return $this->morphTo(__FUNCTION__, 'sarkutable_type', 'sarkutable_id');
	}
}
