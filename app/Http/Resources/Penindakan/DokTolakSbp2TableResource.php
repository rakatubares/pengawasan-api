<?php

namespace App\Http\Resources\Penindakan;

class DokTolakSbp2TableResource extends DokPenindakanTableResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $tolak1 = $this->tolak1;
        $sbp = $tolak1->tolakable;

        $array = parent::toArray($request);
        $array['nomor_tolak1'] = $tolak1->no_dok_lengkap;
        $array['tanggal_tolak1'] = $tolak1->tanggal_dokumen
            ? $tolak1->tanggal_dokumen->format('d-m-Y')
            : '-';
        $array['nomor_sbp'] = $sbp->no_dok_lengkap;
        $array['tanggal_sbp'] = $sbp->tanggal_dokumen
            ? $sbp->tanggal_dokumen->format('d-m-Y')
            : '-';

        return $array;
    }
}
