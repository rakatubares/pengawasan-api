<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailBarangItemWithImagesResource extends JsonResource
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
			'satuan_barang' => $this->satuan_barang,
			'uraian_barang' => $this->uraian_barang,
			'image_list' => LampiranResource::collection($this->images)
		];

		return $array;
	}
}
