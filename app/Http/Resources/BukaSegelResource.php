<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BukaSegelResource extends JsonResource
{
	/**
	 * Create a new resource instance.
	 *
	 * @param  mixed  $resource
	 * @return void
	 */
	public function __construct($resource, $element=null)
	{
		$this->resource = $resource;
		$this->element = $element;
	}

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $buka_segel = [
			'id' => $this->id,
			'no_dok' => $this->no_dok,
			'agenda_dok' => $this->agenda_dok,
			'thn_dok' => $this->thn_dok,
			'tanggal_dokumen' => $this->tanggal_dokumen ? $this->tanggal_dokumen->format('d-m-Y') : null,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'jenis_segel' => $this->jenis_segel,
			'jumlah_segel' => $this->jumlah_segel,
			'satuan_segel' => $this->satuan_segel,
			'nomor_segel' => $this->nomor_segel,
			'tanggal_segel' => $this->tanggal_segel ? $this->tanggal_segel->format('d-m-Y') : null,
			'tempat_segel' => $this->tempat_segel,
			'sprint' => new RefSprintResource($this->sprint),
			'saksi' => new PersonEntityResource($this->saksi),
			'petugas1' => new RefUserResource($this->petugas1),
			'petugas2' => new RefUserResource($this->petugas2),
		];

		$penindakan = new PenindakanResource($this->penindakan, 'basic');
		$status = new RefStatusResource($this->status);
		if ($this->penindakan != null) {
			$objek = new ObjectResource($this->penindakan->objectable, $this->penindakan->object_type);
		} else {
			$objek = null;
		}
		$dokumen = new PenindakanResource($this->penindakan, 'dokumen');

		if ($this->element == 'basic') {
			$array = $buka_segel;
			$array['kode_status'] = $this->kode_status;
		} else if ($this->element == 'objek') {
			$array = $objek;
		} else {
			$array = [
				'main' => [
					'type' => 'bukasegel',
					'data' => $buka_segel
				],
				'penindakan' => $penindakan,
				'status' => $status,
				'objek' => $objek,
				'dokumen' => $dokumen,
			];
		}

		// if ($this->type == 'complete') {
		// 	$buka_segel['detail'] = [
		// 		'sarkut' => new DetailSarkutResource($this->sarkut),
		// 		'bangunan' => new DetailBangunanResource($this->bangunan),
		// 		'barang' => new DetailBarangResource($this->barang),
		// 	];
		// }

		return $array;
    }
}
