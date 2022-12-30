<?php

namespace App\Http\Resources;

class DokNiResource extends RequestBasedResource
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
		$this->ni_type = 'ni';
		$this->lkai_type = 'lkai';
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

	protected function display()
	{
		$lkai_type = $this->lkai_type;
		$lkai = $this->intelijen->$lkai_type;

		$array = $this->basic();
		$array['lkai_id'] = $lkai != null ? $lkai->id : null;
		$array['nomor_lkai'] = $lkai != null ? $lkai->no_dok_lengkap : null;
		$array['tanggal_lkai'] = $lkai != null ? $lkai->tanggal_dokumen->format('d-m-Y') : null;
		return $array;
	}

	protected function pdf()
	{
		$array = $this->display();
		$array['kode_status'] = $this->kode_status;
		return $array;
	}

	protected function form()
	{
		return $this->display();
	}

	private function tembusan()
	{
		$cc_list = $this->tembusan->toArray();
		
		return array_map(function ($data) {
			return $data['uraian'];
		}, $cc_list);
	}
}