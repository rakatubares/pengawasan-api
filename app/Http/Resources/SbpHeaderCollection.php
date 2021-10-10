<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SbpHeaderCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
		return [
			'data' => $this->collection->transform(function($sbp) {
				return [
					'id' => $sbp->id,
					'no_sbp' => $sbp->no_sbp,
					'no_sbp_lengkap' => $sbp->no_sbp_lengkap,
					'tgl_sbp' => $sbp->tgl_sbp ? $sbp->tgl_sbp->format('d-m-Y') : null,
					'no_sprint' => $sbp->no_sprint,
					'tgl_sprint' => $sbp->tgl_sprint->format('d-m-Y'),
					'penindakan_sarkut' => $sbp->penindakan_sarkut,
					'penindakan_barang' => $sbp->penindakan_barang,
					'penindakan_bangunan' => $sbp->penindakan_bangunan,
					'penindakan_badan' => $sbp->penindakan_badan,
					'lokasi_penindakan' => $sbp->lokasi_penindakan,
					'uraian_penindakan' => $sbp->uraian_penindakan,
					'alasan_penindakan' => $sbp->alasan_penindakan,
					'jenis_pelanggaran' => $sbp->jenis_pelanggaran,
					'wkt_mulai_penindakan1' => $sbp->wkt_mulai_penindakan->format('d-m-Y H:i'),
					'wkt_selesai_penindakan' => $sbp->wkt_selesai_penindakan->format('d-m-Y H:i'),
					'hal_terjadi' => $sbp->hal_terjadi,
					'nama_pemilik' => $sbp->nama_pemilik,
					'pejabat1' => $sbp->pejabat1,
					'pejabat2' => $sbp->pejabat2
				];
			}),
		];
    }
}
