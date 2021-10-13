<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefStatus extends Model
{
    use HasFactory;
	use SoftDeletes;

	public $timestamps = true;
}
