<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ObjectRelation extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $fillable = [
		'object1_type',
		'object1_id',
		'object2_type',
		'object2_id',
	];
}
