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
			'dokumen' => new DetailDokumenResource($this->dokumen),
			'pemilik' => new PersonEntityResource($this->pemilik),
			'item' => DetailBarangItemResource::collection($this->itemBarang)
		];

		return $array;
    }
}
