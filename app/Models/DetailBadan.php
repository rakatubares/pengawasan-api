<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailBadan extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $fillable = [
		'badanable_type',
		'badanable_id',
		'nama',
		'tgl_lahir',
		'warga_negara',
		'alamat',
		'jns_identitas',
		'no_identitas',
	];

	protected $casts = [
		'tgl_lahir' => 'date',
	];

	/**
	 * Define polymorphic properties
	 */
	public function badanable()
	{
		return $this->morphTo(__FUNCTION__, 'badanable_type', 'badanable_id');
	}
}
