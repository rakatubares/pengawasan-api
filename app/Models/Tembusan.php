<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tembusan extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'tembusan';

	protected $fillable = [
		'tembusan_id',
		'cc_able_type',
		'cc_able_id',
	];
}
