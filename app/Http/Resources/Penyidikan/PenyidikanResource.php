<?php

namespace App\Http\Resources\Penyidikan;

use App\Http\Resources\Entitas\EntitasOrangResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PenyidikanResource extends JsonResource
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
			'jenis_pelanggaran' => $this->jenis_pelanggaran,
			'pasal' => $this->pasal,
			'tempat_pelanggaran' => $this->tempat_pelanggaran,
			'tanggal_pelanggaran' => $this->tanggal_pelanggaran
				? $this->tanggal_pelanggaran->format('d-m-Y')
				: null,
			'waktu_pelanggaran' => $this->waktu_pelanggaran,
			'modus' => $this->modus,
			'pelaku' => new EntitasOrangResource($this->pelaku),
			'tertangkap_tangan' => $this->tertangkap_tangan,
			'bhp' => new PenyidikanBhpResource($this->bhp),
		];
	}
}
