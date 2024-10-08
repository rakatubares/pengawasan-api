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
        $kodeNhi = $this->kodeNhi;

        $array = parent::toArray($request);
        $array['nomor_nhi'] = $this->chain->$kodeNhi
            ? $this->chain->$kodeNhi->no_dok_lengkap
            : '-';
        $array['tanggal_nhi'] = $this->chain->$kodeNhi
            ? $this->chain->$kodeNhi->tanggal_dokumen->format('d-m-Y')
            : '';
        return $array;
    }
}
