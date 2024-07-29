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
        $sbp = $this->chain->sbp;
        $no_sbp = $sbp ? $sbp->no_dok_lengkap : null;
        $tgl_sbp = $sbp ? $sbp->tanggal_dokumen : null;
        if ($tgl_sbp) { $tgl_sbp = $tgl_sbp->format('d-m-Y'); }

        $array = parent::toArray($request);
        $array['no_sbp'] = $no_sbp;
        $array['tanggal_sbp'] = $tgl_sbp;
        return $array;
    }
}
