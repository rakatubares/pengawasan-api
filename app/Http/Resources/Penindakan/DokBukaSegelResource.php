<?php

namespace App\Http\Resources\Penindakan;

use App\Http\Resources\Entitas\EntitasOrangResource;
use App\Http\Resources\ListPosisiPegawaiResource;
use App\Http\Resources\RefUserResource;
use App\Http\Resources\SprintResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DokBukaSegelResource extends JsonResource
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
            'tanggal_buka_segel' => $this->tanggal_buka_segel
                ? $this->tanggal_buka_segel->format('d-m-Y')
                : null,
            'asal_segel' => $this->asal_segel,
            'segel_id' => $this->asal_segel == 'segel'
                ? $this->chain->segel->id : null,
            'jenis_segel' => $this->asal_segel == 'segel'
                ? $this->chain->segel->jenis_segel
                : $this->jenis_segel,
            'jumlah_segel' => $this->asal_segel == 'segel'
                ? $this->chain->segel->jumlah_segel
                : $this->jumlah_segel,
            'satuan_segel' => $this->asal_segel == 'segel'
                ? $this->chain->segel->satuan_segel
                : $this->satuan_segel,
            'nomor_segel' => $this->asal_segel == 'segel'
                ? $this->chain->segel->nomor_segel
                : $this->nomor_segel,
            'tanggal_segel' => $this->tanggalSegel(),
            'tempat_segel' => $this->asal_segel == 'segel'
                ? $this->chain->segel->tempat_segel
                : $this->tempat_segel,
            'sprint' => new SprintResource($this->sprint),
            'saksi' => new EntitasOrangResource($this->saksi),
            'petugas' => ListPosisiPegawaiResource::associative($this->detail_petugas),
            'penindakan' => new PenindakanResource($this->chain->penindakan),
            'kode_status' => $this->kode_status,
            'created_by' => new RefUserResource($this->creator),
        ];
    }

    private function tanggalSegel()
    {
        $date = null;

        if ($this->asal_pengaman == 'segel') {
            // Gunakan tanggal dari dokumen sumber
            $date = $this->chain->penindakan->tanggal_selesai_penindakan;
        } else {
            // Gunakan tanggal dari dokumen pembukaan
            $date = $this->tanggal_segel;
        }
        
        if ($date) { $date = $date->format('d-m-Y'); }

        return $date;
    }
}
