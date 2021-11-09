<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SerahTerima extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tgl_dok',
		'no_sprint',
		'tgl_sprint',
		'detail_sarkut',
		'detail_barang',
		'detail_dokumen',
		'detail_badan',
		'nama_penerima',
		'jns_identitas',
		'no_identitas',
		'atas_nama_penerima',
		'dalam_rangka',
		'pejabat',
		'kode_status',
	];

	protected $casts = [
		'tgl_dok' => 'date',
		'tgl_sprint' => 'date',
	];

	public function sarkut()
	{
		return $this->morphMany(DetailSarkut::class, 'sarkutable');
	}

	public function barang()
	{
		return $this->morphMany(DetailBarang::class, 'barangable');
	}

	public function itemBarang()
	{
		return $this->hasManyThrough(
			DetailBarangItem::class,
			DetailBarang::class,
			'barangable_id',
			'detail_barang_id'
		)->where('barangable_type', SerahTerima::class);
	}

	public function dokumen()
	{
		return $this->morphMany(DetailDokumen::class, 'dokumenable');
	}

	public function badan()
	{
		return $this->morphMany(DetailBadan::class, 'badanable');
	}

	public function status()
	{
		return $this->belongsTo(RefStatus::class, 'kode_status', 'kode_status');
	}
}
