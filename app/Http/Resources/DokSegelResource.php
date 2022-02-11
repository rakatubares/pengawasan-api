<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokSegelResource extends JsonResource
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
				$array = $this->form();
				break;

			case 'objek':
				$array = new ObjectResource($this->penindakan->objectable, $this->penindakan->object_type);
				break;

			case 'pdf':
				$array = $this->pdf();
				break;
			
			default:
				$array = $this->default();
				break;
		}

		return $array;

		$segel = [
			'id' => $this->id,
			'no_dok' => $this->no_dok,
			'agenda_dok' => $this->agenda_dok,
			'thn_dok' => $this->thn_dok,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'jenis_segel' => $this->jenis_segel,
			'jumlah_segel' => $this->jumlah_segel,
			'satuan_segel' => $this->satuan_segel,
			'nomor_segel' => $this->nomor_segel,
			'tempat_segel' => $this->tempat_segel,
		];

		$penindakan = new PenindakanResource($this->penindakan, 'basic');
		$status = new RefStatusResource($this->status);
		$objek = new ObjectResource($this->penindakan->objectable, $this->penindakan->object_type);
		$dokumen = new PenindakanResource($this->penindakan, 'dokumen');

		if ($this->element == 'basic') {
			$array = $segel;
			$array['penindakan'] = $penindakan;
			$array['kode_status'] = $this->kode_status;
		} else if ($this->element == 'objek') {
			$array = $objek;
		} else {
			$array = [
				'main' => [
					'type' => 'segel',
					'data' => $segel
				],
				'penindakan' => $penindakan,
				'status' => $status,
				'objek' => $objek,
				'dokumen' => $dokumen,
			];
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
			'jenis_segel' => $this->jenis_segel,
			'jumlah_segel' => $this->jumlah_segel,
			'satuan_segel' => $this->satuan_segel,
			'nomor_segel' => $this->nomor_segel,
			'tempat_segel' => $this->tempat_segel,
		];

		return $array;
	}

	private function default()
	{
		$segel = $this->basic();
		$penindakan = new PenindakanResource($this->penindakan, 'basic');
		$status = new RefStatusResource($this->status);
		$objek = new ObjectResource($this->penindakan->objectable, $this->penindakan->object_type);
		$dokumen = new PenindakanResource($this->penindakan, 'dokumen');

		$array = [
			'main' => [
				'type' => 'segel',
				'data' => $segel
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

	private function form()
	{
		$array = $this->basic();
		$array['penindakan'] = new PenindakanResource($this->penindakan, 'basic');
		return $array;
	}
}
