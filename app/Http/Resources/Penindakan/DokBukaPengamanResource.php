<?php

namespace App\Http\Resources\Penindakan;

use App\Http\Resources\Entitas\EntitasOrangResource;
use App\Http\Resources\ListPosisiPegawaiResource;
use App\Http\Resources\RefUserResource;
use App\Http\Resources\SprintResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DokBukaPengamanResource extends JsonResource
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
            'tanggal_buka_pengaman' => $this->tanggal_buka_pengaman
                ? $this->tanggal_buka_pengaman->format('d-m-Y')
                : null,
            'asal_pengaman' => $this->asal_pengaman,
            'pengaman_id' => $this->asal_pengaman == 'pengaman'
                ? $this->chain->pengaman->id : null,
            'jenis_pengaman' => $this->asal_pengaman == 'pengaman'
                ? $this->chain->pengaman->jenis_pengaman
                : $this->jenis_pengaman,
            'jumlah_pengaman' => $this->asal_pengaman == 'pengaman'
                ? $this->chain->pengaman->jumlah_pengaman
                : $this->jumlah_pengaman,
            'satuan_pengaman' => $this->asal_pengaman == 'pengaman'
                ? $this->chain->pengaman->satuan_pengaman
                : $this->satuan_pengaman,
            'nomor_pengaman' => $this->asal_pengaman == 'pengaman'
                ? $this->chain->pengaman->nomor_pengaman
                : $this->nomor_pengaman,
            'tanggal_pengaman' => $this->tanggalPengaman(),
            'tempat_pengaman' => $this->asal_pengaman == 'pengaman'
                ? $this->chain->pengaman->tempat_pengaman
                : $this->tempat_pengaman,
            'dasar_pengamanan' => $this->dasar_pengamanan,
            'sprint' => new SprintResource($this->sprint),
            'saksi' => new EntitasOrangResource($this->saksi),
            'petugas' => ListPosisiPegawaiResource::associative($this->detail_petugas),
            'penindakan' => new PenindakanResource($this->chain->penindakan),
            'kode_status' => $this->kode_status,
            'created_by' => new RefUserResource($this->creator),
        ];
    }

    private function tanggalPengaman()
    {
        $date = null;

        if ($this->asal_pengaman == 'pengaman') {
            // Gunakan tanggal dari dokumen sumber
            $date = $this->chain->penindakan->tanggal_selesai_penindakan;
        } else {
            // Gunakan tanggal dari dokumen pembukaan
            $date = $this->tanggal_pengaman;
        }
        
        if ($date) { $date = $date->format('d-m-Y'); }

        return $date;
    }
}
