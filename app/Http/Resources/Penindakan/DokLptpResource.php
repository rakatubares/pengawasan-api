<?php

namespace App\Http\Resources\Penindakan;

use App\Http\Resources\ListPosisiPegawaiResource;
use App\Http\Resources\TembusanResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DokLptpResource extends JsonResource
{
    /**
    * Transform the resource into an array for display.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
    */
    public function toArray($request)
    {
        $kodeSbp = $this->kodeSbp;

        return [
            'id' => $this->id,
            'no_dok' => $this->no_dok,
            'agenda_dok' => $this->agenda_dok,
            'thn_dok' => $this->thn_dok,
            'no_dok_lengkap' => $this->no_dok_lengkap,
            'tanggal_dokumen' => $this->tanggal_dokumen
                ? $this->tanggal_dokumen->format('d-m-Y')
                : null,
            'alasan_tidak_penindakan' => $this->alasan_tidak_penindakan,
            'catatan' => $this->catatan,
            'penindakan' => new PenindakanResource($this->chain->penindakan),
            'sbp' => [
                'no_dok_lengkap' => $this->chain->$kodeSbp->no_dok_lengkap,
                'tanggal_dokumen' => $this->chain->$kodeSbp->tanggal_dokumen
                    ? $this->chain->$kodeSbp->tanggal_dokumen->format('d-m-Y')
                    : null,
            ],
            'petugas' => ListPosisiPegawaiResource::associative($this->detail_petugas),
            'tembusan' => TembusanResource::collection($this->tembusan),
            'kode_status' => $this->kode_status,
        ];
    }
}
