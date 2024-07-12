<?php

namespace App\Http\Resources\Intelijen;

use Illuminate\Http\Resources\Json\JsonResource;

class DokStiTugasResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
			'id' => $this->id,
			'tugas' => $this->tugas,
		];
    }
}
