<?php

namespace App\Http\Resources\Intelijen;

use App\Http\Resources\DokTableResource;

class DokLptiTableResource extends DokTableResource
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
		$array['nomor_st'] = $this->nomor_st ? $this->nomor_st : '-';
		$array['tanggal_st'] = $this->tanggal_st ? $this->tanggal_st->format('d-m-Y') : '';

		return $array;
    }
}
