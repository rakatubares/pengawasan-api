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
		'bangunanable_type',
		'bangunanable_id',
		'alamat',
		'no_reg',
		'pemilik',
		'jns_identitas',
		'no_identitas',
	];

	/**
	 * Define polymorphic properties
	 */
	public function bangunanable()
	{
		return $this->morphTo(__FUNCTION__, 'bangunanable_type', 'bangunanable_id');
	}
}
