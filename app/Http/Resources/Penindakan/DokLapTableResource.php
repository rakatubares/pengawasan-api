<?php

namespace App\Http\Resources\Penindakan;

use App\Http\Resources\DokTableResource;

class DokLapTableResource extends DokTableResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
		$array = $this->makeBasicArray();
		$array['nomor_sumber'] = $this->nomor_sumber;
		$array['tanggal_sumber'] = $this->tanggal_sumber
			? $this->tanggal_sumber->format('d-m-Y')
			: null;
		return $array;
    }
}
