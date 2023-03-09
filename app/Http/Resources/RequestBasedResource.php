<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RequestBasedResource extends JsonResource
{
	/**
	 * Create a new resource instance.
	 *
	 * @param  mixed  $resource
	 * @return void
	 */
	public function __construct($resource, $request_type='')
	{
		$this->resource = $resource;
		$this->request_type = $request_type;
	}

	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		$request_type = $this->request_type;
		if (gettype($request_type) == 'string') {
			try {
				$array = $this->$request_type();
			} catch (\BadMethodCallException $e) {
				$array = $this->basic();
			}
		} else {
			$array = $this->basic();
		}
		
		return $array;
	}

	protected function number()
	{
		$array = [
			'id' => $this->id,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'tanggal_dokumen' => $this->tanggal_dokumen->format('d-m-Y'),
		];

		return $array;
	}
}
