<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SerahTerimaResource extends JsonResource
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
			'tgl_dok' => $this->tgl_dok ? $this->tgl_dok->format('d-m-Y') : null,
			'no_sprint' => $this->no_sprint,
			'tgl_sprint' => $this->tgl_sprint->format('d-m-Y'),
			'detail_sarkut' => $this->detail_sarkut,
			'detail_barang' => $this->detail_barang,
			'detail_dokumen' => $this->detail_dokumen,
			'detail_badan' => $this->detail_badan,
			'nama_penerima' => $this->nama_penerima,
			'jns_identitas' => $this->jns_identitas,
			'no_identitas' => $this->no_identitas,
			'atas_nama_penerima' => $this->atas_nama_penerima,
			'dalam_rangka' => $this->dalam_rangka,
			'pejabat' => $this->pejabat,
			'item' => DetailBarangWithSingleItemResource::collection($this->barang),
			'status' => new RefStatusResource($this->status),
		];

		return $array;
    }
}
