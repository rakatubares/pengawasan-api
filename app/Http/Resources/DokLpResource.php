<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokLpResource extends JsonResource
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
				$array = new ObjectResource($this->lphp->lptp->sbp->penindakan->objectable, $this->lphp->lptp->sbp->penindakan->object_type);
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
			'pasal' => $this->pasal,
			'modus' => $this->modus,
			'pejabat' => [
				'jabatan' => new JabatanResource($this->jabatan),
				'plh' => $this->plh,
				'user' => new RefUserResource($this->pejabat),
			],
			'kode_status' => $this->kode_status,
		];

		return $array;
	}

	private function default()
	{
		$lp = $this->basic();
		$penindakan = new PenindakanResource($this->lphp->lptp->sbp->penindakan, 'basic');
		$status = new RefStatusResource($this->status);
		$objek = new ObjectResource($this->lphp->lptp->sbp->penindakan->objectable, $this->lphp->lptp->sbp->penindakan->object_type);
		$dokumen = new PenindakanResource($this->lphp->lptp->sbp->penindakan, 'dokumen');

		$array = [
			'main' => [
				'type' => 'lp',
				'data' => $lp
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
	private function display()
	{
		$lphp = $this->lphp;
		$sbp = $lphp->lptp->sbp;

		$array = $this->basic();
		$array['no_sbp'] = $sbp->no_dok_lengkap;
		$array['tanggal_sbp'] = $sbp->penindakan->tanggal_penindakan->format('d-m-Y');
		$array['no_lphp'] = $lphp->no_dok_lengkap;
		$array['tanggal_lphp'] = $lphp->tanggal_dokumen->format('d-m-Y');
		$array['uraian_penindakan'] = $sbp->uraian_penindakan;
		$array['jenis_pelanggaran'] = $sbp->jenis_pelanggaran;
		$array['locus'] = $sbp->penindakan->lokasi_penindakan;
		$array['tempus'] = $sbp->wkt_mulai_penindakan->format('d-m-Y H:i:s');
		$array['saksi'] = new RefEntitasResource($sbp->penindakan->saksi);

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
	private function form()
	{
		$array = $this->basic();
		$array['id_sbp'] = $this->lphp->lptp->sbp->id;

		return $array;
	}
}
