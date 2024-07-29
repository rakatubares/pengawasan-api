<?php

namespace App\Http\Resources\Penindakan;

use App\Http\Resources\Entitas\EntitasOrangResource;
use App\Http\Resources\ListPosisiPegawaiResource;
use App\Http\Resources\References\RefKategoriPelanggaranResource;
use App\Http\Resources\SprintResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PenindakanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $array = [
            'id' => $this->id,
            'sprint' => new SprintResource($this->sprint),
            'tanggal_mulai_penindakan' => $this->tanggal_mulai_penindakan
                ? $this->tanggal_mulai_penindakan->format('d-m-Y')
                : null,
            'waktu_mulai_penindakan' => $this->waktu_mulai_penindakan,
            'tanggal_selesai_penindakan' => $this->tanggal_selesai_penindakan
                ? $this->tanggal_selesai_penindakan->format('d-m-Y')
                : null,
            'waktu_selesai_penindakan' => $this->waktu_selesai_penindakan,
            'lokasi_penindakan' => $this->lokasi_penindakan,
            'kategori_penindakan' => new RefKategoriPelanggaranResource($this->kategori_penindakan),
            'uraian_penindakan' => $this->uraian_penindakan,
            'alasan_penindakan' => $this->alasan_penindakan,
            'jenis_pelanggaran' => $this->jenis_pelanggaran,
            'hal_terjadi' => $this->hal_terjadi,
            'saksi' => new EntitasOrangResource($this->saksi),
            'petugas' => ListPosisiPegawaiResource::associative($this->detail_petugas),
            'objek' => [],
        ];

        if ($this->sarkut) {
            $array['objek']['sarkut'] = new PenindakanSarkutResource($this->sarkut);
        }
        
        if ($this->barang) {
            $array['objek']['barang'] = new PenindakanBarangResource($this->barang);
        }

        if ($this->bangunan) {
            $array['objek']['bangunan'] = new PenindakanBangunanResource($this->bangunan);
        }

        if ($this->badan) {
            $array['objek']['badan'] = new PenindakanBadanResource($this->badan);
        }
        
        return $array;
    }
}
