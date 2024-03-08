<?php

namespace App\Models\Intelijen;

use App\Models\References\RefKepercayaanSumber;
use App\Models\References\RefValiditasInformasi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokLppiInformasi extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'dok_lppi_informasi';

	protected $fillable = [
		'infoable_type',
		'infoable_id',
		'informasi',
		'kode_kepercayaan',
		'kode_validitas',
	];

	public function infoable() 
	{
		return $this->morphTo();
	}

	/**
	 * Tingkat kepercayaan sumber
	 */
	public function kepercayaan()
	{
		return $this->belongsTo(RefKepercayaanSumber::class, 'kode_kepercayaan', 'klasifikasi');
	}

	/**
	 * Tingkat validitas informasi
	 */
	public function validitas()
	{
		return $this->belongsTo(RefValiditasInformasi::class, 'kode_validitas', 'klasifikasi');
	}
}
