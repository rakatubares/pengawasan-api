<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefSatuan extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'ref_satuan';

	public $timestamps = true;
}
