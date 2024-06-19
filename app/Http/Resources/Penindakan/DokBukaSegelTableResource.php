<?php

namespace App\Http\Resources\Penindakan;

class DokBukaSegelTableResource extends DokPenindakanTableResource
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
		$array['nomor_segel'] = $this->asal_segel == 'segel'
			? $this->chain->segel->nomor_segel
			: $this->nomor_segel;
		$array['tanggal_segel'] = $this->asal_segel == 'segel'
			? $this->chain->penindakan->tanggal_selesai_penindakan->format('d-m-Y') 
			: (
				$this->tanggal_segel 
				? $this->tanggal_segel->format('d-m-Y') 
				: '-'
			);
		$array['nama_saksi'] = $this->saksi ? $this->saksi->nama : '-';
		$array['petugas1'] = $petugas1 ? $petugas1->petugas->name : '-';
		$array['petugas2'] = $petugas2 ? $petugas2->petugas->name : '-';

		return $array;
    }
}
