<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokBukaSegelTableResource extends JsonResource
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
			'no_ba_segel' => $this->penindakan->segel 
				? $this->penindakan->segel->no_dok_lengkap
				: '-',
			'tgl_ba_segel' => $this->penindakan->segel
				? $this->penindakan->tanggal_penindakan->format('d-m-Y')
				: '',
			'nama_saksi' => $this->saksi->nama,
			'petugas1' => $this->petugas1->name,
			'petugas2' => $this->petugas2
				? $this->petugas2->name
				: null,
			'status' => new RefStatusResource($this->status)
		];

		return $array;
    }
}
