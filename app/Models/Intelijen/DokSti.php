<?php

namespace App\Models\Intelijen;

use App\Models\Dokumen;

class DokSti extends Dokumen
{
	protected $table = 'dok_sti';
	public $kodeDokumen = 'sti';
	public $tipeDokumen = 'ST-I';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'chain_id',
		'wilayah',
		'tanggal_mulai',
		'tanggal_akhir',
		'sifat',
		'pakaian',
		'kode_status',
		'status_tindak_lanjut',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
		'tanggal_mulai' => 'date',
		'tanggal_akhir' => 'date',
	];

	public function tugas()
	{
		return $this->hasMany(DokStiTugas::class, 'sti_id');
	}
}
