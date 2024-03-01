<?php

namespace App\Models\Intelijen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokNhiTertentu extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'dok_nhi_tertentu';

	protected $fillable = [
		'jenis_dok',
		'nomor_dok',
		'tanggal_dok',
		'nama_sarkut',
		'no_flight_trayek',
		'nomor_awb',
		'tanggal_awb',
		'merek_koli',
		'entitas_type',
		'entitas_id',
		'data_lain',
	];

	protected $casts = [
		'tanggal_dok' => 'date',
		'tanggal_awb' => 'date',
	];

	public function entitas() {
		return $this->morphTo();
	}

	public function nhi() {
		return $this->morphOne(DokNhi::class, 'detail');
	}
}
