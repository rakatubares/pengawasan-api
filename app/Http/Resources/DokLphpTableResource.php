<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokLphpTableResource extends JsonResource
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
			'no_sbp' => $this->lptp->sbp->no_dok_lengkap,
			'tanggal_sbp' => $this->lptp->sbp->penindakan->tanggal_penindakan->format('d-m-Y'),
			'status' => new RefStatusResource($this->status)
		];

		return $array;
    }
}
