<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IntelijenResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		$list_dokumen = [];
		foreach ($this->dokumen as $dok) {
			$jenis = $dok->object2_type;

			switch ($jenis) {
				case 'lppi':
					$lppi = new DokLppiResource($this->lppi, 'pdf');
					$list_dokumen['lppi'] = $lppi;
					break;
				
				default:
					# code...
					break;
			}
		}

		return $list_dokumen;
	}
}
