<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RefUserResource extends JsonResource
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
			'user_id' => $this->user_id,
			'username' => $this->username,
			'name' => $this->name,
			'nip' => $this->nip,
			'pangkat' => $this->pangkat,
			'penempatan' => $this->penempatan,
			'status' => $this->status,
		];

		return $array;
    }
}
