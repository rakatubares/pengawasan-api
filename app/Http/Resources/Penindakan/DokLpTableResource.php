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
        $lphp = $this->chain->$kode_lphp;
        $no_lphp = $lphp ? $lphp->no_dok_lengkap : null;
        $tgl_lphp = $lphp ? $lphp->tanggal_dokumen : null;
        if ($tgl_lphp) { $tgl_lphp = $tgl_lphp->format('d-m-Y'); }

        $array = $this->makeBasicArray();
        $array['no_lphp'] = $no_lphp;
        $array['tanggal_lphp'] = $tgl_lphp;
        return $array;
    }
}
