<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailPetugas extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'detail_petugas';

	protected $fillable = [
		'officerable_type',
		'officerable_id',
		'position',
		'petugas_id',
	];
}
