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
			'no_sprint' => $this->sprint->nomor_sprint,
			'tgl_sprint' => $this->sprint->tanggal_sprint->format('d-m-Y'),
			'detail_sarkut' => $this->detail_sarkut,
			'detail_barang' => $this->detail_barang,
			'detail_bangunan' => $this->detail_bangunan,
			'detail_badan' => $this->detail_badan,
			'lokasi_penindakan' => $this->lokasi_penindakan,
			'uraian_penindakan' => $this->uraian_penindakan,
			'alasan_penindakan' => $this->alasan_penindakan,
			'jenis_pelanggaran' => $this->jenis_pelanggaran,
			'wkt_mulai_penindakan' => $this->wkt_mulai_penindakan->format('d-m-Y H:i'),
			'wkt_selesai_penindakan' => $this->wkt_selesai_penindakan->format('d-m-Y H:i'),
			'hal_terjadi' => $this->hal_terjadi,
			'nama_saksi' => $this->saksi->nama,
			'pejabat1' => $this->pejabat1,
			'pejabat2' => $this->pejabat2,
			'kode_status' => $this->status->kode_status,
			'short_status' => $this->status->short_status,
			'uraian_status' => $this->status->uraian_status,
			'detail' => [
				'sarkut' => new DetailSarkutResource($this->sarkut),
				'bangunan' => new DetailBangunanResource($this->bangunan),
				'barang' => new DetailBarangResource($this->barang),
				'badan' => new DetailBadanResource($this->badan)
			]
		];

		return $array;
    }
}
