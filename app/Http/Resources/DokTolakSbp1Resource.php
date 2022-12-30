<?php

namespace App\Http\Resources;

class DokTolakSbp1Resource extends RequestBasedResource
{
	/**
	 * Create a new resource instance.
	 *
	 * @param  mixed  $resource
	 * @return void
	 */
	public function __construct($resource, $request_type='')
	{
		parent::__construct($resource, $request_type);
		$this->sbp_type = $this->sbp_relation->object1_type;
	}

	/**
	 * Transform the resource into an array for display.
	 *
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	protected function basic()
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
			'petugas1' => new RefUserResource($this->petugas1),
			'petugas2' => new RefUserResource($this->petugas2),
		];

		return $array;
	}

	protected function display()
	{
		$sbp = $this[$this->sbp_type];
		$array = $this->basic();
		$array['nomor_sbp'] = $sbp->no_dok_lengkap;
		$array['tanggal_sbp'] = $sbp->penindakan->tanggal_penindakan->format('d-m-Y');
		$array['saksi'] = new RefEntitasResource($sbp->penindakan->saksi);
		return $array;
	}

	protected function pdf()
	{
		$array = $this->display();
		$array['sbp_type'] = $this->sbp_type;
		$array['kode_status'] = $this->kode_status;

		return $array;
	}

	protected function form()
	{
		$array = $this->basic();
		$array['sbp_type'] = $this->sbp_type;
		$array['id_sbp'] = $this[$this->sbp_type]->id;
		return $array;
	}
}
