<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokTitipResource extends JsonResource
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
				$array = $this->display();
				break;

			case 'objek':
				$array = new ObjectResource($this->segel->penindakan->objectable, $this->segel->penindakan->object_type);
				break;

			case 'pdf':
				$array = $this->pdf();
				break;

			case 'form':
				$array = $this->form();
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
			'tanggal_dokumen' => $this->tanggal_dokumen ? $this->tanggal_dokumen->format('d-m-Y') : null,
			'lokasi_titip' => $this->lokasi_titip,
			'sprint' => new RefSprintResource($this->sprint),
			'penerima' => new RefEntitasResource($this->penerima),
			'saksi' => new RefEntitasResource($this->saksi),
			'petugas1' => new RefUserResource($this->petugas1),
			'petugas2' => new RefUserResource($this->petugas2),
		];

		return $array;
	}

	private function default()
	{
		$titip = $this->basic();
		$penindakan = new PenindakanResource($this->segel->penindakan, 'basic');
		$status = new RefStatusResource($this->status);
		$objek = new ObjectResource($this->segel->penindakan->objectable, $this->segel->penindakan->object_type);
		$dokumen = new PenindakanResource($this->segel->penindakan, 'dokumen');

		$array = [
			'main' => [
				'type' => 'titip',
				'data' => $titip
			],
			'penindakan' => $penindakan,
			'status' => $status,
			'objek' => $objek,
			'dokumen' => $dokumen,
		];

		return $array;
	}

	/**
	 * Transform the resource into an array for display.
	 *
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	private function pdf()
	{
		$array = $this->basic();
		$array['kode_status'] = $this->kode_status;

		return $array;
	}

	/**
	 * Transform the resource into an array for display.
	 *
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	private function display()
	{
		$segel = $this->segel;

		$array = $this->basic();
		$array['nomor_segel'] = $segel->no_dok_lengkap;
		$array['tanggal_segel'] = $segel->penindakan->tanggal_penindakan->format('d-m-Y');

		return $array;
	}

	/**
	 * Transform the resource into an array for display.
	 *
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	private function form()
	{
		$array = $this->basic();
		$array['segel']['id'] = $this->segel->id;
		$array['segel']['nomor'] = $this->segel->no_dok_lengkap;
		$array['segel']['tanggal'] = $this->segel->penindakan->tanggal_penindakan->format('d-m-Y');

		return $array;
	}
}