<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LampiranResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		$filepath = storage_path('app/'.$this->path.$this->filename);
		$type = pathinfo($filepath, PATHINFO_EXTENSION);
		$data = file_get_contents($filepath);
		$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

		$array = [
			'id' => $this->id,
			'mime_type' => $this->mime_type,
			'filename' => $this->filename,
			'content' => $base64
		];

		return $array;
	}
}
