<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RefSprintResource extends JsonResource
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
			'nomor_sprint' => $this->nomor_sprint,
			'tanggal_sprint' => $this->tanggal_sprint->format('d-m-Y'),
			'pejabat_id' => $this->pejabat_id
		];

		return $array;
    }
}
