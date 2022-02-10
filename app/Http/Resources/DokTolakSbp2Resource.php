<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokTolakSbp2Resource extends JsonResource
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
			'tanggal_dokumen' => $this->tanggal_dokumen 
				? $this->tanggal_dokumen->format('d-m-Y') 
				: null,
			'alasan' => $this->alasan,
			'sprint' => new RefSprintResource($this->sprint),
			'saksi' => new RefEntitasResource($this->saksi),
			'petugas1' => new RefUserResource($this->petugas1),
			'petugas2' => new RefUserResource($this->petugas2),
		];

		return $array;
	}

	private function default()
	{
		$tolak2 = $this->basic();
		$penindakan = new PenindakanResource($this->tolak1->sbp->penindakan, 'basic');
		$status = new RefStatusResource($this->status);
		$objek = new ObjectResource($this->tolak1->sbp->penindakan->objectable, $this->tolak1->sbp->penindakan->object_type);
		$dokumen = new PenindakanResource($this->tolak1->sbp->penindakan, 'dokumen');

		$array = [
			'main' => [
				'type' => 'tolak2',
				'data' => $tolak2
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
		$tolak1 = $this->tolak1;
		$sbp = $tolak1->sbp;
		$array = $this->basic();
		$array['nomor_tolak1'] = $tolak1->no_dok_lengkap;
		$array['tanggal_tolak1'] = $tolak1->tanggal_dokumen->format('d-m-Y');
		$array['nomor_sbp'] = $sbp->no_dok_lengkap;
		$array['tanggal_sbp'] = $sbp->penindakan->tanggal_penindakan->format('d-m-Y');
		$array['pemilik'] = new RefEntitasResource($sbp->penindakan->saksi);
		return $array;
	}

	private function form()
	{
		$array = $this->basic();
		$array['id_tolak1'] = $this->tolak1->id;
		return $array;
	}
}
