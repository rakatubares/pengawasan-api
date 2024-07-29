<?php

namespace App\Http\Resources\Penindakan;

use App\Http\Resources\Entitas\EntitasOrangResource;
use App\Http\Resources\RefUserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DokTolakSbp2Resource extends JsonResource
{
    /**
     * Transform the resource into an array for display.
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
            'alasan' => $this->alasan,
            'penindakan' => new PenindakanResource($this->tolak1->tolakable->chain->penindakan),
            'sbp' => [
                'no_dok_lengkap' => $this->tolak1->tolakable->no_dok_lengkap,
                'tanggal_dokumen' => $this->tolak1->tolakable->tanggal_dokumen
                    ? $this->tolak1->tolakable->tanggal_dokumen->format('d-m-Y')
                    : null,
            ],
            'tolak1' => [
                'id' => $this->tolak1->id,
                'no_dok_lengkap' => $this->tolak1->no_dok_lengkap,
                'tanggal_dokumen' => $this->tolak1->tanggal_dokumen
                    ? $this->tolak1->tanggal_dokumen->format('d-m-Y')
                    : null,
            ],
            'saksi' => new EntitasOrangResource($this->saksi),
            'kode_status' => $this->kode_status,
            'created_by' => new RefUserResource($this->creator),
        ];
    }
}
