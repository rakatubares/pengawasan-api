<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailDokumen extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $fillable = [
		'dokumenable_type',
		'dokumenable_id',
		'jns_dok',
		'no_dok',
		'tgl_dok',
	];

	protected $casts = [
		'tgl_dok' => 'date',
	];

	/**
	 * Define polymorphic properties
	 */
	public function dokumenable()
	{
		return $this->morphTo(__FUNCTION__, 'dokumenable_type', 'dokumenable_id');
	}
}
