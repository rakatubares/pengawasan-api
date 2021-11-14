<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailBangunan extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $fillable = [
		'buildingable_type',
		'buildingable_id',
		'alamat',
		'no_reg',
		'pemilik_id',
	];

	/**
	 * Define polymorphic properties
	 */
	public function buildingable()
	{
		return $this->morphTo(__FUNCTION__, 'buildingable_type', 'buildingable_id');
	}

	/**
	 * Detail entitas pemilik
	 */
	public function pemilik()
	{
		return $this->belongsTo(RefEntitas::class, 'pemilik_id');
	}
}
