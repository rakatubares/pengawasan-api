<?php

namespace App\Http\Resources\Intelijen;

use App\Http\Resources\ListPosisiPegawaiResource;
use App\Http\Resources\RefUserResource;
use App\Http\Resources\TembusanResource;

class DokLptiNResource extends DokLptiResource
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
            'nomor_st' => $this->nomor_st,
            'tanggal_st' => $this->tanggal_st
                ? $this->tanggal_st->format('d-m-Y')
                : null,
            'tugas' => $this->listTugas(),
            'wilayah' => $this->wilayah,
            'tanggal_mulai' => $this->tanggal_mulai
                ? $this->tanggal_mulai->format('d-m-Y')
                : null,
            'tanggal_akhir' => $this->tanggal_akhir
                ? $this->tanggal_akhir->format('d-m-Y')
                : null,
            'uraian' => $this->uraian,
            'kesimpulan' => $this->kesimpulan,
            'rekomendasi' => $this->rekomendasi,
            'petugas' => ListPosisiPegawaiResource::associative($this->detail_petugas),
            'tembusan' => TembusanResource::collection($this->tembusan),
            'kode_status' => $this->kode_status,
            'created_by' => new RefUserResource($this->creator),
        ];
    }
}
