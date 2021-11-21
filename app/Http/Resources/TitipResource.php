<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TitipResource extends JsonResource
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
        $titip = [
			'id' => $this->id,
			'no_dok' => $this->no_dok,
			'agenda_dok' => $this->agenda_dok,
			'thn_dok' => $this->thn_dok,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'tgl_dok' => $this->tgl_dok ? $this->tgl_dok->format('d-m-Y') : null,
			'lokasi_titip' => $this->lokasi_titip,
			'detail_sarkut' => $this->detail_sarkut,
			'detail_barang' => $this->detail_barang,
			'detail_bangunan' => $this->detail_bangunan,
			'nomor_ba_segel' => $this->nomor_ba_segel,
			'tanggal_segel' => $this->tanggal_segel->format('d-m-Y'),
			'pejabat1' => $this->pejabat1,
			'pejabat2' => $this->pejabat2,
			'sprint' => new RefSprintResource($this->sprint),
			'penerima' => new PersonEntityResource($this->penerima),
			'saksi' => new PersonEntityResource($this->saksi),
			'status' => new RefStatusResource($this->status),
		];

		if ($this->type == 'complete') {
			$titip['detail'] = [
				'sarkut' => new DetailSarkutResource($this->sarkut),
				'bangunan' => new DetailBangunanResource($this->bangunan),
				'barang' => new DetailBarangResource($this->barang),
			];
		}

		return $titip;
    }
}
