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
		$array['no_sti'] = $this->chain->sti
			? $this->chain->sti->no_dok_lengkap
			: '-';
		$array['tgl_sti'] = $this->chain->sti
			? $this->chain->sti->tanggal_dokumen->format('d-m-Y')
			: '';

		return $array;
    }
}
