<?php

namespace App\Models\Penyidikan;

use App\Models\Dokumen;
use App\Models\Entitas\EntitasOrang;

class DokLpf extends Dokumen
{
	protected $table = 'dok_lpf';
	public $kode_dokumen = 'lpf';
	public $tipe_dokumen = 'LPF';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'chain_id',
		'saksi_id',
		'tanggal_bap_saksi',
		'tersangka_id',
		'tanggal_bap_tersangka',
		'resume_perkara',
		'tanggal_resume_perkara',
		'jenis_dokumen_lain',
		'nomor_dokumen_lain',
		'tanggal_dokumen_lain',
		'kesimpulan',
		'usulan',
		'catatan',
		'pejabat2_id',
		'kode_status',
		'status_tindak_lanjut',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date',
		'tanggal_bap_saksi' => 'date',
		'tanggal_bap_tersangka' => 'date',
		'tanggal_resume_perkara' => 'date',
		'tanggal_dokumen_lain' => 'date',
	];

	/**
	 * Detail orang saksi
	 */
	public function saksi()
	{
		return $this->belongsTo(EntitasOrang::class, 'saksi_id');
	}

	/**
	 * Detail orang tersangka
	 */
	public function tersangka()
	{
		return $this->belongsTo(EntitasOrang::class, 'tersangka_id');
	}
}
