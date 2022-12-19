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
				case 'sbp':
					$sbp = new DokSbpResource($this[$jenis], 'pdf');
					$list_dokumen[$jenis] = $sbp;

					$tipe_lptp = $jenis == 'sbpn' ? 'lptpn' : 'lptp';
					$lptp = new DokLptpResource($this[$jenis]->lptp);
					$list_dokumen[$tipe_lptp] = $lptp;

					$lphp = $lptp->lphp;
					if ($lphp != null) {
						$tipe_lphp = $jenis == 'sbpn' ? 'lphpn' : 'lphp';
						$list_dokumen[$tipe_lphp] = new DokLphpResource($lphp, 'pdf');

						$lp = $lphp->lp;
						if ($lp != null) {
							switch ($jenis) {
								case 'sbp':
									$list_dokumen['lp'] = new DokLpResource($lp, 'pdf');
									break;
							}
						} 
					}

					break;

				default:
					# code...
					break;
			}
		}

		return $list_dokumen;
	}
}
