<?php

namespace App\Models\Intelijen;

use App\Models\References\RefBandara;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokNhiNSarkut extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'dok_nhin_sarkut';

	protected $fillable = [
		'nama_sarkut',
		'jenis_sarkut',
		'nomor_sarkut',
		'kode_pelabuhan_asal',
		'kode_pelabuhan_tujuan',
		'imo_mmsi',
		'data_lain',
	];

	public function nhin() {
		return $this->morphOne(DokNhiN::class, 'detail');
	}

	public function pelabuhan_asal() {
		return $this->belongsTo(RefBandara::class, 'kode_pelabuhan_asal', 'iata_code');
	}

	public function pelabuhan_tujuan() {
		return $this->belongsTo(RefBandara::class, 'kode_pelabuhan_tujuan', 'iata_code');
	}
}
