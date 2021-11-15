<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefSprint extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'ref_sprint';

	protected $fillable = [
		'nomor_sprint',
		'tanggal_sprint',
		'pejabat_id',
	];

	protected $casts = [
		'tanggal_sprint' => 'date',
	];
}
