<?php

namespace App\Http\Resources\Penindakan;

use App\Http\Resources\Entitas\EntitasOrangResource;
use App\Http\Resources\References\RefNegaraResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PenindakanBadanResource extends JsonResource
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
            'entitas' => new EntitasOrangResource($this->entitas),
            'asal' => $this->asal,
            'tujuan' => $this->tujuan,
            'pendamping' => new EntitasOrangResource($this->pendamping),
            'nama_sarkut' => $this->nama_sarkut,
            'jenis_sarkut' => $this->jenis_sarkut,
            'nomor_sarkut' => $this->nomor_sarkut,
            'pengemudi' => new EntitasOrangResource($this->pengemudi),
            'bendera' => new RefNegaraResource($this->bendera),
            'registrasi_sarkut' => $this->registrasi_sarkut,
            'jenis_dokumen' => $this->jenis_dokumen,
            'nomor_dokumen' => $this->nomor_dokumen,
            'tanggal_dokumen' => $this->tanggal_dokumen
                ? $this->tanggal_dokumen->format('d-m-Y')
                : null,
            'uraian_pemeriksaan' => $this->uraian_pemeriksaan,
            'hasil_pemeriksaan' => $this->hasil_pemeriksaan,
        ];
    }
}
