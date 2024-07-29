<?php

namespace App\Http\Resources\Intelijen;

use App\Http\Resources\Entitas\EntitasResource;
use App\Http\Resources\ListPosisiPegawaiResource;
use App\Http\Resources\RefUserResource;
use App\Http\Resources\TembusanResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DokLptiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'no_dok' => $this->no_dok,
            'agenda_dok' => $this->agenda_dok,
            'thn_dok' => $this->thn_dok,
            'no_dok_lengkap' => $this->no_dok_lengkap,
            'tanggal_dokumen' => $this->tanggal_dokumen
                ? $this->tanggal_dokumen->format('d-m-Y')
                : null,
            'tempat_pengumpulan' => $this->tempat_pengumpulan,
            'sumber_informasi' => $this->sumber_informasi,
            'metode_pengumpulan' => $this->metode_pengumpulan,
            'ikhtisar_informasi' => $this->ikhtisar_informasi,
            'jenis_dok_pabean' => $this->jenis_dok_pabean,
            'nomor_dok_pabean' => $this->nomor_dok_pabean,
            'tanggal_dok_pabean' => $this->tanggal_dok_pabean
                ? $this->tanggal_dok_pabean->format('d-m-Y')
                : null,
            'metode_analisis' => $this->metode_analisis,
            'ikhtisar_analisis' => $this->ikhtisar_analisis,
            'jenis_pelanggaran' => $this->jenis_pelanggaran,
            'modus_pelanggaran' => $this->modus_pelanggaran,
            'tempat_pelanggaran' => $this->tempat_pelanggaran,
            'waktu_pelanggaran' => $this->waktu_pelanggaran
                ? $this->waktu_pelanggaran->format('d-m-Y')
                : null,
            'pelaku' => new EntitasResource($this->pelaku, $this->pelaku_type),
            'dokumentasi_foto' => $this->dokumentasi_foto,
            'dokumentasi_audio' => $this->dokumentasi_audio,
            'dokumentasi_video' => $this->dokumentasi_video,
            'informasi_lain' => $this->informasi_lain,
            'kesimpulan' => $this->kesimpulan,
            'rekomendasi' => $this->rekomendasi,
            'petugas' => ListPosisiPegawaiResource::associative($this->detail_petugas),
            'tembusan' => TembusanResource::collection($this->tembusan),
            'sti' => new DokStiResource($this->chain->sti),
            'kode_status' => $this->kode_status,
            'created_by' => new RefUserResource($this->creator),
        ];
    }
}
