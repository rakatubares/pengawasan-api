<?php

namespace App\Http\Resources\Penindakan;

use App\Http\Resources\DokTableResource;

class DokLiTableResource extends DokTableResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $array = $this->makeBasicArray();
        $array['sumber'] = $this->sumber;
        return $array;
    }
}
