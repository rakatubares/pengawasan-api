<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokLphpResource extends JsonResource
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
				$array = new ObjectResource($this->lptp->sbp->penindakan->objectable, $this->lptp->sbp->penindakan->object_type);
				break;

			case 'pdf':
				$array = $this->pdf();
				break;

			case 'form':
				$array = $this->form();
				break;
			
			default:
				// $array = parent::toArray($request);
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
			'analisa' => $this->analisa,
			'catatan' => $this->catatan,
			'penyusun' => [
				'jabatan' => new JabatanResource($this->jabatan_penyusun),
				'plh' => $this->plh_penyusun,
				'user' => new RefUserResource($this->penyusun),
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
		$lphp = $this->basic();
		$penindakan = new PenindakanResource($this->lptp->sbp->penindakan, 'basic');
		$status = new RefStatusResource($this->status);
		$objek = new ObjectResource($this->lptp->sbp->penindakan->objectable, $this->lptp->sbp->penindakan->object_type);
		$dokumen = new PenindakanResource($this->lptp->sbp->penindakan, 'dokumen');

		$array = [
			'main' => [
				'type' => 'lphp',
				'data' => $lphp
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
		$array = $this->basic();
		$array['no_sbp'] = $this->lptp->sbp->no_dok_lengkap;
		$array['tanggal_sbp'] = $this->lptp->sbp->penindakan->tanggal_penindakan->format('d-m-Y');

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
		$array['id_sbp'] = $this->lptp->sbp->id;

		return $array;
	}
}
