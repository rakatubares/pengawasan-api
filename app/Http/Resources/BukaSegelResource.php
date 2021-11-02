<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BukaSegelResource extends JsonResource
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
			'no_dok' => $this->no_dok,
			'agenda_dok' => $this->agenda_dok,
			'thn_dok' => $this->thn_dok,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'tgl_dok' => $this->tgl_dok ? $this->tgl_dok->format('d-m-Y') : null,
			'no_sprint' => $this->no_sprint,
			'tgl_sprint' => $this->tgl_sprint->format('d-m-Y'),
			'penindakan_sarkut' => $this->penindakan_sarkut,
			'penindakan_barang' => $this->penindakan_barang,
			'penindakan_bangunan' => $this->penindakan_bangunan,
			'jenis_segel' => $this->jenis_segel,
			'jumlah_segel' => $this->jumlah_segel,
			'nomor_segel' => $this->nomor_segel,
			'tempat_segel' => $this->tempat_segel,
			'nama_saksi' => $this->nama_saksi,
			'alamat_saksi' => $this->alamat_saksi,
			'pekerjaan_saksi' => $this->pekerjaan_saksi,
			'jns_identitas' => $this->jns_identitas,
			'no_identitas' => $this->no_identitas,
			'pejabat1' => $this->pejabat1,
			'pejabat2' => $this->pejabat2,
			'status' => new RefStatusResource($this->status),
		];

		return $array;
    }
}
