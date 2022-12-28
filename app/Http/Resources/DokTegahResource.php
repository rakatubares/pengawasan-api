<?php

namespace App\Http\Resources;

class DokTegahResource extends RequestBasedResource
{	
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	protected function basic()
	{
		$array = [
			'id' => $this->id,
			'no_dok' => $this->no_dok,
			'agenda_dok' => $this->agenda_dok,
			'thn_dok' => $this->thn_dok,
			'no_dok_lengkap' => $this->no_dok_lengkap,
		];

		return $array;
	}

	protected function pdf()
	{
		$array = $this->basic();
		$array['penindakan'] = new PenindakanResource($this->penindakan, 'basic');
		$array['objek'] = new ObjectResource($this->penindakan->objectable, $this->penindakan->object_type);
		$array['kode_status'] = $this->kode_status;

		if ($array['objek'] != null) {
			if ($array['objek']->type == 'barang') {
				$riksa = $this->penindakan->riksa;
				if ($riksa != null) {
					$array['riksa'] = $riksa->no_dok_lengkap;
				}
			}
		}
		
		return $array;
	}
}
