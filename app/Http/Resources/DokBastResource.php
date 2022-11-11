<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokBastResource extends JsonResource
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
				$array = $this->basic();
				break;

			case 'objek':
				$array = new ObjectResource($this->objectable, $this->object_type);
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

	private function getEntity($entity_object, $entity_type, $atas_nama)
	{
		switch ($entity_type) {
			case 'pegawai':
				$entity = new RefUserResource($entity_object);
				break;

			case 'orang':
				$entity = new RefEntitasResource($entity_object);
				break;
			
			default:
				# code...
				break;
		}

		$array = [
			'type' => $entity_type,
			'data' => $entity,
			'atas_nama' => $atas_nama,
		];

		return $array;
	}

	private function basic()
	{
		$array = [
			'id' => $this->id,
			'no_dok' => $this->no_dok,
			'agenda_dok' => $this->agenda_dok,
			'thn_dok' => $this->thn_dok,
			'no_dok_lengkap' => $this->no_dok_lengkap,
			'tanggal_dokumen' => $this->tanggal_dokumen ? $this->tanggal_dokumen->format('d-m-Y') : null,
			'yang_menerima' => $this->getEntity($this->yang_menerima, $this->yang_menerima_type, $this->atas_nama_yang_menerima),
			'yang_menyerahkan' => $this->getEntity($this->yang_menyerahkan, $this->yang_menyerahkan_type, $this->atas_nama_yang_menyerahkan),
			'dalam_rangka' => $this->dalam_rangka,
		];

		return $array;
	}

	private function default()
	{
		$bast = $this->basic();
		$status = new RefStatusResource($this->status);
		$objek = new ObjectResource($this->objectable, $this->object_type);
		$dok_bast = $bast;
		$dok_bast['kode_status'] = $this->kode_status;
		$dokumen = ['bast' => $dok_bast];

		$array = [
			'main' => [
				'type' => 'bast',
				'data' => $bast
			],
			'status' => $status,
			'objek' => $objek,
			'dokumen' => $dokumen,
		];

		return $array;
	}

	private function pdf()
	{
		$array = $this->basic();
		$array['kode_status'] = $this->kode_status;
		return $array;
	}
}
