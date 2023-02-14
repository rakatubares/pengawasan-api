<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokLpfTableResource extends JsonResource
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
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'tanggal_dokumen' => $this->tanggal_dokumen 
				? $this->tanggal_dokumen->format('d-m-Y') 
				: null,
			'no_lpp' => $this->lpp->no_dok_lengkap,
			'tanggal_lpp' => $this->lpp->tanggal_dokumen->format('d-m-Y'),
			'peneliti' => $this->peneliti->name,
			'status' => new RefStatusResource($this->status)
		];

		return $array;
    }
}
