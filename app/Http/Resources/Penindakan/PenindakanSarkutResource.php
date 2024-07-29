<?php

namespace App\Http\Resources\Penindakan;

use App\Http\Resources\Entitas\EntitasOrangResource;
use App\Http\Resources\References\RefNegaraResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PenindakanSarkutResource extends JsonResource
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
            'nama_sarkut' => $this->nama_sarkut,
            'jenis_sarkut' => $this->jenis_sarkut,
            'nomor_sarkut' => $this->nomor_sarkut,
            'jumlah_kapasitas' => $this->jumlah_kapasitas,
            'satuan_kapasitas' => $this->satuan_kapasitas,
            'pengemudi' => new EntitasOrangResource($this->pengemudi),
            'bendera' => new RefNegaraResource($this->bendera),
            'registrasi_sarkut' => $this->registrasi_sarkut,
        ];
    }
}
