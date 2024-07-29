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
        $kode_nhi = $this->kode_nhi;

        $array = parent::toArray($request);
        $array['nomor_nhi'] = $this->chain->$kode_nhi
            ? $this->chain->$kode_nhi->no_dok_lengkap
            : '-';
        $array['tanggal_nhi'] = $this->chain->$kode_nhi
            ? $this->chain->$kode_nhi->tanggal_dokumen->format('d-m-Y')
            : '';
        return $array;
    }
}
