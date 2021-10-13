<?php

namespace App\Http\Resources;

use App\Models\RefStatus;
use Illuminate\Http\Resources\Json\JsonResource;

class SbpHeaderResource extends JsonResource
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
			'no_sbp' => $this->no_sbp,
			'agenda_sbp' => $this->agenda_sbp,
			'thn_sbp' => $this->thn_sbp,
			'no_sbp_lengkap' => $this->no_sbp_lengkap,
			'tgl_sbp' => $this->tgl_sbp ? $this->tgl_sbp->format('d-m-Y') : null,
			'no_sprint' => $this->no_sprint,
			'tgl_sprint' => $this->tgl_sprint->format('d-m-Y'),
			'penindakan_sarkut' => $this->penindakan_sarkut,
			'penindakan_barang' => $this->penindakan_barang,
			'penindakan_bangunan' => $this->penindakan_bangunan,
			'penindakan_badan' => $this->penindakan_badan,
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
		];

		return $array;
    }
}
