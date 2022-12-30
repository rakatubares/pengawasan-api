<?php

namespace App\Http\Resources;

class DokLppiResource extends RequestBasedResource
{
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
			'flag_info_internal' => $this->flag_info_internal == 1 ? true : false,
			'media_info_internal' => $this->media_info_internal,
			'tgl_terima_info_internal' => $this->tgl_terima_info_internal
				? $this->tgl_terima_info_internal->format('d-m-Y') 
				: null,
			'no_dok_info_internal' => $this->no_dok_info_internal,
			'tgl_dok_info_internal' => $this->tgl_dok_info_internal
				? $this->tgl_dok_info_internal->format('d-m-Y') 
				: null,
			'flag_info_eksternal' => $this->flag_info_eksternal == 1 ? true : false,
			'media_info_eksternal' => $this->media_info_eksternal,
			'tgl_terima_info_eksternal' => $this->tgl_terima_info_eksternal
				? $this->tgl_terima_info_eksternal->format('d-m-Y') 
				: null,
			'no_dok_info_eksternal' => $this->no_dok_info_eksternal,
			'tgl_dok_info_eksternal' => $this->tgl_dok_info_eksternal
				? $this->tgl_dok_info_eksternal->format('d-m-Y') 
				: null,
			'penerima_info' => new RefUserResource($this->penerima_info),
			'penilai_info' => new RefUserResource($this->penilai_info),
			'kesimpulan' => $this->kesimpulan,
			'disposisi' => new RefUserResource($this->disposisi),
			'tanggal_disposisi' => $this->tanggal_disposisi
				? $this->tanggal_disposisi->format('d-m-Y') 
				: null,
			'flag_analisis' => $this->flag_analisis == 1 ? true : false,
			'flag_arsip' => $this->flag_arsip == 1 ? true : false,
			'catatan' => $this->catatan,
			'pejabat' => [
				'jabatan' => new JabatanResource($this->jabatan),
				'plh' => $this->plh,
				'user' => new RefUserResource($this->pejabat),
			],
		];

		return $array;
	}

	protected function display()
	{
		$array = $this->basic();
		$array['ikhtisar'] = IkhtisarInformasiResource::collection($this->intelijen->ikhtisar);
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
}
