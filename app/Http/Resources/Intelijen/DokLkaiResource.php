<?php

namespace App\Http\Resources\Intelijen;

use App\Http\Resources\ListPosisiPegawaiResource;
use App\Traits\DocumentTrait;
use Illuminate\Http\Resources\Json\JsonResource;

class DokLkaiResource extends JsonResource
{
	use DocumentTrait;

	/**
	 * Create a new resource instance.
	 *
	 * @param  mixed  $resource
	 * @return void
	 */
	public function __construct($resource, $kode_dokumen='lkai')
	{
		parent::__construct($resource);
		$this->kode_dokumen = $kode_dokumen;
	}

	/**
	 * Transform the resource into an array for display.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		$array = $this->lkaiArray();
		
		$lppi = $this->chain->lppi;
		$array['lppi_id'] = $lppi != null ? $lppi->id : null;
		$array['nomor_lppi'] = $lppi != null ? $lppi->no_dok_lengkap : null;
		$array['tanggal_lppi'] = $lppi != null ? $lppi->tanggal_dokumen->format('d-m-Y') : null;
		$array['flag_lpti'] = $this->flag_lpti == 1 ? true : false;
		$array['nomor_lpti'] = $this->nomor_lpti;
		$array['tanggal_lpti'] = $this->tanggal_lpti
			? $this->tanggal_lpti->format('d-m-Y')
			: null;
		$array['flag_npi'] = $this->flag_npi == 1 ? true : false;
		$array['nomor_npi'] = $this->nomor_npi;
		$array['tanggal_npi'] = $this->tanggal_npi
			? $this->tanggal_npi->format('d-m-Y')
			: null;
		$array['flag_rekom_nhi'] = $this->flag_rekom_nhi == 1 ? true : false;
		$array['flag_rekom_ni'] = $this->flag_rekom_ni == 1 ? true : false;
		return $array;
	}

	protected function lkaiArray()
	{
		$array = [];
		$array['id'] = $this->id;
		$array['no_dok'] = $this->no_dok;
		$array['agenda_dok'] = $this->agenda_dok;
		$array['thn_dok'] = $this->thn_dok;
		$array['no_dok_lengkap'] = $this->no_dok_lengkap;
		$array['tanggal_dokumen'] = $this->tanggal_dokumen
			? $this->tanggal_dokumen->format('d-m-Y') 
			: null;
		$array['informasi'] = $this->informasi;
		$array['prosedur'] = $this->prosedur;
		$array['hasil'] = $this->hasil;
		$array['kesimpulan'] = $this->kesimpulan;
		$array['rekomendasi_lain'] = $this->rekomendasi_lain;
		if ($this->kode_dokumen == 'lkai') {
			$array['informasi_lain'] = $this->informasi_lain;
		}
		$array['tujuan'] = $this->tujuan;
		$array['keputusan_pejabat'] = $this->keputusan_pejabat == 1 ? true : false;
		$array['catatan_pejabat'] = $this->catatan_pejabat;
		$array['tanggal_terima_pejabat'] = $this->tanggal_terima_pejabat
			? $this->tanggal_terima_pejabat->format('d-m-Y')
			: null;
		$array['keputusan_atasan'] = $this->keputusan_atasan == 1 ? true : false;
		$array['catatan_atasan'] = $this->catatan_atasan;
		$array['tanggal_terima_atasan'] = $this->tanggal_terima_atasan
			? $this->tanggal_terima_atasan->format('d-m-Y')
			: null;
		$array['petugas'] = ListPosisiPegawaiResource::associative($this->detail_petugas);
		$array['kode_status'] = $this->kode_status;
		return $array;
	}
}