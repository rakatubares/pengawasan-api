<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IkhtisarInformasi extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'ikhtisar_informasi';

	protected $fillable = [
		'intelijen_id',
		'ikhtisar',
		'kode_kepercayaan',
		'kode_validitas',
	];

	/**
	 * Header intelijen
	 */
	public function intelijen()
	{
		return $this->belongsTo(Intelijen::class, 'intelijen_id');
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
