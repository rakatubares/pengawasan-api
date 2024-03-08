<?php

namespace App\Models\Intelijen;

use App\Models\Barang;
use App\Models\Dokumen;
use App\Models\References\RefKantorBC;


class DokNhi extends Dokumen
{
	protected $table = 'dok_nhi';
	public $kode_dokumen = 'nhi';
	public $tipe_dokumen = 'NHI';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'chain_id',
		'sifat',
		'klasifikasi',
		'tujuan',
		'tempat_indikasi',
		'tanggal_indikasi',
		'waktu_indikasi',
		'zona_waktu',
		'kode_kantor',
		'detail_type',
		'detail_id',
		'indikasi',
		'kode_status',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
		'tanggal_indikasi' => 'date',
	];


	/**
	 * Kantor
	 */
	public function kantor() {
		return $this->hasOne(RefKantorBC::class, 'kode_kantor', 'kode_kantor');
	}

	/**
	 * Detail
	 */
	public function detail() {
		return $this->morphTo();
	}

	/**
	 * Detail Barang
	 */
	public function barang()
	{
		return $this->morphMany(Barang::class, 'goodsable');
	}
}
