<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefKantorBC extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'ref_kantor_bc';

	public $timestamps = true;
}
