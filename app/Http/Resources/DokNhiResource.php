<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokNhiResource extends JsonResource
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

			case 'pdf':
				$array = $this->pdf();
				break;

			case 'form':
				$array = $this->display();
				break;
			
			case 'objek':
				$array = new ObjectResource($this->objectable, 'barang');
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
			'tempat_indikasi' => $this->tempat_indikasi,
			'waktu_indikasi' => $this->waktu_indikasi
				? $this->waktu_indikasi->format('d-m-Y H:i:s') 
				: null,
			'zona_waktu' => $this->zona_waktu,
			'kantor' => $this->kantor,
			'flag_exim' => $this->flag_exim,
			'jenis_dok_exim' => $this->jenis_dok_exim,
			'nomor_dok_exim' => $this->nomor_dok_exim,
			'tanggal_dok_exim' => $this->tanggal_dok_exim
				? $this->tanggal_dok_exim->format('d-m-Y') 
				: null,
			'nama_sarkut_exim' => $this->nama_sarkut_exim,
			'no_flight_trayek_exim' => $this->no_flight_trayek_exim,
			'nomor_awb_exim' => $this->nomor_awb_exim,
			'tanggal_awb_exim' => $this->tanggal_awb_exim
				? $this->tanggal_awb_exim->format('d-m-Y') 
				: null,
			'merek_koli_exim' => $this->merek_koli_exim,
			'importir_ppjk' => $this->importir_ppjk,
			'npwp' => $this->npwp,
			'data_lain_exim' => $this->data_lain_exim,
			'flag_bkc' => $this->flag_bkc,
			'tempat_penimbunan' => $this->tempat_penimbunan,
			'penyalur' => $this->penyalur,
			'tempat_penjualan' => $this->tempat_penjualan,
			'nppbkc' => $this->nppbkc,
			'nama_sarkut_bkc' => $this->nama_sarkut_bkc,
			'no_flight_trayek_bkc' => $this->no_flight_trayek_bkc,
			'data_lain_bkc' => $this->data_lain_bkc,
			'flag_tertentu' => $this->flag_tertentu,
			'jenis_dok_tertentu' => $this->jenis_dok_tertentu,
			'nomor_dok_tertentu' => $this->nomor_dok_tertentu,
			'tanggal_dok_tertentu' => $this->tanggal_dok_tertentu
				? $this->tanggal_dok_tertentu->format('d-m-Y') 
				: null,
			'nama_sarkut_tertentu' => $this->nama_sarkut_tertentu,
			'no_flight_trayek_tertentu' => $this->no_flight_trayek_tertentu,
			'nomor_awb_tertentu' => $this->nomor_awb_tertentu,
			'tanggal_awb_tertentu' => $this->tanggal_awb_tertentu
				? $this->tanggal_awb_tertentu->format('d-m-Y') 
				: null,
			'merek_koli_tertentu' => $this->merek_koli_tertentu,
			'orang_badan_hukum' => $this->orang_badan_hukum,
			'data_lain_tertentu' => $this->data_lain_tertentu,
			'indikasi' => $this->indikasi,
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
		$lkai = $this->intelijen->lkai;

		$array = $this->basic();
		$array['lkai_id'] = $lkai != null ? $lkai->id : null;
		$array['nomor_lkai'] = $lkai != null ? $lkai->no_dok_lengkap : null;
		$array['tanggal_lkai'] = $lkai != null ? $lkai->tanggal_dokumen->format('d-m-Y') : null;
		$array['objek'] = new ObjectResource($this->objectable, 'barang');
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
		$nhi = $this->display();
		$dokumen = new IntelijenResource($this->intelijen, 'dokumen');
		$array = [
			'main' => [
				'type' => 'nhi',
				'data' => $nhi
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
