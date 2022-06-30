<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokNhiNResource extends JsonResource
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
				$array = new ObjectResource($this->barang_exim, 'barang');
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
			'kantor_bc' => new RefKantorBCResource($this->kantor_bc),
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
			'barang_exim' => new ObjectResource($this->barang_exim, 'barang'),
			'data_lain_exim' => $this->data_lain_exim,
			'flag_sarkut' => $this->flag_sarkut,
			'nama_sarkut' => $this->nama_sarkut,
			'jenis_sarkut' => $this->jenis_sarkut,
			'no_flight_trayek_sarkut' => $this->no_flight_trayek_sarkut,
			'pelabuhan_asal_sarkut' => new RefBandaraResource($this->asal_sarkut),
			'pelabuhan_tujuan_sarkut' => new RefBandaraResource($this->tujuan_sarkut),
			'imo_mmsi_sarkut' => $this->imo_mmsi_sarkut,
			'data_lain_sarkut' => $this->data_lain_sarkut,
			'flag_orang' => $this->flag_orang,
			'orang' => new RefEntitasResource($this->orang),
			'flight_voyage_orang' => $this->flight_voyage_orang,
			'pelabuhan_asal_orang' => new RefBandaraResource($this->asal_orang),
			'pelabuhan_tujuan_orang' => new RefBandaraResource($this->tujuan_orang),
			'waktu_berangkat_orang' => $this->waktu_berangkat_orang
				? $this->waktu_berangkat_orang->format('d-m-Y H:i:s') 
				: null,
			'waktu_datang_orang' => $this->waktu_datang_orang
				? $this->waktu_datang_orang->format('d-m-Y H:i:s') 
				: null,
			'data_lain_orang' => $this->data_lain_orang,
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
		$lkain = $this->intelijen->lkain;

		$array = $this->basic();
		$array['lkain_id'] = $lkain != null ? $lkain->id : null;
		$array['nomor_lkain'] = $lkain != null ? $lkain->no_dok_lengkap : null;
		$array['tanggal_lkain'] = $lkain != null ? $lkain->tanggal_dokumen->format('d-m-Y') : null;
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
		$nhin = $this->display();
		$dokumen = new IntelijenResource($this->intelijen, 'dokumen');
		$array = [
			'main' => [
				'type' => 'nhin',
				'data' => $nhin
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
