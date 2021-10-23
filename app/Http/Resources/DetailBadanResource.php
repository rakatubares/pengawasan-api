<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailBadanResource extends JsonResource
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
			'sbp_id' => $this->sbp_id,
			'nama' => $this->nama,
			'tgl_lahir' => $this->tgl_lahir ? $this->tgl_lahir->format('d-m-Y') : null,
			'warga_negara' => $this->warga_negara,
			'alamat' => $this->alamat,
			'jns_identitas' => $this->jns_identitas,
			'no_identitas' => $this->no_identitas,
		];

		return $array;
    }
}
