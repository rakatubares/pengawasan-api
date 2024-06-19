<?php

namespace App\Http\Resources\Intelijen;

use Illuminate\Http\Resources\Json\JsonResource;

class DokNhiDetailResource extends JsonResource
{
	/**
	 * Create a new resource instance.
	 *
	 * @param  mixed  $resource
	 * @param  string  $type
	 * @return void
	 */
	public function __construct($resource, $type)
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
			case 'nhi-exim':
			case 'nhin-exim':
				$detail = new DokNhiEximResource($this->resource);
				break;

			case 'nhi-bkc':
				$detail = new DokNhiBkcResource($this->resource);
				break;

			case 'nhi-tertentu':
				$detail = new DokNhiTertentuResource($this->resource);
				break;

			case 'nhin-sarkut':
				$detail = new DokNhiNSarkutResource($this->resource);
				break;

			case 'nhin-orang':
				$detail = new DokNhiNOrangResource($this->resource);
				break;

			default:
				$detail = $this->resource;
				break;
		}

		$array = [
			'type' => $this->type,
			'data' => $detail,
		];

		return $array;
	}
}
