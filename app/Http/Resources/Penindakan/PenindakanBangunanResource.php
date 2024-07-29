<?php

namespace App\Http\Resources\Penindakan;

use App\Http\Resources\Entitas\EntitasOrangResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PenindakanBangunanResource extends JsonResource
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
            'alamat' => $this->alamat,
            'no_reg' => $this->no_reg,
            'pemilik' => new EntitasOrangResource($this->pemilik)
        ];
    }
}
