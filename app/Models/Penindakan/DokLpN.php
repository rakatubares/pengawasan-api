<?php

namespace App\Models\Penindakan;

use App\Models\Dokumen;
use App\Models\Sprint;

class DokLpN extends Dokumen
{
	protected $table = 'dok_lpn';
	public $kodeDokumen = 'lpn';
	public $tipeDokumen = 'LP-N';
	public $kodeLphp = 'lphpn';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'tanggal_dokumen',
		'chain_id',
		'sprint_id',
		'kesimpulan',
		'kode_status',
		'status_tindak_lanjut',
	];

	protected $casts = [
		'tanggal_dokumen' => 'date'
	];

	/**
	 * Surat perintah
	 */
	public function sprint()
	{
		return $this->belongsTo(Sprint::class, 'sprint_id');
	}
}
