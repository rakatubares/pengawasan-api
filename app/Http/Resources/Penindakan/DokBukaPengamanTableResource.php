<?php

namespace App\Http\Resources\Penindakan;

class DokBukaPengamanTableResource extends DokPenindakanTableResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $petugas1 = $this->detail_petugas()
            ->where('detail_petugas.posisi', 'petugas1')
            ->latest()
            ->first();

        $petugas2 = $this->detail_petugas()
            ->where('detail_petugas.posisi', 'petugas2')
            ->latest()
            ->first();

        $array = parent::toArray($request);
        $array['nomor_pengaman'] = $this->asal_pengaman == 'pengaman'
            ? $this->chain->pengaman->nomor_pengaman
            : $this->nomor_pengaman;
        $array['tanggal_pengaman'] = $this->tanggalPengaman();
        $array['nama_saksi'] = $this->saksi ? $this->saksi->nama : '-';
        $array['petugas1'] = $petugas1 ? $petugas1->petugas->name : '-';
        $array['petugas2'] = $petugas2 ? $petugas2->petugas->name : '-';

        return $array;
    }

    private function tanggalPengaman()
    {
        $date = null;

        if ($this->asal_pengaman == 'pengaman') {
            // Gunakan tanggal dari dokumen sumber
            $date = $this->chain->penindakan->tanggal_selesai_penindakan;
        } else {
            // Gunakan tanggal dari dokumen pembukaan
            $date = $this->tanggal_pengaman;
        }
        
        if ($date) { $date = $date->format('d-m-Y'); }

        return $date;
    }
}
