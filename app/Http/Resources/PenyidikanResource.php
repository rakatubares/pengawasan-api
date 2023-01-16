<?php

namespace App\Http\Resources;

class PenyidikanResource extends RequestBasedResource
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
			'jenis_pelanggaran' => $this->jenis_pelanggaran,
			'pasal' => $this->pasal,
			'tempat_pelanggaran' => $this->tempat_pelanggaran,
			'waktu_pelanggaran' => $this->waktu_pelanggaran->format('d-m-Y H:i:s'),
			'modus' => $this->modus,
			'pelaku' => new RefEntitasResource($this->pelaku),
			'status_penangkapan' => $this->status_penangkapan,
		];
		return $array;
	}

	protected function objek()
	{
		$object_type = $this->penindakan->object_type;
		$object_data = $this->penindakan->objectable;
		$objek = new ObjectResource($object_data, $object_type);
		return $objek;
	}
}
