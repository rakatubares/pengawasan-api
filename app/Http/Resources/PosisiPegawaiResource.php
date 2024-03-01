<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PosisiPegawaiResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $array = $this->createArray();
		return $array;
    }

	private function createArray() {
		$array = [
			'id' => $this->id,
			'posisi' => $this->posisi,
			'nip' => $this->nip,
			'name' => $this->petugas->name,
			'user_id' => $this->petugas->user_id,
			'flag_pejabat' => $this->flag_pejabat,
		];

		if ($this->flag_pejabat == 1) {
			$array['kode_jabatan'] = $this->kode_jabatan;
			$array['jabatan'] = $this->jabatan->jabatan;
			$array['tipe_ttd'] = $this->tipe_ttd;
			$array['txt_tipe_ttd'] = $this->referenceTipeTtd($this->tipe_ttd);
		}
		
		return $array;
	}

	private function referenceTipeTtd($tipe_ttd) {
		switch ($tipe_ttd) {
			case 'plh':
				$txt = 'Plh. ';
				break;

			case 'plt':
				$txt = 'Plt. ';
				break;
			
			default:
				$txt = '';
				break;
		}
		return $txt;
	}
}
