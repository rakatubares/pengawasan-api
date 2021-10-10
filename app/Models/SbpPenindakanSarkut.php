<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SbpPenindakanSarkut extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $fillable = [
		'sbp_id',
		'nama_sarkut',
		'jenis_sarkut',
		'no_flight_trayek',
		'kapasitas',
		'satuan_kapasitas',
		'nama_pilot_pengemudi',
		'bendera',
		'no_reg_polisi'
	];

	public function SbpHeader()
	{
		return $this->belongsTo(SbpHeader::class, 'sbp_id');
	}
}
