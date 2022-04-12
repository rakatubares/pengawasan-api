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
			'alias' => $this->alias,
			'jenis_kelamin' => $this->jenis_kelamin,
			'tempat_lahir' => $this->tempat_lahir,
			'tanggal_lahir' => $this->tanggal_lahir ? $this->tanggal_lahir->format('d-m-Y') : null,
			'warga_negara' => $this->warga_negara,
			'agama' => $this->agama,
			'jenis_identitas' => $this->jenis_identitas,
			'nomor_identitas' => $this->nomor_identitas,
			'penerbit_identitas' => $this->penerbit_identitas,
			'tempat_identitas_terbit' => $this->tempat_identitas_terbit,
			'alamat' => $this->alamat,
			'alamat_tinggal' => $this->alamat_tinggal,
			'pekerjaan' => $this->pekerjaan,
			'nomor_telepon' => $this->nomor_telepon,
			'email' => $this->email,
		];

		return $array;
    }
}
