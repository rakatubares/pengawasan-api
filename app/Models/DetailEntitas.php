<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailEntitas extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'detail_entitas';

	protected $fillable = [
		'entityable_type',
		'entityable_id',
		'position',
		'entity_id',
	];
}
