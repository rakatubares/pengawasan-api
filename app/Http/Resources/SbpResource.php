<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SbpResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $array = [
			'id' => $this->id,
			'no_dok' => $this->no_dok,
			'agenda_dok' => $this->agenda_dok,
			'thn_dok' => $this->thn_dok,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'tgl_dok' => $this->tgl_dok ? $this->tgl_dok->format('d-m-Y') : null,
			'no_sprint' => $this->no_sprint,
			'tgl_sprint' => $this->tgl_sprint->format('d-m-Y'),
			'detail_sarkut' => $this->penindakan_sarkut,
			'detail_barang' => $this->penindakan_barang,
			'detail_bangunan' => $this->penindakan_bangunan,
			'detail_badan' => $this->penindakan_badan,
			'lokasi_penindakan' => $this->lokasi_penindakan,
			'uraian_penindakan' => $this->uraian_penindakan,
			'alasan_penindakan' => $this->alasan_penindakan,
			'jenis_pelanggaran' => $this->jenis_pelanggaran,
			'wkt_mulai_penindakan' => $this->wkt_mulai_penindakan->format('d-m-Y H:i'),
			'wkt_selesai_penindakan' => $this->wkt_selesai_penindakan->format('d-m-Y H:i'),
			'hal_terjadi' => $this->hal_terjadi,
			'nama_pemilik' => $this->nama_pemilik,
			'pejabat1' => $this->pejabat1,
			'pejabat2' => $this->pejabat2,
			'status' => new RefStatusResource($this->status),
			'stat' => $this->status,
			'kode_status' => $this->kode_status
		];

		return $array;
    }
}
