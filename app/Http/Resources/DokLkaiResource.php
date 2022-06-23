<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokLkaiResource extends JsonResource
{
	/**
	 * Create a new resource instance.
	 *
	 * @param  mixed  $resource
	 * @return void
	 */
	public function __construct($resource, $type=null, $doc_type='lkai')
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
			'flag_lpti' => $this->flag_lpti == 1 ? true : false,
			'nomor_lpti' => $this->nomor_lpti,
			'tanggal_lpti' => $this->tanggal_lpti
				? $this->tanggal_lpti->format('d-m-Y')
				: null,
			'flag_npi' => $this->flag_npi == 1 ? true : false,
			'nomor_npi' => $this->nomor_npi,
			'tanggal_npi' => $this->tanggal_npi
				? $this->tanggal_npi->format('d-m-Y')
				: null,
			'prosedur' => $this->prosedur,
			'hasil' => $this->hasil,
			'kesimpulan' => $this->kesimpulan,
			'flag_rekom_nhi' => $this->flag_rekom_nhi == 1 ? true : false,
			'flag_rekom_ni' => $this->flag_rekom_ni == 1 ? true : false,
			'rekomendasi_lain' => $this->rekomendasi_lain,
			'informasi_lain' => $this->informasi_lain,
			'tujuan' => $this->tujuan,
			'analis' => new RefUserResource($this->analis),
			'pejabat' => [
				'jabatan' => new JabatanResource($this->jabatan_pejabat),
				'plh' => $this->plh_pejabat,
				'user' => new RefUserResource($this->pejabat),
				'keputusan' => $this->keputusan_pejabat == 1 ? true : false,
				'catatan' => $this->catatan_pejabat,
				'tanggal_terima' => $this->tanggal_terima_pejabat
					? $this->tanggal_terima_pejabat->format('d-m-Y')
					: null,
			],
			'atasan' => [
				'jabatan' => new JabatanResource($this->jabatan_atasan),
				'plh' => $this->plh_atasan,
				'user' => new RefUserResource($this->atasan),
				'keputusan' => $this->keputusan_atasan == 1 ? true : false,
				'catatan' => $this->catatan_atasan,
				'tanggal_terima' => $this->tanggal_terima_atasan
					? $this->tanggal_terima_atasan->format('d-m-Y')
					: null,
			],
		];

		return $array;
	}

	private function display()
	{
		$lppi = $this->doc_type == 'lkain' ? $this->intelijen->lppi : $this->intelijen->lppin;

		$array = $this->basic();
		$array['lppi_id'] = $lppi != null ? $lppi->id : null;
		$array['nomor_lppi'] = $lppi != null ? $lppi->no_dok_lengkap : null;
		$array['tanggal_lppi'] = $lppi != null ? $lppi->tanggal_dokumen->format('d-m-Y') : null;
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
		$lkai = $this->display();
		$dokumen = new IntelijenResource($this->intelijen, 'dokumen');
		$array = [
			'main' => [
				'type' => $this->doc_type,
				'data' => $lkai
			],
			'dokumen' => $dokumen
		];
		return $array;
	}
}
