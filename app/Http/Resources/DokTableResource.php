<?php

namespace App\Http\Resources;

use App\Http\Resources\References\RefKodeDokumenResource;
use App\Http\Resources\References\RefStatusResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DokTableResource extends JsonResource
{
	protected function makeBasicArray() {
		$document_status = new RefStatusResource($this->status);
		$chain_status = new RefKodeDokumenResource($this->chain->status);

		if (in_array($document_status->kode_status, ['draft', 'aju-perbaikan', 'aju-batal', 'batal', 'dihapus'])) {
			$status = $document_status->kode_status;
		} else {
			$status = $chain_status->short_title;
		}

		$array = [
			'id' => $this->id,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'tanggal_dokumen' => $this->tanggal_dokumen 
				? $this->tanggal_dokumen->format('d-m-Y') 
				: '-',
			'status' => $status,
			'status_color' => $document_status->color,
			'status_dokumen' => $this->kode_status,
		];

		return $array;
	}
}
