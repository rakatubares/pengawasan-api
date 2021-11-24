<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SbpResource extends JsonResource
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
		$sbp = [
			'id' => $this->id,
			'no_dok' => $this->no_dok,
			'agenda_dok' => $this->agenda_dok,
			'thn_dok' => $this->thn_dok,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'tgl_dok' => $this->tgl_dok ? $this->tgl_dok->format('d-m-Y') : null,
			'lokasi_penindakan' => $this->lokasi_penindakan,
			'uraian_penindakan' => $this->uraian_penindakan,
			'alasan_penindakan' => $this->alasan_penindakan,
			'jenis_pelanggaran' => $this->jenis_pelanggaran,
			'wkt_mulai_penindakan' => $this->wkt_mulai_penindakan->format('d-m-Y H:i'),
			'wkt_selesai_penindakan' => $this->wkt_selesai_penindakan->format('d-m-Y H:i'),
			'hal_terjadi' => $this->hal_terjadi,
			'sprint' => new RefSprintResource($this->sprint),
			'saksi' => new PersonEntityResource($this->saksi),
			'petugas1' => new RefUserResource($this->petugas1),
			'petugas2' => new RefUserResource($this->petugas2),
			'status' => new RefStatusResource($this->status),
		];

		if ($this->type == 'complete') {
			$sbp['detail'] = [
				'sarkut' => new DetailSarkutResource($this->sarkut),
				'bangunan' => new DetailBangunanResource($this->bangunan),
				'barang' => new DetailBarangResource($this->barang),
				'badan' => new DetailBadanResource($this->badan)
			];
		}

		return $sbp;
    }
}
