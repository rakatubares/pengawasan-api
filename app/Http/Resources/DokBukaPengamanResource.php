<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokBukaPengamanResource extends JsonResource
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
				$array = $this->basic();
				break;

			case 'form':
				$array = $this->form();
				break;

			case 'objek':
				$array = new ObjectResource($this->penindakan->objectable, $this->penindakan->object_type);
				break;

			case 'pdf':
				$array = $this->pdf();
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
			'tanggal_dokumen' => $this->tanggal_dokumen ? $this->tanggal_dokumen->format('d-m-Y') : null,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'jenis_pengaman' => $this->jenis_pengaman,
			'jumlah_pengaman' => $this->jumlah_pengaman,
			'satuan_pengaman' => $this->satuan_pengaman,
			'tempat_pengaman' => $this->tempat_pengaman,
			'nomor_pengaman' => $this->nomor_pengaman,
			'tanggal_pengaman' => $this->tanggal_pengaman ? $this->tanggal_pengaman->format('d-m-Y') : null,
			'dasar_pengamanan' => $this->dasar_pengamanan,
			'sprint' => new RefSprintResource($this->sprint),
			'saksi' => new RefEntitasResource($this->saksi),
			'petugas1' => new RefUserResource($this->petugas1),
			'petugas2' => new RefUserResource($this->petugas2),
		];

		return $array;
	}

	private function default()
	{
		$buka_pengaman = $this->basic();
		$penindakan = new PenindakanResource($this->penindakan, 'basic');
		$status = new RefStatusResource($this->status);
		if ($this->penindakan != null) {
			$objek = new ObjectResource($this->penindakan->objectable, $this->penindakan->object_type);
		} else {
			$objek = null;
		}
		$dokumen = new PenindakanResource($this->penindakan, 'dokumen');

		$array = [
			'main' => [
				'type' => 'bukapengaman',
				'data' => $buka_pengaman
			],
			'penindakan' => $penindakan,
			'status' => $status,
			'objek' => $objek,
			'dokumen' => $dokumen,
		];

		return $array;
	}

	private function form()
	{
		$array = $this->basic();
		if ($this->penindakan->pengaman != null) {
			$array['pengaman'] = new DokPengamanResource($this->penindakan->pengaman, 'basic');
		} else {
			$array['pengaman'] = null;
		}
		return $array;
	}

	private function pdf()
	{
		$array = $this->basic();
		$array['kode_status'] = $this->kode_status;

		return $array;
	}
}
