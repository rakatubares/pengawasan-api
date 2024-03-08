<?php

namespace App\Models\Intelijen;

use App\Models\Entitas\EntitasOrang;
use App\Models\References\RefBandara;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokNhiNOrang extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'dok_nhin_orang';

	protected $fillable = [
		'entitas_id',
		'nomor_sarkut',
		'kode_pelabuhan_asal',
		'kode_pelabuhan_tujuan',
		'tanggal_berangkat',
		'waktu_berangkat',
		'tanggal_datang',
		'waktu_datang',
		'data_lain',
	];

	protected $casts = [
		'tanggal_berangkat' => 'date',
		'tanggal_datang' => 'date',
	];

	public function nhin() {
		return $this->morphOne(DokNhiN::class, 'detail');
	}

	public function entitas() {
		return $this->belongsTo(EntitasOrang::class, 'entitas_id');
	}

	public function pelabuhan_asal() {
		return $this->belongsTo(RefBandara::class, 'kode_pelabuhan_asal', 'iata_code');
	}

	public function pelabuhan_tujuan() {
		return $this->belongsTo(RefBandara::class, 'kode_pelabuhan_tujuan', 'iata_code');
	}
}
