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
			'grup_lokasi' => new RefLokasiResource($this->grup_lokasi),
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
				case 'riksa':
					$riksa = new DokRiksaResource($this->riksa, 'pdf');
					$list_dokumen['riksa'] = $riksa;
					break;

				case 'riksabadan':
					$riksabadan = new DokRiksaBadanResource($this->riksabadan, 'pdf');
					$list_dokumen['riksabadan'] = $riksabadan;
					break;

				case 'segel':
					$segel = new DokSegelResource($this->segel, 'pdf');
					$list_dokumen['segel'] = $segel;

					$titip = $this->segel->titip;
					if ($titip != null) {
						$list_dokumen['titip'] = new DokTitipResource($titip, 'pdf');
					}
					break;

				case 'bukasegel':
					$bukasegel = new DokBukaSegelResource($this->bukasegel, 'pdf');
					$list_dokumen['bukasegel'] = $bukasegel;
					break;

				case 'pengaman':
					$pengaman = new DokPengamanResource($this->pengaman, 'pdf');
					$list_dokumen['pengaman'] = $pengaman;
					break;
				
				case 'bukapengaman':
					$bukapengaman = new DokBukaPengamanResource($this->bukapengaman, 'pdf');
					$list_dokumen['bukapengaman'] = $bukapengaman;
					break;

				default:
					# code...
					break;
			}
		}

		return $list_dokumen;
	}
}
