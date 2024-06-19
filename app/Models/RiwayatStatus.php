<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RiwayatStatus extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'riwayat_status';

	protected $fillable = [
		'historyable_type',
		'historyable_id',
		'kode_status',
		'keterangan',
		'nip_pegawai',
	];
}