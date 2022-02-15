<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefSkemaPenindakan extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'ref_skema_penindakan';

	public $timestamps = true;
}
