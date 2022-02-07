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
					$sbp = new DokSbpResource($this->sbp, 'basic');
					$list_dokumen['sbp'] = $sbp;

					$lptp = new DokLptpResource($this->sbp->lptp);
					$list_dokumen['lptp'] = $lptp;

					$lphp = $this->sbp->lptp->lphp;
					if ($lphp != null) {
						$list_dokumen['lphp'] = new DokLphpResource($lphp, 'pdf');

						$lp = $lphp->lp;
						if ($lp != null) {
							$list_dokumen['lp'] = new DokLpResource($lp, 'pdf');
						} 
					}

					$tolak1 = $this->sbp->tolak1;
					if ($tolak1 != null) {
						$list_dokumen['tolak1'] = new DokTolakSbp1Resource($tolak1, 'pdf');

						$tolak2 = $tolak1->tolak2;
						if ($tolak2 != null) {
							$list_dokumen['tolak2'] = new DokTolakSbp2Resource($tolak2, 'pdf');
						}
					}
					break;

				case 'tegah':
					$tegah = new TegahResource($this->tegah, 'basic');
					$list_dokumen['tegah'] = $tegah;
					break;

				case 'riksa':
					$riksa = new RiksaResource($this->riksa, 'basic');
					$list_dokumen['riksa'] = $riksa;
					break;

				case 'bukasegel':
					$bukasegel = new DokBukaSegelResource($this->bukasegel, 'basic');
					$list_dokumen['bukasegel'] = $bukasegel;
					break;

				case 'segel':
					$segel = new DokSegelResource($this->segel, 'basic');
					$list_dokumen['segel'] = $segel;

					$titip = $this->segel->titip;
					if ($titip != null) {
						$list_dokumen['titip'] = new DokTitipResource($titip, 'pdf');
					}
					break;
				
				case 'pengaman':
					$pengaman = new DokPengamanResource($this->pengaman, 'basic');
					$list_dokumen['pengaman'] = $pengaman;
					break;

				case 'bukapengaman':
					$bukapengaman = new DokBukaPengamanResource($this->bukapengaman, 'basic');
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
