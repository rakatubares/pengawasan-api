<?php

namespace App\Models\Intelijen;

use App\Models\Dokumen;

class DokLpti extends Dokumen
{
    protected $table = 'dok_lpti';
    public $kodeDokumen = 'lpti';
    public $tipeDokumen = 'LPT';

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
        'tempat_pengumpulan',
        'sumber_informasi',
        'metode_pengumpulan',
        'ikhtisar_informasi',
        'jenis_dok_pabean',
        'nomor_dok_pabean',
        'tanggal_dok_pabean',
        'metode_analisis',
        'ikhtisar_analisis',
        'jenis_pelanggaran',
        'modus_pelanggaran',
        'tempat_pelanggaran',
        'waktu_pelanggaran',
        'pelaku_type',
        'pelaku_id',
        'dokumentasi_foto',
        'dokumentasi_audio',
        'dokumentasi_video',
        'informasi_lain',
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
        'tanggal_dok_pabean' => 'date',
        'waktu_pelanggaran' => 'date',
    ];

    public $searchables = [
        'ikhtisar_informasi',
        'ikhtisar_analisis',
        'modus_pelanggaran',
        'informasi_lain',
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
