<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokSbpTableResource extends JsonResource
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
			'tanggal_dokumen' => $this->penindakan->tanggal_penindakan 
				? $this->penindakan->tanggal_penindakan->format('d-m-Y') 
				: '-',
			'nama_saksi' => $this->penindakan->object_type == 'orang'
				? $this->penindakan->objectable->nama
				: $this->penindakan->saksi->nama,
			'petugas1' => $this->penindakan->petugas1->name,
			'petugas2' => $this->penindakan->petugas2
				? $this->penindakan->petugas2->name
				: '',
			'status' => new RefStatusResource($this->status)
		];

		return $array;
    }
}
