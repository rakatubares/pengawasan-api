<?php

namespace App\Http\Resources\Penindakan;

use App\Http\Resources\DokTableResource;

class DokLpTableResource extends DokTableResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
		$kode_lphp = $this->kode_lphp;

        $array = $this->makeBasicArray();
		$array['no_lphp'] = $this->chain->$kode_lphp
			? $this->chain->$kode_lphp->no_dok_lengkap
			: null;
		$array['tanggal_lphp'] = $this->chain->$kode_lphp
			? (
				$this->chain->$kode_lphp->tanggal_dokumen
				? $this->chain->$kode_lphp->tanggal_dokumen->format('d-m-Y')
				: null
			) : null;
		return $array;
    }
}
