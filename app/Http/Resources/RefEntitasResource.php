<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RefEntitasResource extends JsonResource
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
			'jenis_kelamin' => $this->jenis_kelamin,
			'tanggal_lahir' => $this->tanggal_lahir ? $this->tanggal_lahir->format('d-m-Y') : null,
			'warga_negara' => $this->warga_negara,
			'jenis_identitas' => $this->jenis_identitas,
			'nomor_identitas' => $this->nomor_identitas,
			'pekerjaan' => $this->pekerjaan,
			'alamat' => $this->alamat,
		];

		return $array;
    }
}
