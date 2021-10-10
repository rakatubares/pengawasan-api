<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SbpPenindakanBangunan extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $fillable = [
		'sbp_id',
		'alamat',
		'no_reg',
		'pemilik',
		'jns_identitas',
		'no_identitas',
	];

	public function sbpHeader()
	{
		return $this->belongsTo(SbpHeader::class, 'sbp_id');
	}
}
