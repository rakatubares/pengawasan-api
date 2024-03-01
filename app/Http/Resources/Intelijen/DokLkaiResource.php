<?php

namespace App\Http\Resources\Intelijen;

// use App\Http\Resources\IkhtisarInformasiResource;
use App\Http\Resources\ListPosisiPegawaiResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DokLkaiResource extends JsonResource
{
	/**
	 * Create a new resource instance.
	 *
	 * @param  mixed  $resource
	 * @return void
	 */
	// public function __construct($resource, $request_type='')
	// {
	// 	parent::__construct($resource, $request_type);
	// 	$this->lppi_type = 'lppi';
	// }

	/**
	 * Transform the resource into an array for display.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		$lppi = $this->chain->lppi;

		$array = [
			'id' => $this->id,
			'no_dok' => $this->no_dok,
			'agenda_dok' => $this->agenda_dok,
			'thn_dok' => $this->thn_dok,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'tanggal_dokumen' => $this->tanggal_dokumen
				? $this->tanggal_dokumen->format('d-m-Y') 
				: null,
			'lppi_id' => $lppi != null ? $lppi->id : null,
			'nomor_lppi' => $lppi != null ? $lppi->no_dok_lengkap : null,
			'tanggal_lppi' => $lppi != null ? $lppi->tanggal_dokumen->format('d-m-Y') : null,
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
			'keputusan_pejabat' => $this->keputusan_pejabat == 1 ? true : false,
			'catatan_pejabat' => $this->catatan_pejabat,
			'tanggal_terima_pejabat' => $this->tanggal_terima_pejabat
				? $this->tanggal_terima_pejabat->format('d-m-Y')
				: null,
			'keputusan_atasan' => $this->keputusan_atasan == 1 ? true : false,
			'catatan_atasan' => $this->catatan_atasan,
			'tanggal_terima_atasan' => $this->tanggal_terima_atasan
				? $this->tanggal_terima_atasan->format('d-m-Y')
				: null,
			'petugas' => ListPosisiPegawaiResource::associative($this->detail_petugas),
			'ikhtisar' => InformasiResource::collection($this->chain->ikhtisar_informasi->informasi),
			'kode_status' => $this->kode_status,
		];

		return $array;
	}

	// protected function display()
	// {
	// 	// $lppi_type = $this->lppi_type;
	// 	// $lppi = $this->intelijen->$lppi_type;
	// 	// $lppi = $this->lppi;

	// 	$array = $this->basic();
	// 	// $array['lppi_id'] = $lppi != null ? $lppi->id : null;
	// 	// $array['nomor_lppi'] = $lppi != null ? $lppi->no_dok_lengkap : null;
	// 	// $array['tanggal_lppi'] = $lppi != null ? $lppi->tanggal_dokumen->format('d-m-Y') : null;
	// 	// $array['ikhtisar'] = IkhtisarInformasiResource::collection($this->intelijen->informasi);
	// 	return $array;
	// }

	// protected function pdf()
	// {
	// 	$array = $this->display();
		
	// 	return $array;
	// }

	// protected function form()
	// {
	// 	return $this->display();
	// }
}