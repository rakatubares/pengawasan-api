<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SbpPenindakanSarkutResource extends JsonResource
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
			'sbp_id' => $this->sbp_id,
			'nama_sarkut' => $this->nama_sarkut,
			'jenis_sarkut' => $this->jenis_sarkut,
			'no_flight_trayek' => $this->no_flight_trayek,
			'kapasitas' => $this->kapasitas,
			'satuan_kapasitas' => $this->satuan_kapasitas,
			'nama_pilot_pengemudi' => $this->nama_pilot_pengemudi,
			'bendera' => $this->bendera,
			'no_reg_polisi' => $this->no_reg_polisi,
		];

		return $array;
    }
}
