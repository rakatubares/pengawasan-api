<?php

namespace App\Http\Resources\Entitas;

use Illuminate\Http\Resources\Json\JsonResource;

class EntitasBadanHukumResource extends JsonResource
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
			'nama' => $this->nama,
			'alamat' => $this->alamat,
			'pekerjaan' => $this->pekerjaan,
			'nomor_telepon' => $this->nomor_telepon,
			'identitas' => EntitasIdentitasResource::collection($this->identitas),
		];

		return $array;
    }
}
