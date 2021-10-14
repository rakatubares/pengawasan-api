<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SbpHeaderDetailResource extends JsonResource
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
			'sarkut' => $this->penindakan_sarkut,
			'barang' => $this->penindakan_barang,
			'bangunan' => $this->penindakan_bangunan,
			'badan' => $this->penindakan_badan,
		];

		return $array;
    }
}
