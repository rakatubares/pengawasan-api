<?php

namespace App\Http\Resources\Penindakan;

class DokRiksaBadanTableResource extends DokPenindakanTableResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $array = parent::toArray($request);
		$nama_entitas = null;
		if ($this->chain->penindakan->badan) {
			if ($this->chain->penindakan->badan->entitas) {
				$nama_entitas = $this->chain->penindakan->badan->entitas->nama;
			}
		}
        $array['entitas'] = $nama_entitas;
        return $array;
    }
}
