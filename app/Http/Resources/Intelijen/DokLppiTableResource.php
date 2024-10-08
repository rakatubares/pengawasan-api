<?php

namespace App\Http\Resources\Intelijen;

use App\Http\Resources\DokTableResource;

class DokLppiTableResource extends DokTableResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $kodeLpti = $this->kodeLpti;

        $penerima_disposisi = $this->detail_petugas()
            ->where('detail_petugas.posisi', 'penerima_disposisi')
            ->latest()
            ->first();

        $array = $this->makeBasicArray();
        $array['no_lpti'] = $this->chain->$kodeLpti
            ? $this->chain->$kodeLpti->no_dok_lengkap
            : '-';
        $array['tgl_lpti'] = $this->chain->$kodeLpti
            ? $this->chain->$kodeLpti->tanggal_dokumen->format('d-m-Y')
            : '';
        $array['disposisi'] = $penerima_disposisi->petugas->name;
        return $array;
    }
}
