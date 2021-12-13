<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PenindakanResource extends JsonResource
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
        $penindakan = [
			'id' => $this->id,
			'tanggal_penindakan' => $this->tanggal_penindakan 
				? $this->tanggal_penindakan->format('d-m-Y') 
				: null,
			'lokasi_penindakan' => $this->lokasi_penindakan,
			'sprint' => new RefSprintResource($this->sprint),
			'saksi' => new RefEntitasResource($this->saksi),
			'petugas1' => new RefUserResource($this->petugas1),
			'petugas2' => new RefUserResource($this->petugas2),
		];
		
		$objek = new ObjectResource($this->objectable, $this->object_type);
		$dokumen = $this->getDocument();

		if ($this->element == 'basic') {
			$array = $penindakan;
		} else if ($this->element == 'dokumen') {
			$array = $dokumen;
		} else {
			$array = [
				'penindakan' => $penindakan,
				'objek' => $objek,
				'dokumen' => $dokumen
			];
		}
		
		return $array;
    }

	private function getDocument()
	{
		$list_dokumen = [];
		foreach ($this->dokumen as $dok) {
			$jenis = $dok->object2_type;

			switch ($jenis) {
				case 'sbp':
					$sbp = new SbpResource($this->sbp, 'basic');
					$list_dokumen['sbp'] = $sbp;

					$lptp = new LptpResource($this->sbp->lptp);
					$list_dokumen['lptp'] = $lptp;

					break;

				case 'segel':
					$segel = new SegelResource($this->segel, 'basic');
					$list_dokumen['segel'] = $segel;
					break;

				case 'tegah':
					$tegah = new TegahResource($this->tegah, 'basic');
					$list_dokumen['tegah'] = $tegah;
					break;

				case 'riksa':
					$riksa = new RiksaResource($this->riksa, 'basic');
					$list_dokumen['riksa'] = $riksa;
					break;
				
				default:
					# code...
					break;
			}

			// $list_dokumen[$jenis] = $data;
		}

		return $list_dokumen;
	}
}
