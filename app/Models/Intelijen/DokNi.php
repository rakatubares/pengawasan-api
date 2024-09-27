<?php

namespace App\Models\Intelijen;

use App\Models\Dokumen;

class DokNi extends Dokumen
{
    protected $table = 'dok_ni';
    public $kodeDokumen = 'ni';
    public $tipeDokumen = 'NI';
    public $kodeLkai = 'lkai';

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
        'uraian',
        'kode_status',
        'status_tindak_lanjut',
    ];

    protected $casts = [
        'tanggal_dokumen' => 'date',
    ];

    public $searchables = [
        'uraian',
    ];
}
