<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokLppiResource extends JsonResource
{
	/**
	 * Create a new resource instance.
	 *
	 * @param  mixed  $resource
	 * @return void
	 */
	public function __construct($resource, $type=null, $doc_type='lppi')
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

	private function display()
	{
		$array = $this->basic();
		$array['ikhtisar'] = IkhtisarInformasiResource::collection($this->intelijen->ikhtisar);
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
		$lppi = $this->display();
		$dokumen = new IntelijenResource($this->intelijen, 'dokumen');
		$array = [
			'main' => [
				'type' => $this->doc_type,
				'data' => $lppi
			],
			'dokumen' => $dokumen
		];
		return $array;
	}
}
