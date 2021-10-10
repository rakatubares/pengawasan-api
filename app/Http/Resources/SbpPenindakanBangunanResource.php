<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SbpPenindakanBangunanResource extends JsonResource
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
			'alamat' => $this->alamat,
			'no_reg' => $this->no_reg,
			'pemilik' => $this->pemilik,
			'jns_identitas' => $this->jns_identitas,
			'no_identitas' => $this->no_identitas,
		];

		return $array;
    }
}
