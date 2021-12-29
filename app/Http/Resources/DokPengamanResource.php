<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokPengamanResource extends JsonResource
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
		$pengaman = [
			'id' => $this->id,
			'no_dok' => $this->no_dok,
			'agenda_dok' => $this->agenda_dok,
			'thn_dok' => $this->thn_dok,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'alasan_pengamanan' => $this->alasan_pengamanan,
			'keterangan' => $this->keterangan,
			'jenis_pengaman' => $this->jenis_pengaman,
			'jumlah_pengaman' => $this->jumlah_pengaman,
			'satuan_pengaman' => $this->satuan_pengaman,
			'nomor_pengaman' => $this->nomor_pengaman,
			'tempat_pengaman' => $this->tempat_pengaman,
		];

		$penindakan = new PenindakanResource($this->penindakan, 'basic');
		$status = new RefStatusResource($this->status);
		$objek = new ObjectResource($this->penindakan->objectable, $this->penindakan->object_type);
		$dokumen = new PenindakanResource($this->penindakan, 'dokumen');

		if ($this->element == 'basic') {
			$array = $pengaman;
			$array['kode_status'] = $this->kode_status;
		} else if ($this->element == 'objek') {
			$array = $objek;
		} else {
			$array = [
				'main' => [
					'type' => 'pengaman',
					'data' => $pengaman
				],
				'penindakan' => $penindakan,
				'status' => $status,
				'objek' => $objek,
				'dokumen' => $dokumen,
			];
		}

		return $array;
	}
}
