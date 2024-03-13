<?php

namespace App\Models\Intelijen;

class DokNiN extends DokNi
{
	protected $table = 'dok_nin';
	public $kode_dokumen = 'nin';
	public $tipe_dokumen = 'NI-N';
	public $kode_lkai = 'lkain';
}
