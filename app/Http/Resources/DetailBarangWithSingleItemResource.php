<?php

namespace App\Http\Resources;

use App\Models\DetailBarang;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailBarangWithSingleItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
		$item = DetailBarang::find($this->id)
			->itemBarang()
			->first();

        $array = [
			'id_item' => $item->id,
			'uraian_barang' => $item->uraian_barang,
			'jumlah_barang' => $item->jumlah_barang,
			'satuan_barang' => $item->satuan_barang,
			'id_barang' => $this->id,
			'jumlah_kemasan' => $this->jumlah_kemasan,
			'satuan_kemasan' => $this->satuan_kemasan,
		];

		return $array;
    }
}
