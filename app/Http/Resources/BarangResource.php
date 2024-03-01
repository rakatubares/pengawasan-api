<?php

namespace App\Http\Resources;

use App\Http\Resources\References\RefKategoriBarangResource;
use App\Http\Resources\References\RefSatuanResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BarangResource extends JsonResource
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
			'jumlah_barang' => $this->jumlah_barang,
			'satuan' => new RefSatuanResource($this->satuan),
			'uraian_barang' => $this->uraian_barang,
			'kategori' => new RefKategoriBarangResource($this->kategori),
			'berat' => $this->berat,
			'satuan_berat' => $this->satuan_berat,
		];

		return $array;
	}
}
