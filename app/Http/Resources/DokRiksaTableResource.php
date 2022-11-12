<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokRiksaTableResource extends JsonResource
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
			'tanggal_penindakan' => $this->penindakan->tanggal_penindakan 
				? $this->penindakan->tanggal_penindakan->format('d-m-Y') 
				: null,
			'nama_saksi' => $this->penindakan->saksi->nama,
			'petugas1' => $this->penindakan->petugas1->name,
			'petugas2' => $this->penindakan->petugas2
				? $this->penindakan->petugas2->name
				: null,
			'status' => new RefStatusResource($this->status)
		];

		return $array;
    }
}
