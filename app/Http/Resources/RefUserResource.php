<?php

namespace App\Http\Resources;

class RefUserResource extends RequestBasedResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function basic()
    {
        $array = [
			'user_id' => $this->user_id,
			'username' => $this->username,
			'name' => $this->name,
			'nip' => $this->nip,
			'pangkat' => $this->pangkat,
			'penempatan' => $this->penempatan,
			'pejabat' => $this->pejabat,
			'status' => $this->status,
		];

		return $array;
    }

	public function display()
	{
		$array = [
			'name' => $this->name,
			'nip' => $this->nip,
		];

		return $array;
	}
}
