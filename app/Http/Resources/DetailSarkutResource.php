<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailSarkutResource extends JsonResource
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
			'nama_sarkut' => $this->nama_sarkut,
			'jenis_sarkut' => $this->jenis_sarkut,
			'no_flight_trayek' => $this->no_flight_trayek,
			'jumlah_kapasitas' => $this->kapasitas,
			'satuan_kapasitas' => $this->satuan_kapasitas,
			'bendera' => $this->bendera,
			'no_reg_polisi' => $this->no_reg_polisi,
			'pilot' => new PersonEntityResource($this->pilot)
		];

		return $array;
    }
}
