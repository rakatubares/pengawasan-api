<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefTembusan extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'ref_tembusan';

	protected $fillable = [
		'uraian'
	];
}
