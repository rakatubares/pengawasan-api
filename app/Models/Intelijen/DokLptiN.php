<?php

namespace App\Models\Intelijen;

use App\Models\Dokumen;

class DokLptiN extends Dokumen
{
    protected $table = 'dok_lptin';
    public $kodeDokumen = 'lptin';
    public $tipeDokumen = 'LPT-N';
    public $agendaDokumen = '/KPU.3052/';

    protected $fillable = [
        'no_dok',
        'agenda_dok',
        'thn_dok',
        'no_dok_lengkap',
        'tanggal_dokumen',
        'chain_id',
        'nomor_st',
        'tanggal_st',
        'wilayah',
        'tanggal_mulai',
        'tanggal_akhir',
        'uraian',
        'kesimpulan',
        'rekomendasi',
        'kode_status',
        'status_tindak_lanjut',
    ];

    protected $casts = [
        'tanggal_dokumen' => 'date',
        'tanggal_st' => 'date',
        'tanggal_mulai' => 'date',
        'tanggal_akhir' => 'date',
    ];

    public $searchables = [
        'uraian',
        'kesimpulan',
        'rekomendasi',
    ];

    public function tugas()
    {
        return $this->morphMany(DokLptiTugas::class, 'tugasable');
    }

    public function pelaku()
    {
        return $this->morphTo();
    }
}
