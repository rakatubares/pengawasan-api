<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokBastTableResource extends JsonResource
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
			'yang_menerima' => $this->getEntity($this->yang_menerima, $this->yang_menerima_type),
			'yang_menyerahkan' => $this->getEntity($this->yang_menyerahkan, $this->yang_menyerahkan_type),
			'status' => new RefStatusResource($this->status)
		];

		return $array;
    }

	private function getEntity($entity_object, $entity_type)
	{
		switch ($entity_type) {
			case 'pegawai':
				$entity = new RefUserResource($entity_object);
				$name = $entity->name;
				break;

			case 'orang':
				$entity = new RefEntitasResource($entity_object);
				$name = $entity->nama;
				break;
			
			default:
				# code...
				break;
		}

		return $name;
	}
}
