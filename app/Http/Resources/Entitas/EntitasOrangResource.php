<?php

namespace App\Http\Resources\Entitas;

use App\Http\Resources\References\RefNegaraResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EntitasOrangResource extends JsonResource
{
	/**
	 * Transform the resource into an array for display.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		$array = [
			'id' => $this->id,
			'nama' => $this->nama,
			'alias' => $this->alias,
			'jenis_kelamin' => $this->chooseGender(),
			'tempat_lahir' => $this->tempat_lahir,
			'tanggal_lahir' => $this->tanggal_lahir ? $this->tanggal_lahir->format('d-m-Y') : null,
			'warga_negara' => new RefNegaraResource($this->warga_negara),
			'agama' => $this->agama,			
			// 'jenis_identitas' => $this->jenis_identitas,
			// 'nomor_identitas' => $this->nomor_identitas,
			// 'penerbit_identitas' => $this->penerbit_identitas,
			// 'tempat_identitas_terbit' => $this->tempat_identitas_terbit,
			'alamat_identitas' => $this->alamat_identitas,
			'alamat_tinggal' => $this->alamat_tinggal,
			'pekerjaan' => $this->pekerjaan,
			'nomor_telepon' => $this->nomor_telepon,
			'email' => $this->email,
			'identitas' => EntitasIdentitasResource::collection($this->identitas),
		];

		return $array;
	}

	// public function display()
	// {
	// 	$array = [
	// 		'nama' => $this->nama,
	// 		'jenis_identitas' => $this->jenis_identitas,
	// 		'nomor_identitas' => $this->nomor_identitas,
	// 	];
		
	// 	return $array;
	// }

	private function chooseGender()
	{
		switch ($this->jenis_kelamin) {
			case 'F':
				$jenis_kelamin = ['kode' => 'F', 'uraian' => 'Perempuan'];
				break;

			case 'M':
				$jenis_kelamin = ['kode' => 'M', 'uraian' => 'Laki-laki'];
				break;
			
			default:
				$jenis_kelamin = null;
				break;
		}
		
		return $jenis_kelamin;
	}
}
