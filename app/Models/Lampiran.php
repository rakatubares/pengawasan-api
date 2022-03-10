<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lampiran extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'lampiran';

	protected $fillable = [
		'mime_type',
		'path',
		'filename'
	];

	public function attachable()
	{
		return $this->morphTo();
	}
}
