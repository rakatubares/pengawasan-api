<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailSarkut extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'detail_sarkut';

	protected $fillable = [
		'vehicleable_type',
		'vehicleable_id',
		'nama_sarkut',
		'jenis_sarkut',
		'no_flight_trayek',
		'kapasitas',
		'satuan_kapasitas',
		'pilot_id',
		'bendera',
		'no_reg_polisi'
	];

	/**
	 * Define polymorphic properties
	 */
	public function vehicleable()
	{
		return $this->morphTo(__FUNCTION__, 'vehicleable_type', 'vehicleable_id');
	}

	/**
	 * Detail entitas pilot
	 */
	public function pilot()
	{
		return $this->belongsTo(RefEntitas::class, 'pilot_id');
	}
}
