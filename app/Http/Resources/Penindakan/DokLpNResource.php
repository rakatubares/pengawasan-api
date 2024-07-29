<?php

namespace App\Http\Resources\Penindakan;

use App\Http\Resources\ListPosisiPegawaiResource;
use App\Http\Resources\RefUserResource;
use App\Http\Resources\SprintResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DokLpNResource extends JsonResource
{
    /**
     * Transform the resource into an array for display.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $sbp = $this->chain->sbpn;
        $lphp = $this->chain->lphpn;

        return [
            'id' => $this->id,
            'no_dok' => $this->no_dok,
            'agenda_dok' => $this->agenda_dok,
            'thn_dok' => $this->thn_dok,
            'no_dok_lengkap' => $this->no_dok_lengkap,
            'tanggal_dokumen' => $this->tanggal_dokumen
                ? $this->tanggal_dokumen->format('d-m-Y')
                : null,
            'sprint' => new SprintResource($this->sprint),
            'kesimpulan' => $this->kesimpulan,
            'kode_status' => $this->kode_status,
            'sbp_id' => $sbp != null ? $sbp->id : null,
            'nomor_sbp' => $sbp != null ? $sbp->no_dok_lengkap : null,
            'tanggal_sbp' => $sbp != null ? $sbp->tanggal_dokumen->format('d-m-Y') : null,
            'lphp_id' => $lphp != null ? $lphp->id : null,
            'nomor_lphp' => $lphp != null ? $lphp->no_dok_lengkap : null,
            'tanggal_lphp' => $lphp != null ? $lphp->tanggal_dokumen->format('d-m-Y') : null,
            'analisa_lphp' => $lphp != null ? $lphp->analisa : null,
            'penindakan' => new PenindakanResource($this->chain->penindakan),
            'petugas' => ListPosisiPegawaiResource::associative($this->detail_petugas),
            'kode_status' => $this->kode_status,
            'created_by' => new RefUserResource($this->creator),
        ];
    }
}
