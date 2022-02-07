<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokTolakSbp2TableResource extends JsonResource
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
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'tanggal_dokumen' => $this->tanggal_dokumen ? $this->tanggal_dokumen->format('d-m-Y') : null,
			'nomor_tolak1' => $this->tolak1->no_dok_lengkap,
			'tanggal_tolak1' => $this->tolak1->tanggal_dokumen->format('d-m-Y'),
			'nomor_sbp' => $this->tolak1->sbp->no_dok_lengkap,
			'tanggal_sbp' => $this->tolak1->sbp->penindakan->tanggal_penindakan->format('d-m-Y'),
			'pemilik' => $this->tolak1->sbp->penindakan->saksi->nama,
			'petugas1' => $this->petugas1->name,
			'petugas2' => $this->petugas2 ? $this->petugas2->name : '',
			'status' => new RefStatusResource($this->status)
		];

		return $array;
    }
}
