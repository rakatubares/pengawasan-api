<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokReeksporTableResource extends JsonResource
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
			'jenis_dok_asal' => $this->jenis_dok_asal,
			'nomor_dok_asal' => $this->nomor_dok_asal,
			'tanggal_dok_asal' => $this->tanggal_dok_asal->format('d-m-Y'),
			'jenis_dok_ekspor' => $this->jenis_dok_ekspor,
			'nomor_dok_ekspor' => $this->nomor_dok_ekspor,
			'tanggal_dok_ekspor' => $this->tanggal_dok_ekspor->format('d-m-Y'),
			'petugas1' => $this->petugas1->name,
			'petugas2' => $this->petugas2 ? $this->petugas2->name : '',
			'status' => new RefStatusResource($this->status)
		];

		return $array;
    }
}
