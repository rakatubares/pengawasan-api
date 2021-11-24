<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TegahResource extends JsonResource
{
	/**
	 * Create a new resource instance.
	 *
	 * @param  mixed  $resource
	 * @return void
	 */
	public function __construct($resource, $type='basic')
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
		$tegah = [
			'id' => $this->id,
			'no_dok' => $this->no_dok,
			'agenda_dok' => $this->agenda_dok,
			'thn_dok' => $this->thn_dok,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'tgl_dok' => $this->tgl_dok ? $this->tgl_dok->format('d-m-Y') : null,
			'detail_sarkut' => $this->detail_sarkut,
			'detail_barang' => $this->detail_barang,
			'sprint' => new RefSprintResource($this->sprint),
			'saksi' => new PersonEntityResource($this->saksi),
			'petugas1' => new RefUserResource($this->petugas1),
			'petugas2' => new RefUserResource($this->petugas2),
			'status' => new RefStatusResource($this->status),
		];

		if ($this->type == 'complete') {
			$tegah['detail'] = [
				'sarkut' => new DetailSarkutResource($this->sarkut),
				'barang' => new DetailBarangResource($this->barang),
			];
		}

		return $tegah;
	}
}
