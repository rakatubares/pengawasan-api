<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ObjectResource extends JsonResource
{
	/**
     * Create a new resource instance.
     *
     * @param  mixed  $resource
     * @return void
     */
    public function __construct($resource, $type=null)
    {
        $this->resource = $resource;
		$this->type = $type;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        switch ($this->type) {
			case 'sarkut':
				$object_array = new DetailSarkutResource($this->resource);
				break;

			case 'barang':
				$object_array = new DetailBarangResource($this->resource);
				break;

			case 'bangunan':
				$object_array = new DetailBangunanResource($this->resource);
				break;

			case 'orang':
				$object_array = new RefEntitasResource($this->resource);
				break;
			
			default:
				$object_array = null;
				break;
		}

		$array = [
			'type' => $this->type,
			'data' => $object_array
		];

		return $array;
    }
}
