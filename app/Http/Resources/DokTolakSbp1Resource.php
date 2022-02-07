<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokTolakSbp1Resource extends JsonResource
{
	/**
	 * Create a new resource instance.
	 *
	 * @param  mixed  $resource
	 * @return void
	 */
	public function __construct($resource, $type='basic')
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
		// return parent::toArray($request);
		switch ($this->type) {
			case 'pdf':
				$array = $this->pdf();
				break;

			case 'display':
				$array = $this->display();
				break;
			
			default:
				$array = $this->default();
				break;
		}

		return $array;
	}

	/**
	 * Transform the resource into an array for display.
	 *
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
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
			'alasan' => $this->alasan,
			'sprint_id' => $this->sprint_id,
			'sprint' => new RefSprintResource($this->sprint),
			'petugas1' => new RefUserResource($this->petugas1),
			'petugas2' => new RefUserResource($this->petugas2),
		];

		return $array;
	}

	private function default()
	{
		$tolak1 = $this->basic();
		$penindakan = new PenindakanResource($this->sbp->penindakan, 'basic');
		$status = new RefStatusResource($this->status);
		$objek = new ObjectResource($this->sbp->penindakan->objectable, $this->sbp->penindakan->object_type);
		$dokumen = new PenindakanResource($this->sbp->penindakan, 'dokumen');

		$array = [
			'main' => [
				'type' => 'tolak1',
				'data' => $tolak1
			],
			'penindakan' => $penindakan,
			'status' => $status,
			'objek' => $objek,
			'dokumen' => $dokumen,
		];

		return $array;
	}

	private function pdf()
	{
		$array = $this->basic();
		$array['kode_status'] = $this->kode_status;

		return $array;
	}

	private function display()
	{
		$sbp = $this->sbp;
		$array = $this->basic();
		$array['nomor_sbp'] = $sbp->no_dok_lengkap;
		$array['tanggal_sbp'] = $sbp->penindakan->tanggal_penindakan->format('d-m-Y');
		$array['saksi'] = new RefEntitasResource($sbp->penindakan->saksi);
		return $array;
	}
}
