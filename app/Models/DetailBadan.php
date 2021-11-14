<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailBadan extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'detail_badan';

	protected $fillable = [
		'bodyable_type',
		'bodyable_id',
		'entitas_id',
	];

	/**
	 * Define polymorphic properties
	 */
	public function bodyable()
	{
		return $this->morphTo(__FUNCTION__, 'bodyable_type', 'bodyable_id');
	}

	/**
	 * Detail entitas
	 */
	public function entitas()
	{
		return $this->belongsTo(RefEntitas::class, 'entitas_id');
	}
}
