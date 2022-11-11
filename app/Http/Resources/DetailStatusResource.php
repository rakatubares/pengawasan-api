<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailStatusResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
		$detail_list = ['sarkut', 'barang', 'bangunan', 'dokumen', 'badan'];
		$array = [];

        foreach ($detail_list as $value) {
			$column_name = 'detail_' . $value;
			if (isset($this[$column_name])) {
				$array[$value] = $this[$column_name];
			}
		}

		return $array;
    }
}
