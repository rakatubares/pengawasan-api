<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokBukaPengamanResource extends JsonResource
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
        $buka_pengaman = [
			'id' => $this->id,
			'no_dok' => $this->no_dok,
			'agenda_dok' => $this->agenda_dok,
			'thn_dok' => $this->thn_dok,
			'tanggal_dokumen' => $this->tanggal_dokumen ? $this->tanggal_dokumen->format('d-m-Y') : null,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'jenis_pengaman' => $this->jenis_pengaman,
			'jumlah_pengaman' => $this->jumlah_pengaman,
			'satuan_pengaman' => $this->satuan_pengaman,
			'tempat_pengaman' => $this->tempat_pengaman,
			'nomor_pengaman' => $this->nomor_pengaman,
			'tanggal_pengaman' => $this->tanggal_pengaman ? $this->tanggal_pengaman->format('d-m-Y') : null,
			'dasar_pengamanan' => $this->dasar_pengamanan,
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
			$array = $buka_pengaman;
			$array['kode_status'] = $this->kode_status;
		} else if ($this->element == 'objek') {
			$array = $objek;
		} else {
			$array = [
				'main' => [
					'type' => 'bukapengaman',
					'data' => $buka_pengaman
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
