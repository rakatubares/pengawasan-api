<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailBarangResource extends JsonResource
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
			'jumlah_kemasan' => $this->jumlah_kemasan,
			'satuan_kemasan' => $this->satuan_kemasan,
			'jns_dok' => $this->jns_dok,
			'no_dok' => $this->no_dok,
			'tgl_dok' => $this->tgl_dok ? $this->tgl_dok->format('d-m-Y') : null,
			'pemilik' => $this->pemilik,
		];

		return $array;
    }
}
