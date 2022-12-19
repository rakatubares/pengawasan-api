<?php

namespace App\Http\Resources;

use App\Traits\SwitcherTrait;
use Illuminate\Http\Resources\Json\JsonResource;

class DokSbpResource extends JsonResource
{
	use SwitcherTrait;

	/**
	 * Create a new resource instance.
	 *
	 * @param  mixed  $resource
	 * @return void
	 */
	public function __construct($resource, $type=null, $doc_type='sbp')
	{
		$this->resource = $resource;
		$this->type = $type;
		$this->doc_type = $doc_type;
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
			case 'pdf':
				$array = $this->pdf();
				break;

			case 'display':
				$array = $this->display();
				break;

			case 'form':
				$array = $this->display();
				break;

			case 'objek':
				$array = new ObjectResource($this->penindakan->objectable, $this->penindakan->object_type);
				break;

			case 'linked':
				$array = new PenindakanResource($this->penindakan, 'dokumen');
				break;

			case 'number':
				$array = $this->number();
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
			'uraian_penindakan' => $this->uraian_penindakan,
			'alasan_penindakan' => $this->alasan_penindakan,
			'jenis_pelanggaran' => $this->jenis_pelanggaran,
			'wkt_mulai_penindakan' => $this->wkt_mulai_penindakan->format('d-m-Y H:i'),
			'wkt_selesai_penindakan' => $this->wkt_selesai_penindakan->format('d-m-Y H:i'),
			'hal_terjadi' => $this->hal_terjadi,
		];
		return $array;
	}

	private function default()
	{
		$sbp = $this->basic();
		$penindakan = new PenindakanResource($this->penindakan, 'basic');
		$status = new RefStatusResource($this->status);
		$objek = new ObjectResource($this->penindakan->objectable, $this->penindakan->object_type);
		$dokumen = new PenindakanResource($this->penindakan, 'dokumen');

		$array = [
			'main' => [
				'type' => $this->doc_type,
				'data' => $sbp,
				'tes_penindakan' => $this->penindakan
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
		$lptp_type = $this->doc_type == 'sbpn' ? 'lptpn' : 'lptp';
		$lptp_resource = $this->switchObject($lptp_type, 'resource');
		
		$array = $this->basic();
		$array['penindakan'] = new PenindakanResource($this->penindakan, 'basic');
		$array['lptp'] = new $lptp_resource($this->lptp);
		return $array;
	}

	private function number()
	{
		$array = [
			'id' => $this->id,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'tanggal_dokumen' => $this->penindakan->tanggal_penindakan->format('d-m-Y'),
		];

		return $array;
	}
}
