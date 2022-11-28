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
		$data = file_get_contents($filepath);
		$mime = $this->mime_type;
		$base64 = 'data:' . $mime . ';base64,' . base64_encode($data);

		$array = [
			'id' => $this->id,
			'mime_type' => $this->mime_type,
			'filename' => $this->filename,
			'description' => $this->description,
			'content' => $base64
		];

		return $array;
	}
}
