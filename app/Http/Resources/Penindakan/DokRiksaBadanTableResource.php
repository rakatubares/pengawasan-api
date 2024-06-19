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
		$array['entitas'] = $this->chain->penindakan->badan ?
			$this->chain->penindakan->badan->entitas->nama : null;
		return $array;
	}
}
