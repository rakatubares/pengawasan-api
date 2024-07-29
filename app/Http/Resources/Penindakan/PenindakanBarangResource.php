<?php

namespace App\Http\Resources\Penindakan;

use App\Http\Resources\BarangResource;
use App\Http\Resources\Entitas\EntitasOrangResource;
use App\Http\Resources\References\RefKemasanResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PenindakanBarangResource extends JsonResource
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
            'jumlah_kemasan' => $this->jumlah_kemasan,
            'kemasan' => new RefKemasanResource($this->kemasan),
            'nomor_kemasan' => $this->nomor_kemasan,
            'jenis_dokumen' => $this->jenis_dokumen,
            'nomor_dokumen' => $this->nomor_dokumen,
            'tanggal_dokumen' => $this->tanggal_dokumen
                ? $this->tanggal_dokumen->format('d-m-Y')
                : null,
            'pemilik' => new EntitasOrangResource($this->pemilik),
            'item' => BarangResource::collection($this->barang)
        ];
    }
}
