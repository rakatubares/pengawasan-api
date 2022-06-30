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
				case 'lkai':
					$lkai = new DokLkaiResource($this->lkai, 'pdf');
					$list_dokumen['lkai'] = $lkai;
					break;

				case 'lkain':
					$lkain = new DokLkaiResource($this->lkain, 'pdf');
					$list_dokumen['lkain'] = $lkain;
					break;

				case 'lppi':
					$lppi = new DokLppiResource($this->lppi, 'pdf');
					$list_dokumen['lppi'] = $lppi;
					break;

				case 'lppin':
					$lppin = new DokLppiResource($this->lppin, 'pdf');
					$list_dokumen['lppin'] = $lppin;
					break;

				case 'nhi':
					$nhi = new DokNhiResource($this->nhi, 'pdf');
					$list_dokumen['nhi'] = $nhi;
					break;

				case 'nhin':
					$nhin = new DokNhiNResource($this->nhin, 'pdf');
					$list_dokumen['nhin'] = $nhin;
					break;
				
				default:
					# code...
					break;
			}
		}

		return $list_dokumen;
	}
}
