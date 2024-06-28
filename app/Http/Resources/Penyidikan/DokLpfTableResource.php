<?php

namespace App\Http\Resources\Penyidikan;

use App\Http\Resources\DokTableResource;

class DokLpfTableResource extends DokTableResource
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
		$lpp = $this->chain->lpp;
		$array['nomor_lpp'] = $lpp->no_dok_lengkap;
		$array['tanggal_lpp'] = $lpp->tanggal_dokumen
			? $lpp->tanggal_dokumen->format('d-m-Y')
			: null;

		return $array;
    }
}
