<?php

namespace App\Http\Resources\Penindakan;

use App\Http\Resources\DokTableResource;

class DokLphpTableResource extends DokTableResource
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
		$array['no_lptp'] = $this->chain->lptp
			? $this->chain->lptp->no_dok_lengkap
			: null;
		$array['tanggal_lptp'] = $this->chain->lptp
			? (
				$this->chain->lptp->tanggal_dokumen
				? $this->chain->lptp->tanggal_dokumen->format('d-m-Y')
				: null
			) : null;
		return $array;
    }
}
