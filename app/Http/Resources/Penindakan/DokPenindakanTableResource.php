<?php

namespace App\Http\Resources\Penindakan;

use App\Http\Resources\DokTableResource;

class DokPenindakanTableResource extends DokTableResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $petugas1 = $this->chain->penindakan->detail_petugas()
            ->where('detail_petugas.posisi', 'petugas1')
            ->latest()
            ->first();

        $petugas2 = $this->chain->penindakan->detail_petugas()
            ->where('detail_petugas.posisi', 'petugas2')
            ->latest()
            ->first();

        $array = $this->makeBasicArray();
        $array['nama_saksi'] = $this->chain->penindakan->saksi
            ? $this->chain->penindakan->saksi->nama : '-';
        $array['petugas1'] = $petugas1 ? $petugas1->petugas->name : '-';
        $array['petugas2'] = $petugas2 ? $petugas2->petugas->name : '-';

        return $array;
    }
}
