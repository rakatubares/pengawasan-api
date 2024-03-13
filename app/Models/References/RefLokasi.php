<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefLokasi extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'ref_lokasi';

	protected $fillable = [
		'lokasi'
	];

	public $timestamps = true;
}
