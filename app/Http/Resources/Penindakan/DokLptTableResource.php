<?php

namespace App\Http\Resources\Penindakan;

class DokLptTableResource extends DokPenindakanTableResource
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
		$array['no_sbp'] = $this->chain->sbp
			? $this->chain->sbp->no_dok_lengkap
			: null;
		$array['tanggal_sbp'] = $this->chain->sbp
			? (
				$this->chain->sbp->tanggal_dokumen
				? $this->chain->sbp->tanggal_dokumen->format('d-m-Y')
				: null
			) : null;
		return $array;
    }
}
