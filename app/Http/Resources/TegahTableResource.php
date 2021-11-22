<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TegahTableResource extends JsonResource
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
			'tgl_dok' => $this->tgl_dok ? $this->tgl_dok->format('d-m-Y') : null,
			'nama_saksi' => $this->saksi->nama,
			'pejabat1' => $this->pejabat1,
			'status' => new RefStatusResource($this->status)
		];

		return $array;
    }
}
