<?php

namespace App\Http\Resources\Penindakan;

use App\Http\Resources\ListPosisiPegawaiResource;
use App\Http\Resources\RefUserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DokLptResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $array = [
			'id' => $this->id,
			'no_dok' => $this->no_dok,
			'agenda_dok' => $this->agenda_dok,
			'thn_dok' => $this->thn_dok,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'tanggal_dokumen' => $this->tanggal_dokumen 
				? $this->tanggal_dokumen->format('d-m-Y') 
				: null,
			'barang' => $this->barang,
			'sarpras' => $this->sarpras,
			'kronologi' => $this->kronologi,
			'petugas' => ListPosisiPegawaiResource::associative($this->detail_petugas),
			'penindakan' => new PenindakanResource($this->chain->penindakan),
			'sbp' => [
				'id' => $this->chain->sbp->id,
				'no_dok_lengkap' => $this->chain->sbp->no_dok_lengkap,
				'tanggal_dokumen' => $this->chain->sbp->tanggal_dokumen
					? $this->chain->sbp->tanggal_dokumen->format('d-m-Y')
					: null,
			],
			'kode_status' => $this->kode_status,
			'created_by' => new RefUserResource($this->creator),
		];
		return $array;
    }
}
