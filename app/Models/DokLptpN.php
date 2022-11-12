<?php

namespace App\Models;

class DokLptpN extends DokLptp
{
    protected $table = 'dok_lptpn';
	protected $tipe_lptp = 'lptpn';
	protected $tipe_sbp = 'sbpn';
	protected $tipe_lphp = 'lphpn';

	protected $fillable = [
		'no_dok',
		'agenda_dok',
		'thn_dok',
		'no_dok_lengkap',
		'alasan_tidak_penindakan',
		'catatan',
		'kode_status'
	];
}
