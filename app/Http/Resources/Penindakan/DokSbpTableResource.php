<?php

namespace App\Http\Resources\Penindakan;

class DokSbpTableResource extends DokPenindakanTableResource
{
	/**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
		$array = parent::toArray($request);
		$array['nomor_nhi'] = $this->chain->nhi ? $this->chain->nhi->no_dok_lengkap : '-';
		$array['tanggal_nhi'] = $this->chain->nhi 
			? $this->chain->nhi->tanggal_dokumen->format('d-m-Y')  
			: '';
		return $array;
	}
}
