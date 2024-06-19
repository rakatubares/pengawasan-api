<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CacahTableResource extends JsonResource
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
			'petugas_penindakan' => $this->petugas_penindakan_1->name,
			'petugas_penyidikan' => $this->petugas_penyidikan_1->name,
			'status' => new RefStatusResource($this->status)
		];

		return $array;
    }
}
