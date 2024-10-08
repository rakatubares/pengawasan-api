<?php

namespace App\Http\Resources\Intelijen;

use App\Http\Resources\DokTableResource;

class DokLkaiTableResource extends DokTableResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $kodeLppi = $this->kodeLppi;

        $analis = $this->detail_petugas()
            ->where('detail_petugas.posisi', 'analis')
            ->latest()
            ->first();

        $array = $this->makeBasicArray();
        $array['no_lppi'] = $this->chain->$kodeLppi
            ? $this->chain->$kodeLppi->no_dok_lengkap
            : '-';
        $array['tgl_lppi'] = $this->chain->$kodeLppi
            ? $this->chain->$kodeLppi->tanggal_dokumen->format('d-m-Y')
            : '';
        $array['analis'] = $analis->petugas->name;
        return $array;
    }
}
