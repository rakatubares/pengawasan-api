<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DocumentsChainResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		$data = [];

		// $doc_types = ['lppi', 'lkai', 'nhi'];
		foreach ($this->doc_types as $doc_type) {
			$doc = $this->$doc_type;
			if ($doc) {
				$data[] = [
					'doc_type' => $doc_type,
					'doc_id' => $doc->id,
				];
			}
		}

		return $data;
	}
}
