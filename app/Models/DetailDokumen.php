<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailDokumen extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'detail_dokumen';

	protected $fillable = [
		'documentable_type',
		'documentable_id',
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
	public function documentable()
	{
		return $this->morphTo(__FUNCTION__, 'documentable_type', 'documentable_id');
	}
}
