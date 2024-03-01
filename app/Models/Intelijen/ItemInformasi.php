<?php

namespace App\Models\Intelijen;

use App\Models\References\RefKepercayaanSumber;
use App\Models\References\RefValiditasInformasi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemInformasi extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'item_informasi';

	protected $fillable = [
		'ikhtisar_id',
		'informasi',
		'kode_kepercayaan',
		'kode_validitas',
	];

	/**
	 * Header ikhtisar informasi
	 */
	public function ikhtisar()
	{
		return $this->belongsTo(IkhtisarInformasi::class, 'ikhtisar_id');
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
