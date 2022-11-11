<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokNiResource extends JsonResource
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
		$this->ni_type = 'ni';
		$this->lkai_type = 'lkai';
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

			case 'pdf':
				$array = $this->pdf();
				break;

			case 'form':
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
			'sifat' => $this->sifat,
			'klasifikasi' => $this->klasifikasi,
			'tujuan' => $this->tujuan,
			'uraian' => $this->uraian,
			'penerbit' => [
				'jabatan' => new JabatanResource($this->jabatan),
				'plh' => $this->plh_pejabat,
				'user' => new RefUserResource($this->pejabat),
			],
			'tembusan' => $this->tembusan($this->tembusan),
		];

		return $array;
	}

	private function display()
	{
		$lkai_type = $this->lkai_type;
		$lkai = $this->intelijen->$lkai_type;

		$array = $this->basic();
		$array['lkai_id'] = $lkai != null ? $lkai->id : null;
		$array['nomor_lkai'] = $lkai != null ? $lkai->no_dok_lengkap : null;
		$array['tanggal_lkai'] = $lkai != null ? $lkai->tanggal_dokumen->format('d-m-Y') : null;
		return $array;
	}

	private function pdf()
	{
		$array = $this->display();
		$array['kode_status'] = $this->kode_status;
		return $array;
	}

	private function default()
	{
		$ni = $this->display();
		$dokumen = new IntelijenResource($this->intelijen, 'dokumen');
		$array = [
			'main' => [
				'type' => $this->ni_type,
				'data' => $ni
			],
			'dokumen' => $dokumen
		];
		return $array;
	}

	private function tembusan()
	{
		$cc_list = $this->tembusan->toArray();
		
		return array_map(function ($data) {
			return $data['uraian'];
		}, $cc_list);
	}
}