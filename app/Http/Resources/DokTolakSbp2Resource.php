<?php

namespace App\Http\Resources;

class DokTolakSbp2Resource extends RequestBasedResource
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
		$this->sbp_type = $this->tolak1->sbp_relation->object1_type;
	}

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
			'saksi' => new RefEntitasResource($this->saksi),
			'petugas1' => new RefUserResource($this->petugas1),
			'petugas2' => new RefUserResource($this->petugas2),
		];

		return $array;
	}

	protected function display()
	{
		$tolak1 = $this->tolak1;
		$sbp = $tolak1[$this->sbp_type];
		$array = $this->basic();
		$array['nomor_tolak1'] = $tolak1->no_dok_lengkap;
		$array['tanggal_tolak1'] = $tolak1->tanggal_dokumen->format('d-m-Y');
		$array['nomor_sbp'] = $sbp->no_dok_lengkap;
		$array['tanggal_sbp'] = $sbp->penindakan->tanggal_penindakan->format('d-m-Y');
		$array['pemilik'] = new RefEntitasResource($sbp->penindakan->saksi);
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
		$array['id_tolak1'] = $this->tolak1->id;
		return $array;
	}
}
