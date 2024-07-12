<?php

namespace App\Http\Resources\Penyidikan;

use App\Http\Resources\BarangResource;
use App\Http\Resources\References\RefKemasanResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PenyidikanBhpResource extends JsonResource
{
	/**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
	{
		return [
			'id' => $this->id,
			'jumlah_kemasan' => $this->jumlah_kemasan,
			'kemasan' => new RefKemasanResource($this->kemasan),
			'nomor_kemasan' => $this->nomor_kemasan,
			'jenis_dokumen' => $this->jenis_dokumen,
			'nomor_dokumen' => $this->nomor_dokumen,
			'tanggal_dokumen' => $this->tanggal_dokumen
				? $this->tanggal_dokumen->format('d-m-Y')
				: null,
			'nama_sarkut' => $this->nama_sarkut,
			'jenis_sarkut' => $this->jenis_sarkut,
			'nomor_sarkut' => $this->nomor_sarkut,
			'registrasi_sarkut' => $this->registrasi_sarkut,
			'nomor_kontainer' => $this->nomor_kontainer,
			'ukuran_kontainer' => $this->ukuran_kontainer,
			'item' => BarangResource::collection($this->barang),
		];
	}
}
