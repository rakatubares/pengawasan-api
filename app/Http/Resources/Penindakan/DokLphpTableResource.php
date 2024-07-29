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
        $kode_lptp = $this->kode_lptp;
        $lptp = $this->chain->$kode_lptp;
        $no_lptp = $lptp ? $lptp->no_dok_lengkap : null;
        $tgl_lptp = $lptp ? $lptp->tanggal_dokumen : null;
        if ($tgl_lptp) { $tgl_lptp = $tgl_lptp->format('d-m-Y'); }

        $array = $this->makeBasicArray();
        $array['no_lptp'] = $no_lptp;
        $array['tanggal_lptp'] = $tgl_lptp;
        return $array;
    }
}
