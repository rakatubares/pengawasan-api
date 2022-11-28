<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'status';

	protected $fillable = [
		'statusable_type',
		'statusable_id',
		'kode_status',
		'nip_pegawai',
	];
}