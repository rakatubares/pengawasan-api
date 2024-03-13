<?php

namespace App\Http\Resources\References;

use Illuminate\Http\Resources\Json\JsonResource;

class RefJabatanResource extends JsonResource
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
			'parent_id' => $this->parent_id,
			'level' => $this->level,
			'kode' => $this->kode,
			'jabatan' => $this->jabatan,
			'active' => $this->active
		];

		return $array;
    }
}
