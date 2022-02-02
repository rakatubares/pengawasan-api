<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokLptpResource extends JsonResource
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
			'alasan_tidak_penindakan' => $this->alasan_tidak_penindakan,
			'plh' => $this->plh,
			'jabatan_atasan' => new JabatanResource($this->jabatan),
			'atasan' => new RefUserResource($this->atasan),
			'kode_status' => $this->kode_status,
			'penindakan' => $this->penindakan
		];

		return $array;
    }
}
