<?php

namespace App\Http\Resources;

// use Illuminate\Http\Resources\Json\JsonResource;

class DokNiTableResource extends DokTableResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		// $array = [
		// 	'id' => $this->id,
		// 	'no_dok_lengkap' => $this->no_dok_lengkap,
		// 	'tanggal_dokumen' => $this->tanggal_dokumen 
		// 		? $this->tanggal_dokumen->format('d-m-Y') 
		// 		: '-',
		// 	'no_lkai' => $this->intelijen->lkai
		// 		? $this->intelijen->lkai->no_dok_lengkap
		// 		: '-',
		// 	'tgl_lkai' => $this->intelijen->lkai
		// 		? $this->intelijen->lkai->tanggal_dokumen->format('d-m-Y')
		// 		: '',
		// 	'status' => new RefStatusResource($this->status)
		// ];

		$array = $this->makeBasicArray();
		$array['no_lkai'] = $this->chain->lkai
			? $this->chain->lkai->no_dok_lengkap
			: '-';
		$array['tgl_lkai'] = $this->chain->lkai
			? $this->chain->lkai->tanggal_dokumen->format('d-m-Y')
			: '';

		return $array;
	}
}
