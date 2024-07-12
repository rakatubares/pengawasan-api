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

		foreach ($this->docTypes as $docType) {
			$doc = $this->$docType;
			if ($doc) {
				$data[] = [
					'doc_type' => $docType,
					'doc_id' => $doc->id,
				];
			}
		}

		return $data;
	}
}
