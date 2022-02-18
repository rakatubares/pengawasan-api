<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokLiResource extends JsonResource
{
	/**
	 * Create a new resource instance.
	 *
	 * @param  mixed  $resource
	 * @return void
	 */
	public function __construct($resource, $type=null)
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
		switch ($this->type) {
			case 'display':
				$array = $this->basic();
				break;

			case 'form':
				$array = $this->basic();
				break;

			case 'pdf':
				$array = $this->pdf();
				break;
			
			default:
				$array = $this->default();
				break;
		}

		return $array;
	}

	private function basic()
	{
		$array = [
			'id' => $this->id,
			'no_dok' => $this->no_dok,
			'agenda_dok' => $this->agenda_dok,
			'thn_dok' => $this->thn_dok,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'tanggal_dokumen' => $this->tanggal_dokumen
				? $this->tanggal_dokumen->format('d-m-Y')
				: null,
			'sumber' => $this->sumber,
			'informasi' => $this->informasi,
			'tindak_lanjut' => $this->tindak_lanjut,
			'catatan' => $this->catatan,
			'penerbit' => [
				'jabatan' => new JabatanResource($this->jabatan_penerbit),
				'plh' => $this->plh_penerbit,
				'user' => new RefUserResource($this->penerbit),
			],
			'atasan' => [
				'jabatan' => new JabatanResource($this->jabatan_atasan),
				'plh' => $this->plh_atasan,
				'user' => new RefUserResource($this->atasan),
			],
		];

		return $array;
	}

	private function default()
	{
		$array = [];
		$array['dokumen']['li'] = $this->pdf();

		if ($this->lap != null) {
			$array['dokumen']['lap'] = new DokLapResource($this->lap, 'pdf');
		}

		return $array;
	}

	private function pdf()
	{
		$array = $this->basic();
		$array['kode_status'] = $this->kode_status;
		return $array;
	}
}
