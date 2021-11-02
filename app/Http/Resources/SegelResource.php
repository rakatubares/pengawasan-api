<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SegelResource extends JsonResource
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
			'detail_sarkut' => $this->detail_sarkut,
			'detail_barang' => $this->detail_barang,
			'detail_bangunan' => $this->detail_bangunan,
			'jenis_segel' => $this->jenis_segel,
			'jumlah_segel' => $this->jumlah_segel,
			'nomor_segel' => $this->nomor_segel,
			'lokasi_segel' => $this->lokasi_segel,
			'nama_pemilik' => $this->nama_pemilik,
			'alamat_pemilik' => $this->alamat_pemilik,
			'pekerjaan_pemilik' => $this->pekerjaan_pemilik,
			'jns_identitas' => $this->jns_identitas,
			'no_identitas' => $this->no_identitas,
			'pejabat1' => $this->pejabat1,
			'pejabat2' => $this->pejabat2,
			'status' => new RefStatusResource($this->status),
		];

		return $array;
    }
}
